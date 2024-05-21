<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Events;
use App\Models\EventsCategory;
use App\Models\GeneralParamter;
use App\Models\OrdersDetail;
use App\Models\TicketVariation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class EventsController extends Controller
{
    public function index()
    {
        $events = Events::orderBy('id', 'desc')->with(['organizer'])->get();
        $eventCategorys = EventsCategory::all();

        return view('frontend.events.index', [
            'events' => $events,
            'eventCategorys' => $eventCategorys,
        ]);
    }

    public function show(Events $event)
    {
        $event = Events::where(['id' => $event->id])->with(['ticketVariations', 'organizer'])->firstOrFail();
        return view('frontend.events.detail', [
            'event' => $event,
        ]);
    }

    public function purchase(Events $event)
    {
        $event = Events::where(['id' => $event->id])->with(['ticketVariations', 'organizer'])->firstOrFail();
        return view('frontend.events.purchase', [
            'event' => $event,
        ]);
    }

    public function checkout(Request $request, Events $event)
    {
        $formData = [];
        $subtotal = 0;

        foreach ($request->ticket as $key => $item) {
            // validate event status
            $ticket = TicketVariation::where(['id' => $item])->first();
            if ($ticket->status != 1) {
                return back()->withErrors(['name' => "$ticket->name was unavailable at this moment"]);
            }

            // validate max user purchase
            $userAlreadyBuyCounter = OrdersDetail::where(['ticket_variation_id' => $item, 'buyer_nik' => $request->nik[$key]])->count();
            if (($userAlreadyBuyCounter + $request->quantity[$key]) > $ticket->max_user_purchase) {
                return back()->withErrors(['name' => "NIK " . $request->nik[$key] . " was already reached max purchase for ticket $ticket->name"]);
            }

            $subtotal += $ticket->price * $request->quantity[$key];
            $formData[] = (object) [
                'ticket' => $ticket,
                'quantity' => $request->quantity[$key],
                'fullname' => $request->fullname[$key],
                'email' => $request->email[$key],
                'phone' => $request->phone[$key],
                'nik' => $request->nik[$key],
                'price' => (int) $ticket->price,
                'subtotal' => $ticket->price * $request->quantity[$key]
            ];
        }

        $serviceFeePercentage = GeneralParamter::first()->transaction_tax ?? 3;
        $serviceFee = $subtotal * ($serviceFeePercentage / 100);

        $encryptedData = Crypt::encryptString(json_encode([
            'event' => $event,
            'formData' => $formData,
            'subtotal' => $subtotal,
            'serviceFee' => $serviceFee,
        ]));

        return view('frontend.events.checkout', [
            'event' => $event,
            'formData' => $formData,
            'subtotal' => $subtotal,
            'serviceFee' => $serviceFee,
            'encryptedData' => $encryptedData,
        ]);
    }

    public function proceedCheckout(Request $request, Events $event)
    {
        $decryptedData = Crypt::decryptString($request->encData);
        $formData = json_decode($decryptedData, false);
        dd($formData);
    }
}
