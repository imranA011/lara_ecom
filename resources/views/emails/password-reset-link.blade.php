
<html>
    <head>
        <title>Password Reset Link</title>
    </head>
    <body>
        <a href="{{route('reset.password.show', [$data['email'], $data['token']])}}">Click to Reset Password</a>
        <p>{{route('reset.password.show', [$data['email'], $data['token']])}}</p>
    </body>
</html>