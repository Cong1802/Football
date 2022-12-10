@extends('layout')

@section('main_content')

    <!--========== PAGE-COVER =========-->
    <section class="page-cover dashboard">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title">Thông tin tài khoản</h1>
                    <ul class="breadcrumb">
                        <li> <a href="{{URL::to('/')}}"><i class="fa fa-home"></i> Trang chủ</a></li>
                        <li class="active">Tài khoản của tôi</li>
                    </ul>
                </div>
                <!-- end columns -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- end page-cover -->

@foreach($user_info as $key => $info)
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
                                            <h2>Thông tin cá nhân</h2>
                                            <p>cập nhật số điện thoại để tạo lời mời</p>
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
                                                    @if ($info->user_image)
                                                        <img src="{{asset('public/storage/'.$info->user_image)}}" class="img-responsive" alt="user-img" />
                                                    @else
                                                        <img src="{{asset('public/frontend/images/user.png')}}" alt="" class="img-responsive">
                                                    @endif
                                                </div>
                                                {{-- {{asset('public/uploads/gallery/'.$gal->gallery_image)}} --}}
                                                <!-- end columns -->

                                                <div class="col-sm-7 col-md-8  user-detail">
                                                    <ul class="list-unstyled">
                                                        <li><span>Họ và tên:</span> {{$info->name}}</li>
                                                        <li><span>Email:</span> {{$info->email}}</li>
                                                        <li><span>Điện thoại:</span>{{$info->user_phone}} </li>
                                                        <li>
                                                            <span>Giới tính:</span>
                                                                @if ($info->user_gender=1)
                                                                    Nam
                                                                @else
                                                                    Nữ
                                                                @endif
                                                        </li>
                                                        <li><span>Ngày sinh:</span> {{$info->user_date_of_birth}} </li>
                                                    </ul>
                                                    <button class="btn" data-toggle="modal" data-target="#edit-profile">Chỉnh sửa</button>
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


    <div id="edit-profile" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">Cập nhật thông tin</h3>
                </div>
                <!-- end modal-header -->

                <div class="modal-body user-infomation">
                    <form role="form" action="{{URL::to('/update-user-info/'.$info->id)}}" method="post" enctype="multipart/form-data">
                     {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Họ và tên</label>
                            <input type="text" name="name"class="form-control" id="name" value="{{$info->name}}"/>
                        </div>
                        <!-- end form-group -->

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" value="{{$info->email}}"/>
                        </div>
                        <!-- end form-group -->

                        <div class="form-group">
                            <label for="gender">Giới tính</label>
                            <select class="form-control" name="user_gender" id="gender">
                                <option value="1">Nam</option>
                                <option value="0">Nữ</option>
                            </select>
                        </div>
                        <!-- end form-group -->
                       
                        <div class="form-group">
                            <label for="user_date_of_birth">Ngày sinh</label>
                            <input type="text" name="user_date_of_birth" class="form-control" placeholder="MM/dd/yyyy" id="Ngày sinh" value="{{$info->user_phone}}" />
                        </div>
                        <!-- end form-group -->

                        <div class="form-group">
                            <label for="phone">Điện thoại</label>
                            <input type="text" name="user_phone" class="form-control" placeholder="Số điện thoại" id="phone" value="{{$info->user_phone}}" />
                        </div>
                        <!-- end form-group -->

                        <div class="form-group no-view">
                            <label for="team_id">Id team</label>
                            <input type="text" name="team_id" class="form-control" id="team_id" value="{{Auth::user()->id}}" />
                        </div>
                        <!-- end form-group -->

                        <div class="form-group">
                            <label for="avatar">Avatar</label>
                            <input type="file" name="user_image" class="form-control" id="avatar">
                            @if ($info->user_image)
                                <img src="{{asset('public/storage/'.$info->user_image)}}" width="100" height="100" alt="Hình ảnh" />
                            @else
                                <img src="{{asset('public/frontend/images/user.png')}}" alt="Hình ảnh" width="100" height="100">
                            @endif
                        </div>
                        <!-- end form-group -->

                        <button type="submit" name="edit_user_info" class="btn btn-orange">Lưu chỉnh sửa</button>
                    </form>
                </div>
                <!-- end modal-bpdy -->
            </div>
            <!-- end modal-content -->
        </div>
        <!-- end modal-dialog -->
    </div>
    <!-- end edit-profile -->
@endforeach
@include('layouts.count')
@endsection