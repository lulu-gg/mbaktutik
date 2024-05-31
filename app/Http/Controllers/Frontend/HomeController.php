<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\Events;
use App\Models\GeneralParamter;
use App\Models\Sponsors;
use Illuminate\Http\Request;
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

        $sponsor = Sponsors::where('status', 1)->orderBy('display_order')->get();

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
        $sponsor = Sponsors::where('status', 1)->orderBy('display_order')->get();
        return view('frontend.sponsors.index', [
            'sponsor' => $sponsor
        ]);
    }

    public function contact()
    {
        $generalParameter = GeneralParamter::first();
        return view('frontend.contact.index', [
            'generalParameter' => $generalParameter,
        ]);
    }

    public function contactStore(Request $request)
    {
        $request->validate(ContactUs::$rules);

        ContactUs::create([...$request->all()]);
        noty('Thankyou!! your message has been send');

        return redirect('/contact');
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
