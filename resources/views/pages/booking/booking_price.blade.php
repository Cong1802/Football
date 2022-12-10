@extends('layout')

@section('main_content')
       <!--=================== PAGE-COVER =================-->
    <section class="page-cover dashboard">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title">Trang thông tin giá đặt sân</h1>
                    <ul class="breadcrumb">
                        <li> <a href="{{URL::to('/')}}"><i class="fa fa-home"></i> Trang chủ</a></li>
                        <li class="active">Giá sân bóng</li>
                    </ul>
                </div>
                <!-- end columns -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- end page-cover -->
    <!--==== INNERPAGE-WRAPPER =====-->
    <section class="innerpage-wrapper">
        <div id="thank-you" class="innerpage-section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 content-side">
                        <div class="space-right">
                            <div class="thank-you-note">
                                <h3>Sân Bóng Trường Đại Học Nha Trang</h3>
                                <p>Số 2 Nguyễn Đình Chiểu, Vĩnh Thọ, Thành phố Nha Trang, Khánh Hòa 650000.</p>
                                <a href="#" class="btn btn-orange">0 9 0 5 6 9 2 0 3 0</a>
                            </div>
                            <!-- end thank-you-note -->

                      
                            <div class="list-team-info">
                                <h3 class="ds-info-heading"><span><i class="fa fa-soccer-ball-o"></i></span>Giá thuê sân 5</h3>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                        @foreach($field_price as $key => $fp)   
                                        @if ($fp->field_type_id == 1)  
                                            <tr>
                                                <td>{{$fp->field_price_time}}</td>
                                                <td>{{$fp->field_price_unit_price}} vnđ / phút</td>
                                            </tr>
                                        @endif               
                                        @endforeach                                            
                                        </tbody>
                                    </table>
                                </div>
                                <!-- end table-responsive -->
                            </div>


                            <div class="list-team-info">
                                <h3 class="ds-info-heading"><span><i class="fa fa-soccer-ball-o"></i></span>Giá thuê sân 7</h3>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                        @foreach($field_price as $key => $fp)   
                                        @if ($fp->field_type_id == 2)  
                                            <tr>
                                                <td>{{$fp->field_price_time}}</td>
                                                <td>{{$fp->field_price_unit_price}} vnđ / phút</td>
                                            </tr>
                                        @endif               
                                        @endforeach                                            
                                        </tbody>
                                    </table>
                                </div>
                                <!-- end table-responsive -->
                            </div>

                            <div class="list-team-info">
                                <h3 class="ds-info-heading"><span><i class="fa fa-soccer-ball-o"></i></span>Giá thuê sân 11</h3>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                        @foreach($field_price as $key => $fp)   
                                        @if ($fp->field_type_id == 3)  
                                            <tr>
                                                <td>{{$fp->field_price_time}}</td>
                                                <td>{{$fp->field_price_unit_price}} vnđ / phút</td>
                                            </tr>
                                        @endif               
                                        @endforeach                                            
                                        </tbody>
                                    </table>
                                </div>
                                <!-- end table-responsive -->
                            </div>

                            <div class="list-team-info">
                                <h3 class="ds-info-heading"><span><i class="fa fa-soccer-ball-o"></i></span>Giá thuê sân Futsal</h3>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                        @foreach($field_price as $key => $fp)   
                                        @if ($fp->field_type_id == 4)  
                                            <tr>
                                                <td>{{$fp->field_price_time}}</td>
                                                <td>{{$fp->field_price_unit_price}} vnđ / phút</td>
                                            </tr>
                                        @endif               
                                        @endforeach                                            
                                        </tbody>
                                    </table>
                                </div>
                                <!-- end table-responsive -->
                            </div>           
                        </div>
                        <!-- end space-right -->
                    </div>
                    <!-- end columns -->

                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 side-bar blog-sidebar right-side-bar">

                        <div class="row">


                            <div class="col-xs-12 col-sm-6 col-md-12">
                                <div class="side-bar-block contact">
                                    <h2 class="side-bar-heading">Cần trợ giúp ?</h2>
                                    <div class="c-list">
                                        <div class="icon"><span><i class="fa fa-envelope"></i></span></div>
                                        <div class="text">
                                            <p>DHNT.Football@gmail.com</p>
                                        </div>
                                    </div>
                                    <!-- end c-list -->

                                    <div class="c-list">
                                        <div class="icon"><span><i class="fa fa-phone"></i></span></div>
                                        <div class="text">
                                            <p>+905-692-30</p>
                                        </div>
                                    </div>
                                    <!-- end c-list -->

                                    <div class="c-list">
                                        <div class="icon"><span><i class="fa fa-map-marker"></i></span></div>
                                        <div class="text">
                                            <p>Số 2 Nguyễn Đình Chiểu, Vĩnh Thọ, Thành phố Nha Trang, Khánh Hòa 650000.</p>
                                        </div>
                                    </div>
                                    <!-- end c-list -->
                                </div>
                                <!-- end side-bar-block -->
                            </div>
                            <!-- end columns -->

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="side-bar-block follow-us">
                                    <h2 class="side-bar-heading">Follow Us</h2>
                                    <ul class="list-unstyled list-inline">
                                        <li><a href="#"><span><i class="fa fa-facebook"></i></span></a></li>
                                        <li><a href="#"><span><i class="fa fa-twitter"></i></span></a></li>
                                        <li><a href="#"><span><i class="fa fa-linkedin"></i></span></a></li>
                                        <li><a href="#"><span><i class="fa fa-google-plus"></i></span></a></li>
                                        <li><a href="#"><span><i class="fa fa-pinterest-p"></i></span></a></li>
                                    </ul>
                                </div>
                                <!-- end side-bar-block -->
                            </div>
                            <!-- end columns -->

                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end columns -->

                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end thank-you -->
    </section>
    <!-- end innerpage-wrapper -->

@include('layouts.count')
@endsection
