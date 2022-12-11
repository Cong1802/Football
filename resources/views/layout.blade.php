
<!doctype html>
<html lang="en">

<head>
    <title>28 FOOTBALL</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf_token" content="{{ csrf_token() }}" />
    <link rel="icon" href="{{asset('public/frontend/images/favicon.png')}}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i,900,900i%7CMerriweather:300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">    <link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/orange.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/flexslider.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/magnific-popup.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/hanhmade.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @stack('css')
</head>
<body id="homepage" style="background-image:url('{{ asset('public/frontend/images/bg.jpg') }}')">

        <!--====== LOADER =====-->
        <div class="loader"></div>
        <!--============= TOP-BAR ===========-->
        <nav class="navbar navbar-default main-navbar navbar-custom navbar-white" id="mynavbar">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" id="menu-button">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <a href="{{URL::to('/')}}" class="navbar-brand"><span><i class="fa fa-soccer-ball-o"></i>28 </span>FOOTBALL</a>
                </div>
                <!-- end navbar-header -->

                <div id="Navbar">
                    <ul class="nav">
                        <li><a href="{{URL::to('/')}}">Trang chủ<span></span></a></li>
                        <li><a href="{{ URL::to('/search') }}">Sân bóng<span></span></a></li>
                        <li><a href="{{ URL::to('/history-booking') }}">Thông tin đặt sân<span></span></a></li>
                        @if (Auth::guard('web')->user())
                            @auth
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle user-home" data-toggle="dropdown">
                                    <span>
                                        @if (Auth::user()->user_image)
                                            <img src="{{asset('public/storage/'.Auth::user()->user_image)}}" alt="" class="user-img-home">
                                        @else
                                            <img src="{{asset('public/frontend/images/user.png')}}" alt="" class="user-img-home">
                                        @endif
                                    </span> 
                                    <span>{{ Auth::user()->name }}</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-item"><a href="{{URL::to('/user-infomation/'.Auth::user()->id)}}"><ion-icon name="person-circle-outline"></ion-icon> Thông tin tài khoản</a></li>
                                    <li class="dropdown-item"><a href="{{URL::to('/history-booking')}}"><ion-icon name="document-text-outline"></ion-icon> Lịch sử đặt sân</a></li>
                                    <li class="dropdown-item">
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"><ion-icon name="log-in-outline"></ion-icon> Đăng xuất
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            @endauth 
                        @else
                            <li><a href="{{ route('login') }}">Đăng nhập<span></span></a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container body">
        <div class="sidenav-content">
            <div id="mySidenav" class="sidenav" >
                <h2 id="web-name"><span><i class="fa fa-soccer-ball-o"></i></span>28 FOOTBALL</h2>

                <div id="main-menu">
                    <div class="closebtn">
                        <button class="btn btn-default" id="closebtn">&times;</button>
                    </div><!-- end close-btn -->
                    
                    <div class="list-group panel">
                    
                        <a href="#home-links" class="list-group-item active" data-toggle="collapse" data-parent="#main-menu"><span><i class="fa fa-home link-icon"></i></span>Trang chủ<span><i class="fa fa-chevron-down arrow"></i></span></a>
                        <div class="collapse sub-menu" id="home-links">
                            <a href="{{URL::to('/')}}" class="list-group-item active">Trang chính</a>
                            @if (Route::has('login'))
                            @auth
                                <a href="{{URL::to('/booking')}}" class="list-group-item">Đặt sân</a>
                            @else
                                <a href="{{URL::to('/booking')}}" class="list-group-item">Thông tin giá sân</a>
                            @endauth 
                            @endif
                            <a href="{{URL::to('/list-match')}}" class="list-group-item">Tìm đối thủ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @yield('main_content')
        <!--======================= FOOTER =======================-->
        <section id="footer" class="ftr-heading-o ftr-heading-mgn-1">
            <div id="footer-top" class="p-5 ftr-top-grey ftr-text-white">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 footer-widget ftr-about">
                            <img src="https://theanh28.vn/data/assets/logo/logo-web281.png">
                            <ul class="social-links list-inline justify-content-center d-flex list-unstyled">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2 footer-widget ftr-links">
                            <h3 class="footer-heading">TRANG</h3>
                            <ul class="list-unstyled">
                                <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
                                <li><a href="{{URL::to('/list-team')}}">Tìm đối</a></li>
                                <li><a href="{{URL::to('/dat-san')}}">Đặt sân</a></li>
                                <li><a href="{{URL::to('/list-team')}}">Danh sách</a></li>
                                <li><a href="{{URL::to('/404')}}">404 Page</a></li>
                            </ul>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 footer-widget ftr-links ftr-pad-left">
                            <h3 class="footer-heading">CHỨC NĂNG</h3>
                            <ul class="list-unstyled">
                                <li><a href="{{URL::to('/introduce')}}">Giới thiệu</a></li>
                                <li><a href="{{ route('login') }}">Đăng nhập</a></li>
                                <li><a href="{{ route('register') }}">Đăng ký</a></li>
                                <li><a href="{{URL::to('/create-team')}}">Tạo đội</a></li>
                                <li><a href="{{URL::to('/map')}}">Site Map</a></li>
                            </ul>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 footer-widget ftr-contact">
                            <h3 class="footer-heading">LIÊN HỆ</h3>
                            <ul class="list-unstyled">
                                <li><ion-icon name="location-sharp"></ion-icon> Luxury park view</li>
                                <li><ion-icon name="call-sharp"></ion-icon> +00 123 4567</li>
                                <li><ion-icon name="paper-plane-sharp"></ion-icon> 28.Football@gmail.com</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div id="footer-bottom">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class=" py-2" id="copyright">
                            <p class="text-center">©{{ date('Y',time()) }} <a href="#"> - DEV28 - Football Club.</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="{{asset('public/frontend/js/jquery.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.flexslider.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="{{asset('public/frontend/js/custom-navigation.js')}}"></script>
    <script src="{{asset('public/frontend/js/custom-flex.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $('select').select2({ });
        $.ajaxSetup({
          headers:
          {
              'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
          }
        });
    </script>
    @stack('js')
</body>

</html>