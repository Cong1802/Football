
@extends('layout')
@section('main_content')

    <!--============= PAGE-COVER =============-->
    <section class="page-cover" id="cover-login">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title">Trang đăng nhập</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
                        <li class="active">Đăng nhập</li>
                    </ul>
                </div>
                <!-- end columns -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- end page-cover -->
    <!--===== INNERPAGE-WRAPPER ====-->
    <section class="innerpage-wrapper">
        <div id="login" class="innerpage-section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="flex-content">
                            <div class="custom-form custom-form-fields">
                                <h3>ĐĂNG NHẬP</h3>
                                <p>Tìm đối giao lưu, kết bạn dễ dàng.</p>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div class="form-group">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus/>
                                        @error('email')
                                                <span class="invalid-feedback" role="alert" style="color:red">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                        
                                        <span><i class="fa fa-user"></i></span>
                                    </div>

                                    <div class="form-group">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password"/>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert" style="color:red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror


                                        <span><i class="fa fa-lock"></i></span>
                                    </div>

                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Giữ đăng nhập
                                        </label>
                                    </div>

                                    <button type=submit class="btn btn-orange btn-block">Đăng nhập</button>
                                </form>
                                <div class="other-links">
                                    <p class="link-line">Chưa có tài khoản ? <a href="{{ route('register') }}">Đăng ký</a></p>
                                    @if (Route::has('password.request'))
                                        <a class="simple-link" href="{{ route('password.request') }}">Quên mật khẩu ?</a>
                                    @endif
                                </div>
                                <!-- end other-links -->
                            </div>
                            <!-- end custom-form -->

                            <div class="flex-content-img custom-form-img">
                                <img src="{{asset('public/frontend/images/login1.jpg')}}" class="img-responsive" alt="registration-img" />
                            </div>
                            <!-- end custom-form-img -->
                        </div>
                        <!-- end form-content -->

                    </div>
                    <!-- end columns -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end login -->
    </section>
    <!-- end innerpage-wrapper -->

@endsection