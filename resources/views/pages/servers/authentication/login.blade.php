@extends('layouts.servers.login_and_register')
@section('content')

    <!-- Sing in  Form -->
    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="{{ asset('servers/login/images/signin-image.jpg') }}" alt="sing up image"></figure>
                    <a href="#" class="signup-image-link">Tạo tài khoản</a>
                </div>

                <div class="signin-form">
                    <h2 class="form-title">Sign up</h2>
                    <form action="{{ route('server.login.auth') }}" method="POST" class="register-form" id="login-form">
                        @csrf
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="email" name="email" id="email" placeholder="Email"
                                value="{{ old('email') ?? '' }}" />
                        </div>
                        <div class="form-group">
                            <label for="password"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="password" placeholder="Password" />
                        </div>
                        <div class="form-group">
                            @if (old('remember-me'))
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" checked />
                            @else
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                            @endif
                            <label for="remember-me" class="label-agree-term"><span><span></span></span>Ghi nhớ</label>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="Đăng Nhập" />
                        </div>
                    </form>
                    <div class="social-login">
                        <span class="social-label">Đăng nhập với</span>
                        <ul class="socials">
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
