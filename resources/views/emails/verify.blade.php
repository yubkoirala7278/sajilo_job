<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Authentication</title>
</head>

<body>
    <!--wrapper-->
    <div class="wrapper">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td align="center" style="padding: 20px;">
                    <table class="content" width="600" border="0" cellspacing="0" cellpadding="0"
                        style="border-collapse: collapse; border: 1px solid
#cccccc;">
                        <!-- Header -->
                        <tr>
                            <td class="header"
                                style="background-color: #054728; padding: 40px;
text-align: center; color: white; font-size: 24px;">
                                {{-- <img src="{{ $message-
>embed(public_path('assets/img/logo.png')) }}" alt="Image path" style="height: 60px; width: auto;"> --}}
                            </td>
                        </tr>
                        <!-- Body -->
                        <tr>
                            <td class="body"
                                style="padding: 30px 40px; text-align: left;
font-size: 16px; line-height: 1.6;">
                                Dear <b>[{{ $user->name }}]</b>, <br><br>
                                Thank you for registering.
                            </td>
                        </tr>
                        <!-- Call to action Button -->
                        <tr>
                            <td style="padding: 0px 40px 0px 40px; text-align:
center;">
                                <!-- CTA Button -->
                                <table cellspacing="0" cellpadding="0" style="margin: auto;">
                                    <tr>
                                        <td align="center"
                                            style="background-color: #054728;
padding: 10px 20px; border-radius: 5px;">
                                            <a href="{{ $verificationUrl }}" target="_blank"
                                                style="color: #ffffff; text-
decoration: none; font-weight: bold;">Click
                                                here to verify</a>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td class="body"
                                style="padding: 30px 40px; text-align: left;
font-size: 16px; line-height: 1.6;">
                                If the button above does not work, please copy
                                and paste the following link into your
                                web browser: <br><br>
                                <a href="{{ $verificationUrl }}" target="_blank"
                                    style="word-break: break-all;">{{ $verificationUrl }}</a>
                                <br><br>
                                Thank you.
                                <br><br>
                                Thank you,<br>
                                Authentication System
                            </td>
                        </tr>
                        <!-- Footer -->
                        <tr>
                            <td class="email-footer"
                                style="background-color: #333333; padding: 30px;
text-align: center; color: white; font-size: 14px;">
                                <a href="#" target="_blank"
                                    style="word-break:
break-all;color:white;text-decoration:none">Support</a>
                                | <a href="#" target="_blank"
                                    style="word-break:
break-all;color:white;text-decoration:none">Visit our
                                    website</a> | <a href="#" target="_blank"
                                    style="word-break: break-
all;color:white;text-decoration:none">Log In</a>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</body>

</html
