@extends("layouts.app")
@section("docTitle")
    Login
@endsection
@section("head")
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="/loginAssets/images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/loginAssets/vendor/bootstrap/css/bootstrap.min.css">
    <!--=========================================/loginAssets/======================================================-->
    <link rel="stylesheet" type="text/css" href="/loginAssets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--=========================================/loginAssets/======================================================-->
    <link rel="stylesheet" type="text/css" href="/loginAssets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--=========================================/loginAssets/======================================================-->
    <link rel="stylesheet" type="text/css" href="/loginAssets/vendor/animate/animate.css">
    <!--=========================================/loginAssets/======================================================-->
    <link rel="stylesheet" type="text/css" href="/loginAssets/vendor/css-hamburgers/hamburgers.min.css">
    <!--=========================================/loginAssets/======================================================-->
    <link rel="stylesheet" type="text/css" href="/loginAssets/vendor/animsition/css/animsition.min.css">
    <!--=========================================/loginAssets/======================================================-->
    <link rel="stylesheet" type="text/css" href="/loginAssets/vendor/select2/select2.min.css">
    <!--=========================================/loginAssets/======================================================-->
    <link rel="stylesheet" type="text/css" href="/loginAssets/vendor/daterangepicker/daterangepicker.css">
    <!--=========================================/loginAssets/======================================================-->
    <link rel="stylesheet" type="text/css" href="/loginAssets/css/util.css">
    <link rel="stylesheet" type="text/css" href="/loginAssets/css/main.css">
    <!--===============================================================================================-->
@endsection
@section('content')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form method="POST" class="login100-form validate-form" action="{{ route('register') }}">
                        @csrf
					<span class="login100-form-title p-b-43">
						Registreren
					</span>


                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <input type="text" id="name" class="input100 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        <span class="focus-input100"></span>
                        <span class="label-input100">Name</span>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
{{--                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">--}}
{{--                        <input class="input100" type="text" name="Username">--}}
{{--                        <span class="focus-input100"></span>--}}
{{--                        <span class="label-input100">Username</span>--}}
{{--                    </div>--}}
                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <input id="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Email</span>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input id="password" type="password" class="input100 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Password</span>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Password is required" >
                        <input class="input100" id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Confirm password</span>
                    </div>

                    <div class="flex-sb-m w-full p-t-3 p-b-32">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                            <label class="label-checkbox100" for="ckb1">
                                Remember me
                            </label>
                        </div>

                        <div>
                            <a href="#" class="txt1">
                                Forgot Password?
                            </a>
                        </div>
                    </div>


                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>

                    <div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							or sign up using
						</span>
                    </div>

                    <div class="login100-form-social flex-c-m">
                        <a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
                            <i class="fa fa-facebook-f" aria-hidden="true"></i>
                        </a>

                        <a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>

                <div class="login100-more" style="background-image: url('/loginAssets/images/bg-01.jpg');">
                </div>
            </div>
        </div>
    </div>





    <!--===============================================================================================-->
    <script src="/loginAssets/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--=========/loginAssets/======================================================================================-->
    <script src="/loginAssets/vendor/animsition/js/animsition.min.js"></script>
    <!--=========/loginAssets/======================================================================================-->
    <script src="/loginAssets/vendor/bootstrap/js/popper.js"></script>
    <script src="/loginAssets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--=========/loginAssets/======================================================================================-->
    <script src="/loginAssets/vendor/select2/select2.min.js"></script>
    <!--=========/loginAssets/======================================================================================-->
    <script src="/loginAssets/vendor/daterangepicker/moment.min.js"></script>
    <script src="/loginAssets/vendor/daterangepicker/daterangepicker.js"></script>
    <!--=========/loginAssets/======================================================================================-->
    <script src="/loginAssets/vendor/countdowntime/countdowntime.js"></script>
    <!--=========/loginAssets/======================================================================================-->
    <script src="/loginAssets/js/main.js"></script>
@endsection
