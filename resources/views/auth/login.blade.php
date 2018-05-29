<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Anirban Sonchoy | Login</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href={{ asset("assets/vendors/bootstrap/dist/css/bootstrap.min.css")}} rel="stylesheet" />
    <link href={{ asset("assets/vendors/font-awesome/css/font-awesome.min.css")}} rel="stylesheet" />
    <link href={{ asset("assets/vendors/themify-icons/css/themify-icons.css")}} rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href={{ asset("assets/css/main.css")}} rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
    <link href={{ asset("assets/css/pages/auth-light.css")}} rel="stylesheet" />
</head>

<body class="bg-silver-300">
<div class="content">
    <div class="brand">
        <a class="link" href="index.html">AnirBan</a>
    </div>
    <form action="{{ route('login') }}" method="POST">
    @csrf
        <h2 class="login-title">Log in</h2>
        <div class="form-group">
            <div class="input-group-icon right">
                <div class="input-icon"><i class="fa fa-envelope"></i></div>
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Email Address">
                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <div class="input-group-icon right">
                <div class="input-icon"><i class="fa fa-lock font-16"></i></div>
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Enter Password">

                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group d-flex justify-content-between">
            <label class="ui-checkbox ui-checkbox-info">
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                <span class="input-span"></span>{{ __('Remember Me') }}</label>
            <a href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
        </div>
        <div class="form-group">
            <button class="btn btn-info btn-block" type="submit">{{ __('Login') }}</button>
        </div>
        <div class="text-center">Not a member?
            <a class="color-blue" href="register.html">Create accaunt</a>
        </div>
    </form>
</div>
<!-- BEGIN PAGA BACKDROPS-->
<div class="sidenav-backdrop backdrop"></div>
<div class="preloader-backdrop">
    <div class="page-preloader">Loading</div>
</div>
<!-- END PAGA BACKDROPS-->
<!-- CORE PLUGINS -->
<script src={{ asset("assets/vendors/jquery/dist/jquery.min.js") }} type="text/javascript"></script>
<script src={{ asset("assets/vendors/popper.js/dist/umd/popper.min.js") }} type="text/javascript"></script>
<script src={{ asset("assets/vendors/bootstrap/dist/js/bootstrap.min.js") }} type="text/javascript"></script>
<!-- PAGE LEVEL PLUGINS -->
<script src={{ asset("assets/vendors/jquery-validation/dist/jquery.validate.min.js") }} type="text/javascript"></script>
<!-- CORE SCRIPTS-->
<script src={{ asset("assets/js/app.js") }} type="text/javascript"></script>
<!-- PAGE LEVEL SCRIPTS-->
{{--<script type="text/javascript">--}}
    {{--$(function() {--}}
        {{--$('#login-form').validate({--}}
            {{--errorClass: "help-block",--}}
            {{--rules: {--}}
                {{--email: {--}}
                    {{--required: true,--}}
                    {{--email: true--}}
                {{--},--}}
                {{--password: {--}}
                    {{--required: true--}}
                {{--}--}}
            {{--},--}}
            {{--highlight: function(e) {--}}
                {{--$(e).closest(".form-group").addClass("has-error")--}}
            {{--},--}}
            {{--unhighlight: function(e) {--}}
                {{--$(e).closest(".form-group").removeClass("has-error")--}}
            {{--},--}}
        {{--});--}}
    {{--});--}}
{{--</script>--}}
</body>

</html>
