@extends('layout')

@section('main_content')



       <!--=================== PAGE-COVER =================-->
    <section class="page-cover dashboard">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title">Tìm đối thủ đá bóng</h1>
                    <ul class="breadcrumb">
                        <li> <a href="{{URL::to('/')}}"><i class="fa fa-home"></i> Trang chủ</a></li>
                        <li class="active">Lịch sử lời mời</li>
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

                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 content-side">
                    @foreach($match_history as $key => $match_history_info)
                        <div class="list-block main-block f-list-block">
                            <div class="list-content">
                                <div class="list-info f-list-info">
                                    <div class="list-team-info lmatch">
                                        <h3 class="t-info-heading">{{$match_history_info->team_name}}</h3>
            	                        <?php 
                                            $message=Session::get('message');
                                            if($message){
                                                echo $message;
                                                Session::put('message',null);
                                            }
                                        ?>
                                        <div class="table-responsive">                                        
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td><span><i class="fa fa-calendar"></i> </span> Thời gian: </td>
                                                        <td>
                                                            {{$match_history_info->match_time}} 
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><span><i class="fa fa-phone"></i> </span> Số điện thoại liên hệ: </td>
                                                        <td>
                                                            {{$match_history_info->team_phone}} 
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><span><i class="fa fa-shirtsinbulk"></i> </span> Trình độ: </td>
                                                        <td>
                                                            @if($match_history_info->match_team_level==0)
                                                                Mới chơi
                                                            @endif
                                                            @if($match_history_info->match_team_level==1)
                                                                Trung bình
                                                            @endif      
                                                            @if($match_history_info->match_team_level==2)
                                                                Trung bình yếu
                                                            @endif  
                                                            @if($match_history_info->match_team_level==3)
                                                                Trung bình khá
                                                            @endif  
                                                            @if($match_history_info->match_team_level==4)
                                                                Khá
                                                            @endif  
                                                            @if($match_history_info->match_team_level==5)
                                                                Khá mạnh
                                                            @endif  
                                                        
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><span><i class="fa fa-shirtsinbulk"></i> </span>Tình trạng</td>
                                                        <td>                                                        
                                                            {{-- @if($match_history_info->match_status==1)
                                                                <span class="text-primary">Đã có kèo</span>
                                                            @else
                                                                <span class="wait-for-match">Đang chờ</span>
                                                            @endif                                                        --}}
                                                            <?php
                                                            if ($match_history_info->match_status==1){
                                                            ?>
                                                            <a href="{{URL::to('/waiting-for-match/'.$match_history_info->match_id)}}"><span style="font-size: 18px" class="fa fa-thumbs-up text-primary">Đã có kèo</span></a>
                                                            <?php  
                                                            }else{  
                                                            ?>              
                                                            <a href="{{URL::to('/accept-macth/'.$match_history_info->match_id)}}"><span style="font-size: 18px" class="fa fa-thumbs-down wait-for-match">Đang chờ</span></a>
                                                            <?php
                                                            }  
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><span><i class="fa fa-quote-left"></i> </span>Lời nhắn:</td>
                                                        <td>{{$match_history_info->match_desc}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- end table-responsive -->
                                        {{-- <button type="submit" class="btn btn-orange" data-toggle="modal" data-target="#invite-match">Mời giao lưu</button> --}}

                                    </div>
                                    <!-- end f-list-info -->
                                </div>
                                <!-- end list-content -->
                            </div>
                        </div>
                        <!-- end f-list-block -->
                    @endforeach
        
                    </div>
                    <!-- end columns -->

                    <div class="col-xs-12 col-sm-12 col-md-4 side-bar left-side-bar">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-12">
                                <div class="side-bar-block support-history-block">
                                    <h3>Cần giúp đỡ</h3>
                                    <p>Xin vui lòng liên hệ số điện thoại dưới đây.</p>
                                    <div class="support-contact">
                                        <span><i class="fa fa-phone"></i></span>
                                        <p>+1 123 1234567</p>
                                    </div>
                                    <!-- end support-contact -->
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
        <!-- end team-listing -->
    </section>
    <!-- end innerpage-wrapper -->

@include('layouts.count')
@endsection
