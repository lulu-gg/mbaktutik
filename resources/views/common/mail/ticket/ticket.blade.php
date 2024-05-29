{{-- <x-common.mail-layout> --}}
<h1 style="margin-top:0;margin-bottom:16px;font-size:26px;line-height:32px;font-weight:bold;letter-spacing:-0.02em;">
    E-Ticket {{ $order->event->name }}
</h1>
<p style="margin:0;">
    Halo {{ $order->orderDetails->first()->buyer_name }},
</p>
<p>
    Terimakasih telah menyelesaikan transaksi pembelian ticket anda, berikut merupakan e-ticket anda yang dapat
    digunakan saat event berlangsung.
</p>
<p>
    Klik tautan dibawah untuk membuka E-Ticket
    <br>
    <br>
    @foreach ($order->orderDetails as $detail)
        @foreach ($detail->tickets as $ticket)
            <a href="{{ url('ticket/' . $ticket->qr_code) }}"
                style="background: #244379; text-decoration: none; padding: 10px 25px; color: #ffffff; border-radius: 4px; display:inline-block; mso-padding-alt:0;text-underline-color:#244379">
                <span style="mso-text-raise:10pt;font-weight:bold;">{{ $ticket->ticket_code }}</span>
            </a>
            <br>
            <br>
        @endforeach
    @endforeach
</p>
<br>
<p>
    Jika tombol tidak dapat diklik, gunakan link berikut untuk melihat semua ticket anda
    <br>
    <a href="{{ url('events/payment/' . $order->invoice->midtrans_order_id) }}"
        style="color:#213D6C;text-decoration:underline;">{{ url('events/payment/' . $order->invoice->midtrans_order_id) }}</a>
</p>
{{-- </x-common.mail-layout> --}}
