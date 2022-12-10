<!-- end traveler-info -->
<div id="booking5" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Tạo phiếu đặt sân</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <!-- end modal-header -->

            <div class="modal-body bookingcard">
                <form role="form" action="{{URL::to('/create-booking')}}" id="BookingPost" method="post" >
                {{ csrf_field() }}
                    <div class="form-group no-view">
                        <label for="user_id">user id <small class="text-danger"></label>
                        <input type="text" name="user_id"class="input-custom" id="user_id" value="{{Auth::guard('web')->user()->id}}"/>
                    </div>
                    <!-- end form-group -->

                    <div class="form-group">
                        <label for="name">Tài khoản <small class="text-danger">*</small></label>
                        <input type="text" disabled class="input-custom" id="name" value="{{Auth::guard('web')->user()->name}}"/>
                    </div>
                    <!-- end form-group -->
                    <div class="form-group right-icon">
                        <label for="field_id">Sân <small class="text-danger">*</small></label>
                        <input type="text" value="{{ $pitch->pitch_name }}" class="input-custom" disabled>
                        <input type="hidden" value="{{ $pitch->pitch_id }}" name="pitch" class="input-custom">
                    </div>   
                    <div class="form-group right-icon box_input_infor">
                        <label for="field_type">Loại sân <small class="text-danger">*</small></label>
                        <select onchange='select_pitch_type(this);select_timeslot()' class="pitch_type_id" name="type" class="input-custom">
                            <option selected disabled>Chọn loại sân</option>
                            <?php foreach($type as $key=>$value) :?>
                            <option value="{{ $value->type_id }}">{{ $value->type_name }}</option>
                            <?php endforeach ?>
                        </select>                                                      
                    </div>   
                    <div class="form-group right-icon box_input_infor">
                        <label for="field_type">Sân bóng <small class="text-danger">*</small></label>
                        <select onchange = 'select_timeslot()' required class="pitch_type" name="pitch_type" class="input-custom">
                            <option selected disabled>Chọn sân bóng</option>
                        </select>                                                      
                    </div>                                
                    <div class="form-group box_input_infor">
                        <label for="booking_details_date">Ngày đặt <small class="text-danger">*</small></label>
                        <input type="date" min="{{ date('Y-m-d',time()) }}" onchange='select_timeslot()' name="booking_details_date" class="input-custom dpd1" id="" placeholder="MM/dd/yyyy" required/>
                    </div>
                    <!-- end form-group -->
                                                                
                    <div class="form-group box_input_infor">
                        <label for="booking_details_start">Khung giờ <small class="text-danger">*</small></label>
                        <select required class="bookingtime" class="input-custom" name="booking_time" id="booking_details_start">
                            <option selected disabled>Chọn khung giờ</option>
                        </select>
                    </div>
                    <!-- end form-group -->
                    <div class="form-group">
                        <label for="booking_details_phone">Số điện thoại <small class="text-danger">*</small></label>
                        <input type="text" disabled class="input-custom" id="booking_details_phone" value="{{Auth::guard('web')->user()->user_phone}}"/>
                    </div>
                    <!-- end form-group -->                                                
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-info">Lưu đặt sân</button>
                    </div>
                </form>
            </div>
            <!-- end modal-bpdy -->
        </div>
        <!-- end modal-content -->
    </div>
    <!-- end modal-dialog -->
</div>
<!-- end edit-profile -->
