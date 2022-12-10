@extends('AdminLayout')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div>
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Thêm mới loại bóng</small></h2>
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
                        <form class="form-horizontal form-label-left" action="{{ URL::to('admin/insert-pitch-type') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">Tên sân</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control" name="pitch_type_name" required placeholder="Tên sân bóng...">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Loại sân</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <select name="pitch_type" class="js-states form-control">
                                        <option disabled selected>Chọn loại sân</option>
                                        <?php foreach($type as $key => $value): ?>
                                        <option value ="{{ $value->type_id }}">{{ $value->type_name }}</option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Đỉa điểm</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <select name="pitch_type_parent" class="js-states form-control">
                                        <option disabled selected>Chọn địa điểm</option>
                                        <?php foreach($listPitch as $key => $value): ?>
                                        <option <?php if(Auth::guard('admin')->user()->role == 0){if(Auth::guard('admin')->user()->admin_pitch == $value->pitch_id){echo 'selected';} else{ echo 'disabled';}} ?> value ="{{ $value->pitch_id }}">{{ $value->pitch_name }}</option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            {{-- <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Hình ảnh</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="file" name="pitch_type_file" accept="image/*" onchange="loadFile(event)">
                                    <img id="output"/>
                                </div>
                            </div> --}}
                            <button type="submit" class="btn btn-info">Thêm sân</button>
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
    var loadFile = function(event) {
      var output = document.getElementById('output');
      output.src = URL.createObjectURL(event.target.files[0]);
      output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
      }
    };
    // 
    $('select').select2({ });
</script>
@endpush