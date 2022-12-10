@extends('list_match')

@section('match_info')
    <div id="invite-match" class="modal custom-modal fade" role="dialog">
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
                                <input type="text" readonly class="form-control"  value="{{$list_match_info->match_time}}"/>
                        </div>
                        <!-- end form-group -->

                        <div class="form-group">
                            <label for="">Số điện thoại</label>
                            <input type="text" readonly  class="form-control"   value="{{$list_match_info->user_phone}}"/>
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
    </div>
    @include('layouts.count')
@endsection