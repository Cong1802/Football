@extends('layout')

@section('main_content')

   <!--=================== PAGE-COVER =================-->
    <section class="page-cover dashboard">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title">Danh sách các đội bóng</h1>
                    <ul class="breadcrumb">
                        <li> <a href="{{URL::to('/')}}"><i class="fa fa-home"></i> Trang chủ</a></li>
                        <li class="active">Danh sách các team</li>
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
                            <p>Tìm kiếm thep trình độ</p>

                            <nav class="filter-team">
                                <ul class="filter-team-list">
                                    <li class="filter-team-item filter-team-item--active">
                                        <a href="" class="filter-team-item__link">Mới chơi</a>
                                    </li>
                                    <li class="filter-team-item filter-team-item--active">
                                        <a href="" class="filter-team-item__link">Trung bình</a>
                                    </li>
                                    <li class="filter-team-item filter-team-item--active">
                                        <a href="" class="filter-team-item__link">Trung bình yếu</a>
                                    </li>
                                    <li class="filter-team-item filter-team-item--active">
                                        <a href="" class="filter-team-item__link">Trung bình khá</a>
                                    </li>
                                    <li class="filter-team-item filter-team-item--active">
                                        <a href="" class="filter-team-item__link">Khá</a>
                                    </li>
                                    <li class="filter-team-item filter-team-item--active">
                                        <a href="" class="filter-team-item__link">Khá mạnh</a>
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
                        @foreach($list_team as $key => $list_team_info)
                        <div class="list-block main-block f-list-block">
                            <div class="list-content">
                                <div class="main-img list-img f-list-img">
                                    <a href="flight-detail-left-sidebar.html">
                                        <div class="f-img">
                                            <img src="{{asset('public/storage/'.$list_team_info->team_logo)}}" class="img-responsive" alt="flight-img" />
                                        </div>
                                        <!-- end f-list-img -->
                                    </a>
                                </div>
                                <!-- end f-list-img -->

                                <div class="list-info f-list-info">

                                    <div class="list-team-info">
                                        <h3 class="t-info-heading">{{$list_team_info->team_name}}</h3>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td><span><i class="fa fa-shirtsinbulk"></i> </span>Tên đội bóng: </td>
                                                        <td>{{$list_team_info->team_name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><span><i class="fa fa-shirtsinbulk"></i> </span>Tên đội trưởng: </td>
                                                        <td>{{$list_team_info->name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><span><i class="fa fa-shirtsinbulk"></i> </span>Địa chỉ</td>
                                                        <td>{{$list_team_info->team_address}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><span><i class="fa fa-shirtsinbulk"></i> </span> Trình độ: </td>
                                                        <td>
                                                            @if($list_team_info->team_level==0)
                                                                Mới chơi
                                                            @endif
                                                            @if($list_team_info->team_level==1)
                                                                Trung bình
                                                            @endif      
                                                            @if($list_team_info->team_level==2)
                                                                Trung bình yếu
                                                            @endif  
                                                            @if($list_team_info->team_level==3)
                                                                Trung bình khá
                                                            @endif  
                                                            @if($list_team_info->team_level==4)
                                                                Khá
                                                            @endif  
                                                            @if($list_team_info->team_level==5)
                                                                Khá mạnh
                                                            @endif                     
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><span><i class="fa fa-quote-left"></i> </span>Giới thiệu: </td>
                                                        <td>{{$list_team_info->team_desc}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- end table-responsive -->
                                        {{-- <button type="submit" class="btn btn-orange" data-toggle="modal" data-target="#invite-team">Mời giao lưu</button> --}}


                                    </div>
                                    <!-- end f-list-info -->
                                </div>
                                <!-- end list-content -->
                            </div>
                        </div>
                        <!-- end f-list-block -->

@endforeach
                        <span>{!!$list_team->links()!!}</span>
                        {{-- <div class="pages">
                            <ol class="pagination">
                                <li><a href="#" aria-label="Previous"><span aria-hidden="true"><i class="fa fa-angle-left"></i></span></a></li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#" aria-label="Next"><span aria-hidden="true"><i class="fa fa-angle-right"></i></span></a></li>
                            </ol>
                        </div> --}}
                        <!-- end pages -->
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

    {{-- <div id="invite-team" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">Thông tin liên hệ</h3>
                    <p>Xin liên hệ qua số điện thoại để giao hữu</p>
                </div>
                <!-- end modal-header -->

                <div class="modal-body">
                    <form role="form" action="" method="post" enctype="multipart/form-data">
                     {{ csrf_field() }}
                        <div class="form-group">
                            <label for="">Tên đội bóng</label>
                                <input type="text" readonly class="form-control"  value="{{$list_team_info->team_name}}"/>
                        </div>
                        <!-- end form-group -->

                        <div class="form-group">
                            <label for="">Số điện thoại</label>
                            <input type="text" readonly  class="form-control"   value="{{$list_team_info->team_phone}}"/>
                        </div>
                        <!-- end form-group -->



                        <button type="submit" name="edit_team_info" class="btn btn-orange">Xác nhận</button>
                    </form>
                </div>
                <!-- end modal-bpdy -->
            </div>
            <!-- end modal-content -->
        </div>
        <!-- end modal-dialog -->
    </div> --}}
    <!-- end edit-profile -->



@include('layouts.count')
@endsection
