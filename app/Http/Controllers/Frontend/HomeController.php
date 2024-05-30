<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Events;
use App\Models\Sponsors;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    public function index()
    {

        $currentDate = Carbon::now()->toDateString();

        $upcomingEvents = Events::whereDate('start_date', '>=', $currentDate)
            ->orderBy('start_date', 'asc')
            ->limit(20)
            ->get();

        $pastEvents = Events::whereDate('end_date', '<', $currentDate)->limit(20)->get();

        $sponsor = Sponsors::where('status', 1)->get();

        return view('frontend.home.index', [
            'upcomingEvents' => $upcomingEvents->take(6),
            'ongoingEvents' => $upcomingEvents,
            'pastEvents' => $pastEvents,
            // 'banner' => $banner,
            'sponsor' => $sponsor,
        ]);
    }

    public function sponsors()
    {
        return view('frontend.sponsors.index');
    }

    public function contact()
    {
        return view('frontend.contact.index');
    }

    public function termsConditions()
    {
        return view('frontend.general.termsconditions');
    }

    public function privacyPolicy()
    {
        return view('frontend.general.privacypolicy');
    }

    public function biaya()
    {
        return view('frontend.general.biaya');
    }
}
