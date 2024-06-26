<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Orders\PaymentStatusEnum;
use App\Enums\Withdrawl\WithdrawlStatusEnum;
use App\Helpers\RoleHelpers;
use App\Http\Controllers\Controller;
use App\Models\Events;
use App\Models\Order;
use App\Models\Withdrawl;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $isAdmin = RoleHelpers::isAdmin();

        $totalEvent = $isAdmin ? Events::count() : Events::where(['event_organizer_id' => Auth::user()->organizer->id])->count();

        $myEventsId = $isAdmin ? [] : Events::where('event_organizer_id', Auth::user()->organizer->id)->pluck('id');

        $balance = $isAdmin ?
            Order::where('payment_status', PaymentStatusEnum::Done)->sum('total_amount') :
            Order::where('payment_status', PaymentStatusEnum::Done)
            ->whereIn('event_id', $myEventsId)
            ->sum('total_amount');

        $totalTransaction = $isAdmin ?
            Order::where('payment_status', PaymentStatusEnum::Done)->count() :
            Order::where('payment_status', PaymentStatusEnum::Done)
            ->whereIn('event_id', $myEventsId)
            ->count();

        $queryWithdrawl = Withdrawl::where('status', '!=', WithdrawlStatusEnum::Rejected);
        $totalWithdrawl = RoleHelpers::isAdmin() ? $queryWithdrawl->sum('amount') : $queryWithdrawl->where(['event_organizer_id' => Auth::user()->organizer->id])->sum('amount');
        $balance -= $totalWithdrawl;

        $chartData = json_encode($this->generateMonthlySummary());

        return view('admin.home.index', [
            'totalEvent' => $totalEvent,
            'balance' => $balance,
            'totalTransaction' => $totalTransaction,
            'chartData' => $chartData,
        ]);
    }

    public function generateMonthlySummary()
    {
        // Get the current year
        $currentYear = Carbon::now()->year;

        if (RoleHelpers::isAdmin()) {
            // Fetch the data
            $data = DB::table('orders')
                ->select(
                    DB::raw('EXTRACT(MONTH FROM created_at) as month'),
                    DB::raw('SUM(total_amount) as total_amount')
                )
                ->whereYear('created_at', $currentYear)
                ->groupBy(DB::raw('EXTRACT(MONTH FROM created_at)'))
                ->orderBy(DB::raw('EXTRACT(MONTH FROM created_at)'))
                ->get();
        } else {
            // Fetch the data
            $data = DB::table('orders')
                ->where('event_id', Auth::user()->organizer->id)
                ->select(
                    DB::raw('EXTRACT(MONTH FROM created_at) as month'),
                    DB::raw('SUM(total_amount) as total_amount')
                )
                ->whereYear('created_at', $currentYear)
                ->groupBy(DB::raw('EXTRACT(MONTH FROM created_at)'))
                ->orderBy(DB::raw('EXTRACT(MONTH FROM created_at)'))
                ->get();
        }

        // Initialize the report data structure
        $monthlySummary = [];

        // Populate the report with data
        for ($i = 1; $i <= 12; $i++) {
            $monthlySummary[] = 0;
        }

        // Fill the report data
        foreach ($data as $record) {
            $monthIndex = $record->month - 1;
            $monthlySummary[$monthIndex] = (int) $record->total_amount;
        }

        return $monthlySummary;
    }
}
