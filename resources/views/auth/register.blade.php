
@extends('layout')
@section('main_content')

    <!--================ PAGE-COVER =================-->
    <section class="page-cover" id="cover-registration">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title">Trang đăng ký</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
                        <li class="active"> Đăng ký</li>
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
        <div id="registration" class="innerpage-section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="flex-content">
                            <div class="custom-form custom-form-fields">
                                <h3>TẠO TÀI KHOẢN</h3>
                                <p>Tìm đối giao lưu, kết bạn dễ dàng.</p>
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Username" required autocomplete="Username" autofocus/>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <span><i class="fa fa-user"></i></span>
                                    </div>

                                    <div class="form-group">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <span><i class="fa fa-envelope"></i></span>
                                    </div>

                                    <div class="form-group">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <span><i class="fa fa-lock"></i></span>
                                    </div>

                                    <div class="form-group">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                                        <span><i class="fa fa-lock"></i></span>
                                    </div>

                                    <button type="submit" class="btn btn-orange btn-block">Đăng ký</button>
                                </form>

                                <div class="other-links">
                                    <p class="link-line">Đã có tài khoản ? <a href="{{ route('login') }}">Đăng nhập ở đây</a></p>
                                </div>
                                <!-- end other-links -->
                            </div>
                            <!-- end custom-form -->

                            <div class="flex-content-img custom-form-img">
                                <img src="{{asset('public/frontend/images/login2.jpg')}}" class="img-responsive" alt="registration-img" />
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
        <!-- end registration -->
    </section>
    <!-- end innerpage-wrapper -->

@endsection