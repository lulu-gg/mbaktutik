<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Events;
use App\Models\Sponsors;

class HomeController extends Controller
{
    public function index()
    {
        $new = Events::orderBy('id', 'desc')->get();
        $sponsor = Sponsors::where('status', 1)->get();
        $past = Events::orderBy('id', 'asc')->get();
        $banner = Events::take('6')->orderBy('id', 'desc')->get();
        return view('frontend.home.index', [
            'new' => $new,
            'past' => $past,
            'banner' => $banner,
            'sponsor' => $sponsor,
        ]);
    }


    public function events()
    {
        return view('frontend.events.index');
    }

    public function eventsDetail()
    {
        return view('frontend.events.detail');
    }

    public function sponsors()
    {
        return view('frontend.sponsors.index');
    }

    public function contact()
    {
        return view('frontend.contact.index');
    }

    public function login()
    {
        return view('frontend.general.login');
    }

    public function register()
    {
        return view('frontend.general.register');
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

    public function account()
    {
        return view('frontend.account.index');
    }

    public function accountMyEvents()
    {
        return view('frontend.account.myevents');
    }

    public function accountMyOrder()
    {
        return view('frontend.account.myorder');
    }

    public function accountSettings()
    {
        return view('frontend.account.settings');
    }


    public function organizerEvents()
    {
        return view('frontend.account.organizer.events');
    }

    public function organizerEventsDetail()
    {
        return view('frontend.account.organizer.events.detail');
    }

    public function organizerEventsCreate()
    {
        return view('frontend.account.organizer.events.create');
    }

    public function organizerEventsEdit()
    {
        return view('frontend.account.organizer.events.edit');
    }

    public function organizerRegister()
    {
        return view('frontend.account.organizer.formpengajuan');
    }
}
