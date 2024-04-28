<x-common.mail-layout>
    <h1 style="margin-top:0;margin-bottom:16px;font-size:26px;line-height:32px;font-weight:bold;letter-spacing:-0.02em;">
        Selamat datang di Rive!</h1>
    <p style="margin:0;">
        Terimakasih telah mendaftar, {{ $user->name }}.
    </p>
    <p>
        <a href="{{ url('/') }}" style="color:#213D6C;text-decoration:underline;">Rive</a>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique praesentium deserunt esse placeat? Ratione
        consequatur ea, dignissimos doloribus aperiam quaerat magnam aliquam soluta, iste fugiat asperiores ullam unde
        modi maiores!
    </p>
    <br>
    <p>
        Segera aktivasi akun anda untuk dapat menikmati layanan yang tersedia.
        <br>
        <br>
        <a href="{{ url('/dashboard/activate/' . $user->verify_token) }}"
            style="background: #244379; text-decoration: none; padding: 10px 25px; color: #ffffff; border-radius: 4px; display:inline-block; mso-padding-alt:0;text-underline-color:#244379">
            <span style="mso-text-raise:10pt;font-weight:bold;">Aktivasi Akun</span>
        </a>
    </p>
    <br>
    <p>
        Jika tombol tidak dapat diklik, gunakan link berikut untuk aktivasi akun
        <br>
        <a href="{{ url('/dashboard/activate/' . $user->verify_token) }}"
            style="color:#213D6C;text-decoration:underline;">{{ url('/dashboard/activate/' . $user->verify_token) }}</a>
    </p>
</x-common.mail-layout>
