@extends('AdminLayout')
@section('content')
<div class="right_col" role="main">
    <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
        <div class="x_title">
            <h2>Danh sách sân bóng</h2>
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
                    <th class="column-title">STT</th>
                    <th class="column-title">Hình ảnh</th>
                    <th class="column-title">Tên sân</th>
                    <th class="column-title">Người quản lý</th>
                    <th class="column-title">Thành phố</th>
                    <th class="column-title">Quận/huyện</th>
                    <th class="column-title">Phường/Xã</th>
                    <th class="column-title">Đường</th>
                    <th class="column-title">Địa chỉ</th>
                    <th class="column-title no-link last"><span class="nobr">Action</span>
                    </th>
                    <th class="bulk-actions" colspan="7">
                    <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                    </th>
                </tr>
                </thead>

                <tbody>
                    @php 
                        use Illuminate\Support\Facades\DB;
                    @endphp
                <?php  $i=1;foreach ($data as $key => $value) :?>
                <tr class="even pointer">
                    <td class=" ">{{ $i }}</td>
                    <td>
                        @if(imgPitch($value->pitch_id) != false)
                        <img src="{{ asset('public/uploads/pitch/'.imgPitch($value->pitch_id)->img_name) }}">
                        @else
                        <img src="{{ asset('public/backend/images/default.jpg')}}">
                        @endif
                    </td>
                    <td>{{ $value->pitch_name }}</td>
                    <td>
                        @php 
                            $admin =DB::table('tbl_admin')->select('name')->where('id',$value->pitch_manager)->get();
                            foreach( $admin as $key => $values )
                            {
                                echo $values->name;
                            }
                        @endphp
                    </td>
                    <td>
                        @php 
                            $city =DB::table('city2')->select('cit_name')->where('cit_id',$value->pitch_city)->first();
                            echo $city->cit_name;
                        @endphp
                    </td>
                    <td>
                        @php 
                            $district =DB::table('district')->select('_name')->where('id',$value->pitch_district)->first();
                            echo $district->_name;
                        @endphp
                    </td>
                    <td>
                        @php 
                            $ward =DB::table('ward')->select('_name')->where('id',$value->pitch_ward)->first();
                            echo $ward->_name;
                        @endphp
                    </td>
                    <td>
                        @php 
                            $street =DB::table('street')->select('_name')->where('id',$value->pitch_street)->first();
                            echo $street->_name;
                        @endphp
                    </td>
                    <td>{{ $value->pitch_address }}</td>
                    <td>
                        <a href="{{URL::to('admin/edit-pitch/'.$value->pitch_id)}}"><ion-icon name="create-outline"></ion-icon> Edit</a> &nbsp;&nbsp;&nbsp;&nbsp;
                        <a onclick="return confirm('Bạn có chắc là muốn xóa sân này ko?')" href="{{URL::to('admin/delete-pitch/'.$value->pitch_id)}}"><ion-icon name="trash-outline"></ion-icon> Remove</a>
                    </td>
                </tr>
                <?php $i++;endforeach ?>
                </tbody>
            </table>
            </div>
                    
                
        </div>
        </div>
    </div>
</div>
@endsection