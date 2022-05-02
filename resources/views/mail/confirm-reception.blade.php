<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Confirmation of the Delivery</title>
</head>
<body style="margin:0px; background: #f8f8f8; ">
<div width="100%"
     style="background: #f8f8f8; padding: 0px 0px; font-family:arial; line-height:28px; height:100%;  width: 100%; color: #514d6a;">
    <div style="max-width: 700px; padding:50px 0;  margin: 0px auto; font-size: 14px">
        <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; margin-bottom: 20px">
            <tbody>
            <tr>
                <td style="vertical-align: top; padding-bottom:30px;" align="center"><a
                        href="#" target="_blank">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="Cslisted logo" style="border:none">
                </td>
            </tr>
            </tbody>
        </table>
        <div style="padding: 40px; background: #fff;">
            <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                <tbody>
                <tr>
                    <td><b>Dear Customer {{ $user->name }},</b>
                        <p>Please clic to the link below to confirm the reception of your product.</p>

                        <a href="{{ route('products.received',['token' => $token]) }}"
                           style="display: inline-block; padding: 11px 30px; margin: 20px 0px 30px; font-size: 15px; color: #ffffff; background: #17e22b; border-radius: 60px; text-decoration:none;">
                            Confirm
                        </a>
                        <p></p>
                        <b>- Thanks (CSListed team)</b></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div style="text-align: center; font-size: 12px; color: #b2b2b5; margin-top: 20px">
            <p> Powered by Endaman stevy : 695782628<br>
                <a href="javascript: void(0);" style="color: #b2b2b5; text-decoration: underline;">Unsubscribe</a></p>
        </div>
    </div>
</div>
</body>
</html>
