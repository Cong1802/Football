@extends('AdminLayout')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="col-md-12 col-sm-12  ">
            <div class="x_panel">
            <div class="x_title">
                <h2>Danh sách admin</h2>
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
                        <th class="column-title">Họ tên</th>
                        <th class="column-title">Email</th>
                        <th class="column-title">Phone</th>
                        <th class="column-title no-link last"><span class="nobr">Action</span>
                        </th>
                        <th class="bulk-actions" colspan="7">
                        <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php  $i=1;foreach ($data as $key => $value) :?>
                    <tr class="even pointer">
                        <td class=" ">{{ $i }}</td>
                        <td class=" ">{{ $value->name }}</td>
                        <td class=" ">{{ $value->email }}</td>
                        <td class=" ">{{ $value->phone }}</td>
                        <td class=" ">
                            <a href="{{URL::to('admin/edit-admin/'.$value->id)}}"><ion-icon name="create-outline"></ion-icon> Edit</a> &nbsp;&nbsp;&nbsp;&nbsp;
                            <a onclick="return confirm('Bạn có chắc là muốn xóa người này ko?')" href="{{URL::to('admin/delete-admin/'.$value->id)}}"><ion-icon name="trash-outline"></ion-icon> Remove</a>
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
        <!-- /page content -->
@endsection