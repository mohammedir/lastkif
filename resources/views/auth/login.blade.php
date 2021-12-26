<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template"/>
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template"/>
    <meta name="author" content="potenzaglobalsolutions.com"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <title>KIFSRS</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico"/>
    <link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>
    <!-- Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

    <!-- css -->
    <link href="{{ URL::asset('assets/css/rtl.css') }}" rel="stylesheet">

</head>

<body>

<div class="wrapper">

    <!--=================================
preloader -->

    <div id="pre-loader">

    </div>
<!--
style="background-image: url(assets/images/login-bg.jpg);"
-->

    <section class="height-100vh d-flex align-items-center page-section-ptb login bg-light">
        <div class="container">
            <div class="row justify-content-center no-gutters vertical-align">
                <!--                <div class="col-lg-4 col-md-6 login-fancy-bg bg"
                                     style="background-image: url(images/login-inner-bg.jpg);">
                                    <div class="login-fancy">
                &lt;!&ndash;                        <h2 class="text-white mb-20">Hello world!</h2>&ndash;&gt;

                                        <p class="mb-20 text-white">Create tailor-cut websites with the exclusive multi-purpose
                                            responsive template along with powerful features.</p>
                                        <ul class="list-unstyled  pos-bot pb-30">
                                            <li class="list-inline-item"><a class="text-white" href="#"> Terms of Use</a> </li>
                                            <li class="list-inline-item"><a class="text-white" href="#"> Privacy Policy</a></li>
                                        </ul>
                                    </div>
                                </div>-->
                <div class="p-50 col-lg-6 col-md-6 bg-white card rounded ">
                    <img height="120" class="" src="{{asset("images/kifSquareLogo.png")}}" alt=""
                         style="display:block;margin:auto;">
                    <div class="mt-50">
                        <div class="text-center">
                            <strong class="text-center" style="color: #007bff; font-size: 25px"><label class="mb-30 text-center">تسجيل الدخول</label></strong>
                        </div>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="section-field mb-20">
                                <label class="mb-10" for="name">البريدالالكتروني*</label>
                                <input id="email" type="email"
                                       class="form-control @error('email') is-invalid @enderror" name="email"
                                       value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror

                            </div>

                            <div class="section-field mb-20">
                                <label class="mb-10" for="Password">كلمة المرور * </label>
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror

                            </div>

                            <div class="text-center mt-5">
                                <button class="btn btn-primary btn-lg w-50 "><span>دخول</span>&ensp;<i class="fas fa-sign-in-alt"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--=================================
login-->

</div>
<!-- jquery -->
<script src="{{ URL::asset('assets/js/jquery-3.3.1.min.js') }}"></script>
<!-- plugins-jquery -->
<script src="{{ URL::asset('assets/js/plugins-jquery.js') }}"></script>
<!-- plugin_path -->
<script>
    var plugin_path = 'js/';
</script>

<!-- chart -->
<script src="{{ URL::asset('assets/js/chart-init.js') }}"></script>
<!-- calendar -->
<script src="{{ URL::asset('assets/js/calendar.init.js') }}"></script>
<!-- charts sparkline -->
<script src="{{ URL::asset('assets/js/sparkline.init.js') }}"></script>
<!-- charts morris -->
<script src="{{ URL::asset('assets/js/morris.init.js') }}"></script>
<!-- datepicker -->
<script src="{{ URL::asset('assets/js/datepicker.js') }}"></script>
<!-- sweetalert2 -->
<script src="{{ URL::asset('assets/js/sweetalert2.js') }}"></script>
<!-- toastr -->
@yield('js')
<script src="{{ URL::asset('assets/js/toastr.js') }}"></script>
<!-- validation -->
<script src="{{ URL::asset('assets/js/validation.js') }}"></script>
<!-- lobilist -->
<script src="{{ URL::asset('assets/js/lobilist.js') }}"></script>
<!-- custom -->
<script src="{{ URL::asset('assets/js/custom.js') }}"></script>

</body>

</html>
