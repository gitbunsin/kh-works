{{--<!DOCTYPE html>--}}
{{--<html>--}}
{{--<head>--}}
    {{--<title>Welcome Email</title>--}}
{{--</head>--}}

{{--<body>--}}
{{--<h2>Welcome to the site {{$user['name']}}</h2>--}}
{{--<br/>--}}
{{--Your registered email-id is {{$user['email']}} , Please click on the below link to verify your email account--}}
{{--<br/>--}}
{{--<a href="{{url('user/verify', $user->verifyUser->token)}}">Verify Email</a>--}}
{{--</body>--}}
{{--</html>--}}

<h3>Click the Link To Verify Your Email</h3>
Click the following link to verify your email {{ url('/organization/verify/'. $email_token) }}