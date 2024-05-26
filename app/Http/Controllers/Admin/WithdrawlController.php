<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Orders\PaymentStatusEnum;
use App\Enums\Withdrawl\WithdrawlStatusEnum;
use App\Helpers\RoleHelpers;
use App\Http\Controllers\Controller;
use App\Models\Events;
use App\Models\Order;
use App\Models\Withdrawl;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class WithdrawlController extends Controller
{
    protected $HOME_URL = 'dashboard/withdrawl';

    public function __construct()
    {
        $this->middleware(function (Request $request, Closure $next) {
            if (RoleHelpers::isEventOrganizer() && in_array(Route::getCurrentRoute()->getActionMethod(), ['accept', 'reject'])) {
                return abort(403);
            }

            if (RoleHelpers::isAdmin() && Route::getCurrentRoute()->getActionMethod() == 'create') {
                return redirect($this->HOME_URL);
            }

            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Withdrawl::with('organizer');

        $data = RoleHelpers::isAdmin() ? $query->get() : $query->where('event_organizer_id', Auth::user()->organizer->id)->get();
        return view('admin.withdrawl.index', [
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $balance = $this->getAvailableBalance();

        return view('admin.withdrawl.create', [
            'balance' => $balance,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Withdrawl::$rules);

        // check avalilable balance 
        $balance = $this->getAvailableBalance();
        if ($request->amount > $balance) {
            noty('Balance anda tidak cukup untuk melakukan withdrawl ini', 'info');
            return redirect()->back();
        }


        Withdrawl::create([
            ...$request->all(),
            'status' => WithdrawlStatusEnum::Pending,
            'event_organizer_id' => Auth::user()->organizer->id,
        ]);

        noty('Berhasil Request Withdrawl', 'info');

        return redirect($this->HOME_URL);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Withdrawl  $withdrawl
     * @return \Illuminate\Http\Response
     */
    public function show(Withdrawl $withdrawl)
    {
        return view('admin.withdrawl.show', ['data' => $withdrawl]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Withdrawl  $withdrawl
     * @return \Illuminate\Http\Response
     */
    public function edit(Withdrawl $withdrawl)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Withdrawl  $withdrawl
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Withdrawl $withdrawl)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Withdrawl  $withdrawl
     * @return \Illuminate\Http\Response
     */
    public function destroy(Withdrawl $withdrawl)
    {
        //
    }

    public function accept(Withdrawl $withdrawl)
    {
        if ($withdrawl->status != WithdrawlStatusEnum::Pending) {
            noty('Withdrawl ini sudah tidak pending accept', 'error');
            return redirect()->back();
        }

        $withdrawl->update([
            'paid_at' => now(),
            'status' => WithdrawlStatusEnum::Paid,
        ]);

        noty('Berhasil Request Withdrawl', 'info');
        return redirect($this->HOME_URL);
    }

    public function reject(Withdrawl $withdrawl)
    {
        if ($withdrawl->status != WithdrawlStatusEnum::Pending) {
            noty('Withdrawl ini sudah tidak pending accept', 'error');
            return redirect()->back();
        }

        $withdrawl->update([
            'paid_at' => now(),
            'status' => WithdrawlStatusEnum::Rejected,
        ]);

        noty('Berhasil Reject Request Withdrawl', 'info');
        return redirect($this->HOME_URL);
    }

    function getAvailableBalance()
    {
        $myEventsId = Events::where('event_organizer_id', Auth::user()->organizer->id)->pluck('id');

        $balance = Order::where('payment_status', PaymentStatusEnum::Done)
            ->whereIn('event_id', $myEventsId)
            ->sum('total_amount');

        $queryWithdrawl = Withdrawl::where('status', '!=', WithdrawlStatusEnum::Rejected);
        $totalWithdrawl = RoleHelpers::isAdmin() ? $queryWithdrawl->sum('amount') : $queryWithdrawl->where(['event_organizer_id' => Auth::user()->organizer->id])->sum('amount');
        $balance -= $totalWithdrawl;

        return $balance;
    }
}
