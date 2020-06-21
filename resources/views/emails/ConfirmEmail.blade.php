<html>
    <head>
        <title>Confirm Email</title>
    </head>
    <body>
        <table>
            <tr><td>Dear {{ $name }}</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>Please click  the link below to activate your account:  </td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td><a href="{{ url('/confirm/'.$code) }}">Confirm Account</a></td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td> Thanks,for using our app.<br> E-service Team</td></tr>
        </table>
    </body>
</html>
