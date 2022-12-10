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
                        <li class="active">Danh sách đội đang chờ</li>
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

                    <div class="col-xs-12 col-sm-12 col-md-3 side-bar left-side-bar">
                        <div class="side-bar-block filter-block">
                            <h3>Lọc kết quả</h3>
                            <p>Tìm kiếm theo trình độ</p>

                            <nav class="filter-team">
                                <ul class="filter-team-list">
                                    <li class="filter-team-item filter-team-item--active">
                                        <a href="{{URL::to('/match-mc')}}" class="filter-team-item__link">Mới chơi</a>
                                    </li>
                                    <li class="filter-team-item filter-team-item--active">
                                        <a href="{{URL::to('/match-tb')}}" class="filter-team-item__link">Trung bình</a>
                                    </li>
                                    <li class="filter-team-item filter-team-item--active">
                                        <a href="{{URL::to('/match-tby')}}" class="filter-team-item__link">Trung bình yếu</a>
                                    </li>
                                    <li class="filter-team-item filter-team-item--active">
                                        <a href="{{URL::to('/match-tbk')}}" class="filter-team-item__link">Trung bình khá</a>
                                    </li>
                                    <li class="filter-team-item filter-team-item--active">
                                        <a href="{{URL::to('/match-k')}}" class="filter-team-item__link">Khá</a>
                                    </li>
                                    <li class="filter-team-item filter-team-item--active">
                                        <a href="{{URL::to('/match-km')}}" class="filter-team-item__link">Khá mạnh</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!-- end side-bar-block -->

                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-12">
                                <div class="side-bar-block support-block">
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

                    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 content-side">
                    @foreach($match_k as $key => $list_match_k)
                        <div class="list-block main-block f-list-block">
                            <div class="list-content">
                                <div class="list-info f-list-info">

                                    <div class="list-team-info lmatch">
                                        <h3 class="t-info-heading">{{$list_match_k->team_name}}</h3>
                                        <p>Xin liên hệ qua số điện thoại để sắp đặt trận đấu giao hữu</p>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td><span><i class="fa fa-calendar"></i> </span> Thời gian: </td>
                                                        <td>
                                                            {{$list_match_k->match_time}} 
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><span><i class="fa fa-phone"></i> </span> Số điện thoại liên hệ: </td>
                                                        <td>
                                                            {{$list_match_k->team_phone}} 
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><span><i class="fa fa-shirtsinbulk"></i> </span> Trình độ: </td>
                                                        <td>
                                                            @if($list_match_k->match_team_level==0)
                                                                Mới chơi
                                                            @endif
                                                            @if($list_match_k->match_team_level==1)
                                                                Trung bình
                                                            @endif      
                                                            @if($list_match_k->match_team_level==2)
                                                                Trung bình yếu
                                                            @endif  
                                                            @if($list_match_k->match_team_level==3)
                                                                Trung bình khá
                                                            @endif  
                                                            @if($list_match_k->match_team_level==4)
                                                                Khá
                                                            @endif  
                                                            @if($list_match_k->match_team_level==5)
                                                                Khá mạnh
                                                            @endif  
                                                        
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><span><i class="fa fa-shirtsinbulk"></i> </span>Tình trạng</td>
                                                        <td>                                                        
                                                            @if($list_match_k->match_status==1)
                                                                <span class="text-primary">Đã có kèo</span>
                                                            @else
                                                                <span class="wait-for-match">Đang chờ</span>

                                                            @endif                                                       
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><span><i class="fa fa-quote-left"></i> </span>Lời nhắn:</td>
                                                        <td>{{$list_match_k->match_desc}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                    <!-- end f-list-info -->
                                </div>
                                <!-- end list-content -->
                            </div>
                        </div>
                        <!-- end f-list-block -->
                    @endforeach

                    <span>{!!$match_k->links()!!}</span>
                    
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
