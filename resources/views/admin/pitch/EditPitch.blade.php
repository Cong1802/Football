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
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="form-horizontal form-label-left" action="{{ URL::to('admin/update-pitch/'.$pitch->pitch_id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">Tên sân</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control" value="{{ $pitch->pitch_name }}" required name="pitch_name" placeholder="Nhập tên sân...">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Tài khoản quản lý</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <select name="pitch_manager" class="select2_group form-control">
                                        <option disabled selected>Tài khoản quản lý</option>
                                        <?php foreach($list_admin as $key =>$value): ?>
                                        <option @if($pitch->pitch_manager == $value->id) selected @endif value="{{$value->id}}">{{ $value->name}}</option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Thông tin sân</span>
                                </label>
                                <div class="col-md-9 col-sm-9 ">
                                    <textarea class="form-control" required name="pitch_description" rows="3" placeholder="Thông tin sân">{{ $pitch->pitch_description }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Google map</span>
                                </label>
                                <div class="col-md-9 col-sm-9 position_r">
                                    <input class="form-control pr-5" value="{{ $pitch->pitch_link_map }}" required name="pitch_link_map" placeholder="Nhập link google map tại đây"/>
                                    <a href='https://www.google.com/maps/@9.682084,105.568023,15z?hl=vi-VN' target="_blank" class='map'><ion-icon name="map-outline"></ion-icon></a>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">Tiện ích</label>
                                <div class="col-md-9 col-sm-9 position-r div_extension">
                                    <select class="js-example-placeholder-multiple js-states form-control" name="extension[]" multiple="multiple">
                                        <option disabled>Chọn tiện ích</option>
                                        <?php foreach ($extension as $key => $value): ?>
                                        <option @if(in_array($value->ex_id,json_decode($pitch->pitch_extension))) selected @endif value="{{ $value->ex_id }}">{{ $value->ex_name }}</option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Thành phố</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <select onchange="change_address(this,'districts','ajaxGetListDistricts','Chọn quận huyện','1')" id="select_city" name="pitch_city" class="form-control">
                                        <option disabled selected>Thành phố</option>
                                        <?php foreach($city as $key =>$value): ?>
                                        <option @if($value->cit_id == $pitch->pitch_city) selected @endif value="{{$value->cit_id}}">{{ $value->cit_name}}</option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Quận/huyện</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <select onchange="change_address(this,'wards','ajaxGetListWards','Chọn phường xã','2')" name="pitch_district" class="districts form-control">
                                        <?php foreach($district as $key =>$value): ?>
                                        <option @if($value->id == $pitch->pitch_district) selected @endif value="{{$value->id}}">{{ $value->_name}}</option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Phường xã</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <select onchange="change_address(this,'street','getStreetBy','Chọn Đường/ phố','3')" name="pitch_ward" class="select_option wards js-states form-control">
                                        <?php foreach($ward as $key =>$value): ?>
                                        <option @if($value->id == $pitch->pitch_ward) selected @endif value="{{$value->id}}">{{ $value->_name}}</option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Đường phố</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <select name="pitch_street" class="select_option street js-states form-control">
                                        <?php foreach($street as $key =>$value): ?>
                                        <option @if($value->id == $pitch->pitch_street) selected @endif value="{{$value->id}}">{{ $value->_name}}</option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Địa chỉ chi tiết</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input required type="text" value="{{ $pitch->pitch_address }}" name="pitch_address" class="form-control" placeholder="Địa chỉ chi tiết">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Hình ảnh</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <div class="input-images"></div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info">Cập nhật</button>
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
    $(".js-example-placeholder-multiple").select2({
        placeholder: "Chọn tiện ích"
    });
    // 
    $('.input-images').imageUploader();
    <?php foreach(imgPitchs($pitch->pitch_id) as $key => $value): ?>
        var html = '<div class="uploaded-image" data-index="0"><img src="{{ asset("public/uploads/pitch/".$value->img_name) }}"><button data-id="{{$value->img_id}}" class="delete-image"><ion-icon name="close-outline" role="img" class="md hydrated" aria-label="close outline"></ion-icon></button></div>';
        $('.uploaded').append(html);
        $('.uploaded').show();
        $('.upload-text').hide();
    <?php endforeach ?>
    //
    $('.uploaded-image').click(function(){
        event.preventDefault();
        return false;
    })
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
        }
    });
    $('.delete-image').click(function(){
        $(this).parents('.uploaded-image').remove();
        var img_id = $(this).attr('data-id');
        $.ajax({
            url:"{{ URL::to('admin/delete-img') }}",
            type:'POST',
            dataType : 'json',
            data:{
                img_id:img_id,
            },
            success: function(data)
            {
                var i = 0;
                $('.uploaded-image').each(function(){
                    i++;
                })
                if(i==0)
                {
                    $('.uploaded').hide();
                    $('.upload-text').css('display', 'flex');
                }
            }
        })
        event.preventDefault();
        return false;
    })
    //
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
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{ url('') }}/admin/'+value3,
                type: 'post',
                dataType: 'json',
                data: {
                    city: city_id
                },
  
                success: function(response) {
                    console.log(response);

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