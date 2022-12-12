<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="icon" href="images/favicon.ico" type="image/ico" />
    <meta name="csrf_token" content="{{ csrf_token() }}" />
    <title>Dream soccer | </title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link href={{ asset("public/backend/vendors/font-awesome/css/font-awesome.min.css")}} rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href={{ asset("public/backend/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css")}} rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href={{ asset("public/backend/build/css/custom.min.css")}} rel="stylesheet">
    <link href={{ asset("public/backend/css/css.css")}} rel="stylesheet">
    <link href={{ asset("public/backend/css/image-uploader.min.css")}} rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    {{-- select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{ URL::to('home')}}" class="site_title"><i class="fa fa-paw"></i> <span>Dream soccer</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                @if(file_exists(public_path().'/uploads/'.auth::guard('admin')->user()->avt) && auth::guard('admin')->user()->avt != '')
                <img src="{{asset('/public/uploads/'.auth::guard('admin')->user()->avt) }}" class="img-circle profile_img">
                @else
                <img src="{{ asset('/public/frontend/images/user.png') }}" class="img-circle profile_img" alt="user-pic" />
                @endif
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{ Auth::guard('admin')->user()->name }}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="{{ URL::to('admin/dashboards') }}"><i class="fa fa-home"></i> Home</a></li>
                  <li><a><i class="fa fa-edit"></i> Quản lý sân bóng <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      @if(Auth::guard('admin')->user()->role == 1)
                      <li><a href="{{ URL::to('admin/ListPitch') }}">Danh sách sân bóng</a></li>
                      <li><a href="{{ URL::to('admin/add-pitch') }}">Thêm mới sân bóng</a></li>
                      @endif
                      @if(Auth::guard('admin')->user()->role == 0)
                      <li><a href="{{ URL::to('admin/ListPitchType') }}">Danh sách loại sân</a></li>
                      <li><a href="{{ URL::to('admin/add-pitchType') }}">Thêm loại sân</a></li>
                      @endif
                    </ul>
                  </li>
                  @if(Auth::guard('admin')->user()->role == 1)
                  <li><a><i class="fa fa-desktop"></i> Admin <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ URL::to('admin/ListAdmin') }}">Danh sách admin</a></li>
                      <li><a href="{{ URL::to('admin/AddAdmin') }}">Thêm admin</a></li>
                    </ul>
                  </li>
                  @endif
                  @if(Auth::guard('admin')->user()->role == 0)
                  <li><a><i class="fa fa-table"></i>Quản lý khung giờ<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ URL::to('admin/time-slot') }}">Danh sách khung giờ</a></li>
                      <li><a href="{{ URL::to('admin/add-time-slot') }}">Thêm khung giờ</a></li>
                    </ul>
                  </li>
                  <li><a href="{{ URL::to('admin/booking') }}"><i class="fa fa-bar-chart-o"></i>Booking</a></li>
                  @endif
                  <li><a><i class="fa fa-clone"></i>Tiện ích <span class="fa fa-chevron-down"></span>
                    <ul class="nav child_menu">
                      <li><a href="{{ URL::to('admin/extension') }}">Danh sách tiện ích</a></li>
                      <li><a href="{{ URL::to('admin/add-extension') }}">Thêm tiện ích</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ URL::to('admin/logout')}}">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    @if(file_exists(public_path().'/uploads/'.auth::guard('admin')->user()->avt) && auth::guard('admin')->user()->avt != '')
                    <img src="{{asset('/public/uploads/'.auth::guard('admin')->user()->avt) }}">
                    @else
                    <img src="{{ asset('/public/frontend/images/user.png') }}" />
                    @endif
                    {{ Auth::guard('admin')->user()->name }}
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="{{ URL::to('admin/profile/'.Auth::guard('admin')->id())}}"> Profile</a>
                      <a class="dropdown-item"  href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                  <a class="dropdown-item"  href="javascript:;">Help</a>
                    <a class="dropdown-item"  href="{{ URL::to('admin/logout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>

                <li role="presentation" class="nav-item dropdown open">
                  <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <div class="text-center">
                        <a class="dropdown-item">
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
        
        <!-- /page content -->
        @yield('content')
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src={{ asset ("public/backend/vendors/jquery/dist/jquery.min.js")}}></script>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Chart.js -->
    <script src={{ asset ("public/backend/vendors/Chart.js/dist/Chart.min.js")}}></script>
    <!-- gauge.js -->
    <script src={{ asset ("public/backend/vendors/gauge.js/dist/gauge.min.js")}}></script>
    <!-- bootstrap-progressbar -->
    <script src={{ asset ("public/backend/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js")}}></script>
    <!-- Custom Theme Scripts -->
    <script src={{ asset ("public/backend/build/js/custom.min.js")}}></script>
    {{-- ckeditor --}}
    <script src={{ asset ("public/backend/js/ckeditor.js")}}></script>
    <script src={{ asset ("public/backend/js/image-uploader.min.js")}}></script>

    {{-- select2 --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script>
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
