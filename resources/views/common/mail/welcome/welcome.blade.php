{{-- <x-common.mail-layout> --}}
<h1 style="margin-top:0;margin-bottom:16px;font-size:26px;line-height:32px;font-weight:bold;letter-spacing:-0.02em;">
    Selamat datang di Rive!</h1>
<p style="margin:0;">
    Halo {{ $organizer->company_name }},
</p>
<p>
    Terima kasih telah mendaftar sebagai Event Organizer di <a href="{{ url('/') }}"
        style="color:#213D6C;text-decoration:underline;">Rive</a>. Kami dengan senang hati menginformasikan bahwa
    pendaftaran Anda telah berhasil diterima oleh tim admin kami.
</p>
<br>
<p>
    Segera kunjungi dashboard anda untuk mulai membuat event anda
    <br>
    <br>
    <a href="{{ url('/dashboard') }}"
        style="background: #244379; text-decoration: none; padding: 10px 25px; color: #ffffff; border-radius: 4px; display:inline-block; mso-padding-alt:0;text-underline-color:#244379">
        <span style="mso-text-raise:10pt;font-weight:bold;">Kunjungi Dashboard</span>
    </a>
</p>
<br>
<p>
    Jika tombol tidak dapat diklik, gunakan link berikut untuk mengunjungi dashboard
    <br>
    <a href="{{ url('/dashboard') }}" style="color:#213D6C;text-decoration:underline;">{{ url('/dashboard') }}</a>
</p>
{{-- </x-common.mail-layout> --}}
