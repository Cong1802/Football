@extends('AdminLayout')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div>
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Thêm mới sân bóng</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Settings 1</a>
                                    <a class="dropdown-item" href="#">Settings 2</a>
                                </div>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
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
                        <form class="form-horizontal form-label-left" action="{{ URL::to('admin/update-profile') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">Avatar</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <div class="text-center d-flex justify-content-center">
                                        <div class="col-6 d-flex justify-content-center align-item-center img-fluid img-circle" style="align-items:center">
                                            <label for="upload_logo" style="height:fit-content">
                                                <div class="upload_logo_vehicle position_r profile-user-img">
                                                    @if(file_exists( public_path().'/uploads/'.Auth::guard('admin')->user()->avt ) && Auth::guard('admin')->user()->avt != '')
                                                    <img src={{ asset('public/uploads/'.Auth::guard('admin')->user()->avt)}} alt="">
                                                    @else
                                                    <img src={{ asset('public/backend/images/add_logo.svg') }} alt="">
                                                    @endif
                                                    <input type="file" id="upload_logo" name="avatar" class="profile-user-img upload_logo display_none" accept=".png, .jpg, .jpeg">
                                                </div>
                                                @error('avatar')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </label>
                                            <div class="upload_logo_vehicle_done position_r display_none profile-user-img">
                                                <img class="ready_upload_logo" src={{ asset('public/backend/images/add_logo.svg')}} alt="">
                                                <img class="add_logo_hover position_a" src={{ asset('public/backend/images/add_logo_hover.png')}} alt="">
                                                <label for="upload_logo">
                                                    <img class="add_logo position_a" src={{ asset('public/backend/images/add_photo.png')}} alt="">
                                                    <input type="file" id="upload_logo" class=" display_none upload_logo" accept=".png, .jpg, .jpeg">
                                                </label>
                                                <img class="del_logo position_a" src={{ asset('public/backend/images/dell_logo.svg')}} alt="">
                                            </div>
                                          </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">Họ tên</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" value="{{ $admin->name }}" class="form-control" required name="name" placeholder="Nhập tên họ tên...">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Số điện thoại</span>
                                </label>
                                <div class="col-md-9 col-sm-9">
                                    <input class="form-control pr-5" value="{{ $admin->phone }}" required name="phone" placeholder="Nhập số điện thoại..."/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Email</span>
                                </label>
                                <div class="col-md-9 col-sm-9">
                                    <input class="form-control pr-5" value="{{ $admin->email }}" required name="email" placeholder="Nhập email..."/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Thành phố</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <select onchange="change_address(this,'districts','ajaxGetListDistricts','Chọn quận huyện','1')" id="select_city" name="city" class="form-control">
                                        <option disabled selected>Thành phố</option>
                                        <?php foreach($city as $key =>$value): ?>
                                        <option @if($value->cit_id == $admin->city) selected @endif value="{{$value->cit_id}}">{{ $value->cit_name}}</option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Quận/huyện</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <select onchange="change_address(this,'wards','ajaxGetListWards','Chọn phường xã','2')" name="district" class="districts form-control">
                                        <option disabled selected>Chọn quận/huyện</option>
                                        <?php foreach($district as $key =>$value): ?>
                                        <option @if($value->id == $admin->district) selected @endif value="{{$value->id}}">{{ $value->_name}}</option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Phường xã</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <select onchange="change_address(this,'street','getStreetBy','Chọn Đường/ phố','3')" name="ward" class="select_option wards js-states form-control">
                                        <option disabled selected>Chọn phường/xã</option>
                                        <?php foreach($ward as $key =>$value): ?>
                                        <option @if($value->id == $admin->ward) selected @endif value="{{$value->id}}">{{ $value->_name}}</option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Đường phố</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <select name="street" class="select_option street js-states form-control">
                                        <option disabled selected>Chọn đường phố</option>
                                        <?php foreach($street as $key =>$value): ?>
                                        <option @if($value->id == $admin->street) selected @endif value="{{$value->id}}">{{ $value->_name}}</option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Địa chỉ chi tiết</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input required type="text" value="{{ $admin->address }}" name="address" class="form-control" placeholder="Địa chỉ chi tiết">
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-info">Cập nhật</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection
@push('js')
<script>
    // upload file logo
    var forward_style_img = $('.forward_style_img');
    var upload_logo_vehicle = $('.upload_logo_vehicle');
    var upload_logo_vehicle_done = $('.upload_logo_vehicle_done');

    window.addEventListener('load', function () {
        document.querySelector('input[type="file"]').addEventListener('change', function () {
            if (this.files && this.files[0]) {
                var img = document.querySelector('img.ready_upload_logo');
                img.onload = () => {
                    URL.revokeObjectURL(img.src);  // no longer needed, free memory
                }

                img.src = URL.createObjectURL(this.files[0]); // set src to blob url
            }
            $('.upload_logo_vehicle').hide();
            $('.upload_logo_vehicle_done').show();
            // reloadImg();
        });
    });

    $('.del_logo').click(function () {
        $('.ready_upload_logo').attr('src', '');
        $('.upload_logo_vehicle_done').hide();
        $('.upload_logo_vehicle').show();
        // reloadImg();
    })
    $('select').select2({ });
    //
    function change_address(value1, value2, value3, value4, value5) {
        if (value5 == 3) {
            var city_id = $('.districts').val();
        } else {
            var city_id = $(value1).val();
        }
        if (city_id > 0) {
            $.ajax({
                url: '{{ url('') }}/admin/'+value3,
                type: 'post',
                dataType: 'json',
                data: {
                    city: city_id
                },
  
                success: function(response) {
                    var html = '<option value="">' + value4 + '</option>';
                    // var response = JSON.parse(response);
                    $.each(response, function(index, val) {
                        if (value5 == 1) {
                            html += '<option value="' + val.id + '">' + val._name + '</option>'
                        } else if (value5 == 2) {
                            html += '<option value="' + val.id + '">' + val._name + '</option>'
                        } else if (value5 == 3) {
                            html += '<option value="' + val.id + '">' + val._name + '</option>'
                        }
                    });
                    $("." + value2).html(html);
                },
            });
        }
    }
</script>
@endpush