@extends('layout')

@section('main_content')

    <!--========== PAGE-COVER =========-->
    <section class="page-cover dashboard">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title">Tạo lời mời trận đấu</h1>
                    <ul class="breadcrumb">
                        <li> <a href="#"><i class="fa fa-home"></i> Trang chủ</a></li>
                        <li class="active">Tạo lời mời trận đấu</li>
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
                            <h2 class="match-title">Tạo bản tin</h2>
                            <div class="cteate-match-form match">
                                <h3>Tạo lời mời giao hữu</h3>
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

                                <form role="form" action="{{URL::to('/insert-match')}}" method="post">
                                 {{ csrf_field() }}
                                    <div class="form-group">
                                        <input type="text" class="form-control dpd1" placeholder="Thời gian" name="match_time" required/> <i class="fa fa-calendar"></i>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" readonly class="form-control" placeholder="Đội bóng" name="match_team" value="{{$cteam_info[Auth::user()->id-1]->team_name}}" required/>
                                    </div>
 
                                    <div class="form-group right-icon">
                                        <select class="form-control" id="match_team_level" name="match_team_level">
                                                <option selected value="0" >Mới chơi</option>
                                                <option value="1" >Trung bình</option>
                                                <option value="2" >Trung bình yếu</option>
                                                <option value="3" >Trung bình khá</option>
                                                <option value="4" >Khá</option>
                                                <option value="5">Khá mạnh</option>
                                        </select>
                                        <i class="fa fa-angle-down"></i>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Lời nhắn" name="match_desc" required/>
                                    </div>

                                    <div class="form-group right-icon">
                                        <select class="form-control" name="match_status">
                                            <option value="0">Đang chờ</option>
                                            <option value="1">Đã có kèo</option>
                                        </select>
                                        <i class="fa fa-angle-down"></i>
                                    </div>

                                    <div class="form-group no-view">
                                        <input type="text" class="form-control"  name="team_id" value="{{$cteam_info[Auth::user()->id-1]->team_id}}" required/>
                                    </div>

                                    <button type="submit" class="btn btn-block btn-orange">Đăng</button>
                                </form>

                            </div>
                            <!-- end cteate-match-form -->
                        </div>
                        <!-- end side-bar-block -->

                    </div>
                    <!-- end columns -->



                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end team-listing -->
    </section>
    <!-- end innerpage-wrapper -->
@include('layouts.count')
@endsection