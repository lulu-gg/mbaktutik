<h1 style="margin-top:0;margin-bottom:16px;font-size:26px;line-height:32px;font-weight:bold;letter-spacing:-0.02em;">
    Reset Password
</h1>
<p>
    <b>Hi {{ $user->name }}</b>,
    <br>
    Admin telah menyetujui permintaan pembayaran tempo anda, segera cek dashboard untuk melihat detailnya!
    Untuk melakukan pergantian password, silahkan klik tautan berikut ini
    <br>
    <br>
    <a href="{{ url('/dashboard/forgot-response/' . $user->verify_token) }}"
        style="background: #244379; text-decoration: none; padding: 10px 25px; color: #ffffff; border-radius: 4px; display:inline-block; mso-padding-alt:0;text-underline-color:#244379">
        <span style="mso-text-raise:10pt;font-weight:bold;">Reset Password</span>
    </a>
</p>

<br>
<p>
    Jika tombol tidak dapat diklik, gunakan link berikut untuk reset password
    <br>
    <a href="{{ url('/dashboard/forgot-response/' . $user->verify_token) }}"
        style="color:#213D6C;text-decoration:underline;">{{ url('/dashboard/forgot-response/' . $user->verify_token) }}</a>
</p>
