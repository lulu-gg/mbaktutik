<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="x-apple-disable-message-reformatting">
    <title></title>
    <style>
        table,
        td,
        div,
        h1,
        p {
            font-family: Arial, sans-serif;
        }

        @media screen and (max-width: 530px) {
            .unsub {
                display: block;
                padding: 8px;
                margin-top: 14px;
                border-radius: 6px;
                background-color: #555555;
                text-decoration: none !important;
                font-weight: bold;
            }

            .col-lge {
                max-width: 100% !important;
            }
        }

        @media screen and (min-width: 531px) {
            .col-sml {
                max-width: 27% !important;
            }

            .col-lge {
                max-width: 73% !important;
            }
        }
    </style>
</head>

<body style="margin:0;padding:0;word-spacing:normal;background-color:#939297;">
    <div role="article" aria-roledescription="email" lang="en"
        style="text-size-adjust:100%;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;background-color:#939297;">
        <table role="presentation" style="width:100%;border:none;border-spacing:0;">
            <tr>
                <td align="center" style="padding:0;">
                    <table role="presentation"
                        style="width:94%;max-width:600px;border:none;border-spacing:0;text-align:left;font-family:Arial,sans-serif;font-size:16px;line-height:22px;color:#363636;">
                        <tr>
                            <td style="padding:50px 30px 40px 30px;text-align:center;font-size:24px;font-weight:bold;">
                                <a href="{{ url('/') }}" style="text-decoration:none;"><img
                                        src="https://mbaktutik.com/images/logo-black.png" width="350"
                                        alt="Logo"
                                        style="width:350px;max-width:80%;height:auto;border:none;text-decoration:none;color:#ffffff;"></a>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:30px;background-color:#ffffff;">
                                {{ $slot }}
                            </td>
                        </tr>
                        <tr>
                            <td
                                style="padding:30px;text-align:center;font-size:12px;background-color:#404040;color:#cccccc;">
                                <p style="margin:0;font-size:14px;line-height:20px;">&reg; Mbak Tutik
                                    {{ now()->year }}<br> Ana </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
