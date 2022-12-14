@extends('AdminLayout')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div>
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Chỉnh sửa khung giờ</small></h2>
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
                        <form class="form-horizontal form-label-left" action="{{ URL::to('admin/update-time/'.$time_edit->time_id) }}" method="POST">
                            @csrf
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">Thời gian bắt đầu</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="time" value="{{ $time_edit->time_start }}" class="form-control" required name="time_st">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Thời gian kết thúc</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="time" class="form-control" value="{{ $time_edit->time_end }}" required name="time_end">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Mức giá</span>
                                </label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input class="form-control" required name="price" value="{{ $time_edit->price }}" type="number" placeholder="Giá sân ..."></input>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Địa điểm</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <select name="pitch" required class="js-states form-control">
                                        <option disabled selected>Chọn loại sân</option>
                                        <?php foreach($listPitch as $key => $value): ?>
                                        <option <?php if(Auth::guard('admin')->user()->role == 0){if(Auth::guard('admin')->user()->admin_pitch == $value->pitch_id){echo 'selected';} else{ echo 'disabled';}} ?> value ="{{ $value->pitch_id }}">{{ $value->pitch_name }}</option>
                                        <?php endforeach ?>
                                    </select>
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
        $('select').select2({ });
    </script>
@endpush