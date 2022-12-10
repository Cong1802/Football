@extends('layout')

@section('main_content')
    <!--========== PAGE-COVER =========-->
    <section class="page-cover dashboard">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title">Đội bóng</h1>
                    <ul class="breadcrumb">
                        <li> <a href="#"><i class="fa fa-home"></i> Trang chủ</a></li>
                        <li class="active">Tạo đội bóng</li>
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
        <div id="team-listing" class="innerpage-section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-12 side-bar left-side-bar">

                        <div class="side-bar-block cteate-match-form-block">
                            <h2 class="match-title">Tạo đội bóng</h2>
                            <p class="match-note ">Xin tạo đội bóng để có thể tạo các trận giao hữu</p>
                            <div class="cteate-match-form team">
                                <h3>Thêm đội bóng mới</h3>
                                @if(session('success'))
                                    <div class="alert alert-success">
                                        {{session('success')}}
                                    </div>
                                @endif
                                @if(session('error'))
                                    <div class="alert alert-danger">
                                        {{session('error')}}
                                    </div>
                                @endif
                                <hr>
                                <form role="form" action="{{URL::to('/insert-team')}}" method="post" enctype="multipart/form-data">
                                 {{ csrf_field() }}
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="team_name">Tên đội: </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="team_name" name="team_name" required/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="team_phone">Số điện thoại: </label>
                                        <div class="col-sm-10">
                                                <input type="text" class="form-control" id="team_phone" name="team_phone" required/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="team_address">Địa chỉ: </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="team_address" name="team_address" required/>
                                        </div>
                                    </div>

                                    <div class="form-group row ">
                                        <label class="col-sm-2 col-form-label" for="team_level">Trình độ: </label>
                                        <div class="col-sm-10 right-icon">
                                            <select class="form-control" id="team_level" name="team_level" required>
                                                <option selected value="0" >Mới chơi</option>
                                                <option value="1" >Trung bình</option>
                                                <option value="2" >Trung bình yếu</option>
                                                <option value="3" >Trung bình khá</option>
                                                <option value="4" >Khá</option>
                                                <option value="5">Khá mạnh</option>
                                            </select>
                                            <span><i class="fa fa-angle-down i"></i></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="team_logo">logo: </label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" id="team_logo" name="team_logo" required/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="team_desc">Giới thiệu: </label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" rows="4" resize="none" id="team_desc" name="team_desc" required></textarea>
                                        </div>
                                    </div>


                                    <button type="submit" class="btn btn-orange b">Cập nhật</button>
                                </form>

                            </div>
                            <!-- end booking-form -->
                        </div>
                        <!-- end side-bar-block -->
                    </div>
                    <!-- end columns -->


                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end flight-detail -->
    </section>
    <!-- end innerpage-wrapper -->
@include('layouts.count')
@endsection
