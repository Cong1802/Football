@extends('AdminLayout')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="col-md-12 col-sm-12  ">
            <div class="x_panel">
            <div class="x_title">
                <h2>Danh sách bookig</h2>
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
            <div class="x_content">
                <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                    <thead>
                        <th class="column-title">Khách hàng</th>
                        <th class="column-title">Phone</th>
                        <th class="column-title">Thời gian đặt</th>
                        <th class="column-title">Khung giờ</th>
                        <th class="column-title">Giá</th>
                        <th class="column-title">Loại sân</th>
                        <th class="column-title">Trạng thái</th>
                        <th class="column-title no-link last"><span class="nobr">Action</span>
                        </th>
                        <th class="bulk-actions" colspan="7">
                        <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php foreach ($data as $key => $value) :?>
                    <tr class="even pointer">
                        <td class=" ">{{ $value->name }}</td>
                        <td class=" ">{{ $value->user_phone }}</td>
                        <td class=" ">{{ date('d/m/Y',$value->booking_time_cr) }}</td>
                        <td class=" ">{{ timeslot($value->booking_time) .' || Ngày '. date('d/m/Y',$value->booking_date) }}</td>
                        <td class=" ">{{ number_format(price($value->booking_time)) }} VNĐ</td>
                        <td class=" ">{{ $value->pitch_type_name }}</td>
                        <td class=" ">{{ ($value->booking_status == 1) ? 'Đã duyệt' : 'Chưa duyệt' }}</td>
                        <td class=" ">
                            <a href="{{URL::to('admin/done-booking/'.$value->booking_id)}}"><ion-icon name="create-outline"></ion-icon> Duyệt</a> &nbsp;&nbsp;&nbsp;&nbsp;
                            <a onclick="return confirm('Bạn có chắc là muốn xóa người này ko?')" href="{{URL::to('admin/delete-admin/'.$value->booking_id)}}"><ion-icon name="trash-outline"></ion-icon> Hủy</a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
                </div>     
            </div>
            </div>
        </div>
    </div>
        <!-- /page content -->
@endsection