{{-- <x-common.mail-layout> --}}
<h1 style="margin-top:0;margin-bottom:16px;font-size:26px;line-height:32px;font-weight:bold;letter-spacing:-0.02em;">
    Terima kasih telah mendaftar di Rive!</h1>
<p style="margin:0;">
    Halo {{ $organizer->company_name }},
</p>
<p>
    Terima kasih telah mendaftar sebagai Event Organizer di <a href="{{ url('/') }}"
        style="color:#213D6C;text-decoration:underline;">Rive</a>. Kami telah memeriksa pendaftaran Anda dengan
    seksama.<br>
    Sayangnya, kami harus menginformasikan bahwa pendaftaran Anda belum dapat diterima saat ini.
</p>
<p>
    Jika Anda memiliki pertanyaan lebih lanjut atau memerlukan klarifikasi, silakan menghubungi tim kami melalui email
    <a href="mailto:{{ $supportEmail }}" style="color:#213D6C;text-decoration:underline;">{{ $supportEmail }}</a>.
</p>
<br>
<p>
    Kami menghargai minat Anda terhadap platform kami dan berharap dapat bekerja sama di masa mendatang.
</p>
<br>
<p>
    Terima kasih atas pengertian Anda.
</p>
<br>
<p>
    Salam,
    <br>
    Tim Rive
</p>
{{-- </x-common.mail-layout> --}}
