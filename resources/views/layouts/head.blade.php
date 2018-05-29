<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width initial-scale=1.0">
<title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>
<!-- GLOBAL MAINLY STYLES-->
<link href={{ asset("assets/vendors/bootstrap/dist/css/bootstrap.min.css") }} rel="stylesheet" />
<link href={{ asset("assets/vendors/font-awesome/css/font-awesome.min.css") }} rel="stylesheet" />
<link href={{ asset("assets/vendors/themify-icons/css/themify-icons.css") }} rel="stylesheet" />
<!-- PLUGINS STYLES-->
<link href={{ asset("assets/vendors/jvectormap/jquery-jvectormap-2.0.3.css") }} rel="stylesheet" />
<!--TOASTR STYLES-->
<link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
<!-- THEME STYLES-->
<link href={{ asset("assets/css/main.min.css") }} rel="stylesheet" />
<!-- PAGE LEVEL STYLES-->
@stack('header-script')