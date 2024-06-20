<?php

use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\EventsController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\TicketController;
use App\Http\Controllers\Admin\MerchandiseController;
use App\Http\Controllers\Admin\MerchandiseCategoryController;
use App\Jobs\SendBroadcastMailJob;
use App\Models\GeneralParamter;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Organizer;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Mail;
use Nasution\Terbilang;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', [HomeController::class, 'index']);

Route::get('/login', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/register/event-organizer', [AuthController::class, 'registerEventOrganizer']);
Route::post('/register/event-organizer/submit', [AuthController::class, 'registerEventOrganizerSubmit']);
Route::get('/register/event-organizer/thankyou', [AuthController::class, 'registerEventOrganizerComplete']);

Route::get('/register/tenant', [AuthController::class, 'registerTenant']);
Route::post('/register/tenant/submit', [AuthController::class, 'registerTenantSubmit']);
Route::get('/register/tenant/thankyou', [AuthController::class, 'registerTenantComplete']);

Route::get('/events', [EventsController::class, 'index']);
Route::get('/events/detail/{event}', [EventsController::class, 'show']);
Route::get('/events/detail/{event}/purchase', [EventsController::class, 'purchase']);
Route::post('/events/detail/{event}/purchase/checkout', [EventsController::class, 'checkout']);
Route::post('/events/detail/{event}/purchase/checkout/proceed', [EventsController::class, 'proceedCheckout']);
Route::get('/events/payment/{midtrans_order_id}', [EventsController::class, 'payment']);
Route::get('/events/payment/{midtrans_order_id}/invoice', [EventsController::class, 'invoice']);

Route::get('/ticket/{qrCode}', [TicketController::class, 'show']);
Route::get('/ticket/scan/{qrCode}', [TicketController::class, 'scan']);
Route::post('/ticket/scan/{qrCode}/update', [TicketController::class, 'update']);

Route::get('/sponsors', [HomeController::class, 'sponsors']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::post('/contact', [HomeController::class, 'contactStore']);

Route::get('/terms-and-conditions', [HomeController::class, 'termsConditions']);
Route::get('/privacy-and-policy', [HomeController::class, 'privacyPolicy']);
Route::get('/biaya', [HomeController::class, 'biaya']);

Route::get('/organizer-register', [HomeController::class, 'organizerRegister']);

Route::resource('dashboard/merchandise', MerchandiseController::class)->names([
    'index' => 'admin.merchandise.index',
    'create' => 'admin.merchandise.create',
    'store' => 'admin.merchandise.store',
    'edit' => 'admin.merchandise.edit',
    'update' => 'admin.merchandise.update',
    'destroy' => 'admin.merchandise.destroy',
]);
Route::resource('dashboard/merchandise-category', MerchandiseCategoryController::class)->names([
    'index' => 'admin.merchandise-category.index',
    'create' => 'admin.merchandise-category.create',
    'store' => 'admin.merchandise-category.store',
    'edit' => 'admin.merchandise-category.edit',
    'update' => 'admin.merchandise-category.update',
    'destroy' => 'admin.merchandise-category.destroy',
]);

// Route::get('/invoice', function () {
//     // // SEND EMAIL ETICKET TO CUSTOMER
//     // $invoice = Invoice::find(24)->first();
//     // $receivers = [$invoice->order->orderDetails->first()->buyer_email];
//     // $subject =  "Invoice #" . $invoice->invoice_number;
//     // $message = view('common.mail.invoice.invoice', ['invoice' => $invoice])->render();

//     // // $generalParameter = GeneralParamter::first();

//     // // $pdf = Pdf::loadView('common.pdf.invoice.invoice-pdf', [
//     // //     'invoice' => $invoice,
//     // //     'orderDetail' => $invoice->order->orderDetails->first(),
//     // //     'generalParameter' => $generalParameter,
//     // //     'amountStr' => Terbilang::convert($invoice->total),
//     // // ]);


//     // // $data["email"] = $invoice->order->orderDetails->first()->buyer_email;
//     // // $data["title"] = $subject;
//     // // $data["body"] = "This is Demo";
//     // // $data['order'] = $invoice->order;

//     // // Mail::send('common.mail.ticket.ticket', $data, function ($message) use ($data, $pdf) {
//     // //     $message->to($data["email"], $data["email"])
//     // //         ->subject($data["title"])
//     // //         ->attachData($pdf->output(), "text.pdf");
//     // // });

//     // $generalParameter = GeneralParamter::first();

//     // $pdf = Pdf::loadView('common.pdf.invoice.invoice-pdf', [
//     //     'invoice' => $invoice,
//     //     'orderDetail' => $invoice->order->orderDetails->first(),
//     //     'generalParameter' => $generalParameter,
//     //     'amountStr' => Terbilang::convert($invoice->total),
//     // ]);

//     // // $pdfOutput = base64_encode($pdf->output());

//     // // dd($pdfOutput);

//     // dispatch(new SendBroadcastMailJob($receivers, $subject, $message, 24));

//     // return $pdf->stream();
// });

// Route::get('/mail/welcome', function () {
//     return view('common.mail.welcome.welcome', [
//         'organizer' => Organizer::first(),
//     ]);
// });

// Route::get('/mail/invoice', function () {
//     // SEND EMAIL INVOICE TO CUSTOMER
//     $invoice = Invoice::where(['id' => 23])->first();
//     $receivers = [$invoice->order->orderDetails->first()->buyer_email];
//     $subject =  "Invoice #" . $invoice->invoice_number;
//     $message = view('common.mail.invoice.invoice', ['invoice' => $invoice])->render();
//     dispatch(new SendBroadcastMailJob($receivers, $subject, $message));

//     // return view('common.mail.invoice.invoice',[
//     //     'invoice' => $invoice,
//     // ]);
// });

// Route::get('/mail/eticket', function () {
//     return view('common.mail.ticket.ticket', [
//         'order' => Order::first(),
//     ]);
// });

Route::fallback(function () {
    if (request()->is('dashboard/*')) {
        return response()->view('admin.layout.404', [], 404);
    } else {
        return response()->view('frontend.layout.404', [], 404);
    }
});

// for reset cache in production
Route::get('/53Cfwnl2vR', function () {
    Artisan::call('optimize:clear');
    return "Cleared!";
});
