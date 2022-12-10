@extends('layout')

@section('main_content')
    <!--========== PAGE-COVER =========-->
    <section class="page-cover dashboard">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title">Đội bóng</h1>
                    <ul class="breadcrumb">
                        <li> <a href="{{URL::to('/')}}"><i class="fa fa-home"></i> Trang chủ</a></li>
                        <li class="active">Đội bóng của tôi</li>
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
        <div id="dashboard" class="user-section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="dashboard-wrapper">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 dashboard-content user-profile">
                                
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h2>Thông tin đội bóng</h2>
                                        </div>
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
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-sm-5 col-md-4 user-img">
                                                    <img src="{{asset('public/storage/'.$my_team_id->team_logo)}}" class="img-responsive" alt="user-img" />
                                                </div>
                                                {{-- {{asset('public/uploads/gallery/'.$gal->gallery_image)}} --}}
                                                <!-- end columns -->

                                                <div class="col-sm-7 col-md-8  user-detail">
                                                    <ul class="list-unstyled">
                                                        <li><span>Tên đội bóng:  </span> {{$my_team_id->team_name}}</li>
                                                        <li><span>Địa chỉ: </span> {{$my_team_id->team_address}} </li>
                                                        <li><span>Số điện thoại: </span>{{$my_team_id->team_phone}} </li>
                                                        <li>
                                                            <span>
                                                                Trình độ: 
                                                            </span> 
                                                                @if($my_team_id->team_level==0)
                                                                    Mới chơi
                                                                @endif
                                                                @if($my_team_id->team_level==1)
                                                                    Trung bình
                                                                @endif      
                                                                @if($my_team_id->team_level==2)
                                                                    Trung bình yếu
                                                                @endif  
                                                                @if($my_team_id->team_level==3)
                                                                    Trung bình khá
                                                                @endif  
                                                                @if($my_team_id->team_level==4)
                                                                    Khá
                                                                @endif  
                                                                @if($my_team_id->team_level==5)
                                                                    Khá mạnh
                                                                @endif  
                                                                
                                                        </li>

                                                        <li><span>Giới thiệu: </span> {{$my_team_id->team_desc}} </li>
                                                    </ul>
                                                    <button class="btn btn-orange" data-toggle="modal" data-target="#edit-team-profile">Cập nhật</button>
                                                </div>
                                                <!-- end columns -->
                                            </div>
                                            <!-- end row -->

                                        </div>
                                        <!-- end panel-body -->
                                    </div>
                                    <!-- end panel-detault -->
                                </div>
                                <!-- end columns -->

                            </div>
                            <!-- end row -->
                        </div>
                        <!-- end dashboard-wrapper -->
                    </div>
                    <!-- end columns -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end dashboard -->
    </section>
    <!-- end innerpage-wrapper -->


    <div id="edit-team-profile" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">Cập nhật thông tin</h3>
                </div>
                <!-- end modal-header -->

                <div class="modal-body">
                    <form role="form" action="{{URL::to('/update-team-info/'.$my_team_id->team_id)}}" method="post" enctype="multipart/form-data">
                     {{ csrf_field() }}
                        <div class="form-group">
                            <label for="team_name">Tên đội bóng</label>
                            <input type="text" name="team_name"class="form-control" id="team_name" value="{{$my_team_id->team_name}}"/>
                        </div>
                        <!-- end form-group -->

                        <div class="form-group">
                            <label for="team_phone">Số điện thoại</label>
                            <input type="text" name="team_phone" class="form-control"  id="team_phone" value="{{$my_team_id->team_phone}}"/>
                        </div>
                        <!-- end form-group -->

                        <div class="form-group">
                            <label for="team_address">Địa chỉ</label>
                            <input type="text" name="team_address" class="form-control"  id="team_address" value="{{$my_team_id->team_address}}"/>
                        </div>
                        <!-- end form-group -->

                        <div class="form-group">
                            <label for="team_level">Trình độ</label>
                            <select class="form-control" id="team_level" name="team_level">
                                <option selected value="0" >Mới chơi</option>
                                <option value="1" >Trung bình</option>
                                <option value="2" >Trung bình yếu</option>
                                <option value="3" >Trung bình khá</option>
                                <option value="4" >Khá</option>
                                <option value="5">Khá mạnh</option>
                            </select>
                        </div>
                        <!-- end form-group -->

                        <div class="form-group">
                            <label for="team_desc">Giới thiệu</label>
                            <textarea class="form-control" rows="4" resize="none" id="team_desc" name="team_desc">{{$my_team_id->team_desc}}</textarea>
                        </div>
                        <!-- end form-group -->
                        <div class="form-group">
                            <label for="logo">Logo</label>
                            <input type="file" name="team_logo" class="form-control" id="logo">
                            <img src="{{asset('public/storage/'.$my_team_id->team_logo)}}" width="100" height="100" alt="user-img" />
                        </div>
                        <!-- end form-group -->
                        

                        <button type="submit" name="edit_team_info" class="btn btn-orange">Lưu thông tin</button>
                    </form>
                </div>
                <!-- end modal-bpdy -->
            </div>
            <!-- end modal-content -->
        </div>
        <!-- end modal-dialog -->
    </div>
    <!-- end edit-profile -->

@include('layouts.count')
@endsection
