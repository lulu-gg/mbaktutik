{{-- <x-common.mail-layout> --}}
<h1 style="margin-top:0;margin-bottom:16px;font-size:26px;line-height:32px;font-weight:bold;letter-spacing:-0.02em;">
    Invoice #{{ $invoice->invoice_number }}
</h1>
<p style="margin:0;">
    Halo {{ $invoice->order->orderDetails->first()->buyer_name }},
</p>
<p>
    Segera selesaikan pembayaran ticket anda sejumlah <strong>@format_currency($invoice->total)</strong> untuk mendapatkan ticket
    yang anda inginkan!
</p>
<p>Invoice Details:</p>
<ul>
    <li><strong>Event :</strong> {{ $invoice->order->event->name }}</li>
    <li><strong>Subtotal :</strong> @format_currency($invoice->subtotal) </li>
    <li><strong>Fee :</strong> @format_currency($invoice->fee)</li>
    <li><strong>Total :</strong> @format_currency($invoice->total)</li>
</ul>
<p>
    Klik tautan dibawah untuk melanjutkan pembayaran
    <br>
    <br>
    <a href="{{ url('events/payment/' . $invoice->midtrans_order_id) }}"
        style="background: #244379; text-decoration: none; padding: 10px 25px; color: #ffffff; border-radius: 4px; display:inline-block; mso-padding-alt:0;text-underline-color:#244379">
        <span style="mso-text-raise:10pt;font-weight:bold;">Bayar Sekarang</span>
    </a>
</p>
<br>
<p>
    Jika tombol tidak dapat diklik, gunakan link berikut untuk melanjutkan pembayaran
    <br>
    <a href="{{ url('events/payment/' . $invoice->midtrans_order_id) }}"
        style="color:#213D6C;text-decoration:underline;">{{ url('events/payment/' . $invoice->midtrans_order_id) }}</a>
</p>
{{-- </x-common.mail-layout> --}}
