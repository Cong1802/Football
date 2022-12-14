@extends('layout')

@section('main_content')
    <!--=================== PAGE-COVER =================-->
    <section class="container">
        <div class="tab-content">
          <div class="meta py-5">
            <div class="container">
             <div class="text-center text-lg-left d-md-block">
              <h4 class="display-5 font-weight-bold text-shadow">
                CÁP KÈO NHANH CHÓNG - TÌM ĐỐI DỄ DÀNG
              </h4>
            </div>
            <div class="mb-2">
              <h6 class="text-left">Tham gia cùng <strong class="text-secondary" id="user_count" number="91370">91370</strong> người chơi khác ngay!</h6>
              <div class="d-flex">
                <a href="https://bit.ly/sporta-cap-keo-tim-doi"><img style="width: 170px" src="https://www.sporta.vn/assets/icon-appstore-0ac658e90248e413db2bdc584e50b25b06a8229f6a74efb816b93194d0491829.svg"></a>
                <a href="https://bit.ly/sporta-timdoi-android"><img style="width: 170px" src="https://www.sporta.vn/assets/icon-googleplaystore-18c9b8d2140c5ad8657c670f05036c5a62760da182f1d8cbe8c40c467c7f2b4b.svg"></a>
              </div>
            </div>
            </div>
            <!-- end container -->
          </div>
        </div>
    </section>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a class="heading-text" href="#"><ion-icon name="home-sharp"></ion-icon> Home</a></li>
          <li class="breadcrumb-item"><a class="heading-text" href="#">Sân bóng</a></li>
          <li class="breadcrumb-item"><a class="heading-text" href="#">Đặt sân</a></li>
        </ol>
    </nav>
    <section class="innerpage-wrapper container">
        <form role="form" action="{{URL::to('/create-booking')}}" id="BookingPost" method="post">
            @csrf
            <ul class="stepper parallel horizontal">
            <li class="step active">
                <div class="step-title waves-effects waves-dark">Step 1</div>
                <div class="step-content">
                    <div class="d-flex justify-content-center">
                        <div class="shadown col-md-6 col-12 my-4">
                            <div class="">
                                <h4 class="display-5 text-center font-weight-bold text-shadow mt-4">Thông tin đặt sân</h4>
                                <span class="animate-border mr-auto ml-auto mb-4"></span>
                                  <div class="text-block">
                                    <div class="form-group">
                                      <label for="name"><h6>Tên</h6></label>
                                      <input id="name" name="booker_name" value="{{ Auth::guard('web')->user()->name }}" type="text" class="form-control" required placeholder="Họ tên ...">
                                    </div>
                                    <div class="form-group">
                                      <label for="phone"><h6>Số điện thoại</h6></label>
                                      <input id="phone" name="booker_phone" value="{{ Auth::guard('web')->user()->phone }}" type="text" class="form-control" required placeholder="Nhập số điện thoại...">
                                    </div>
                                    <div class="form-group">
                                        <label for="email"><h6>Email</h6></label>
                                        <input id='email' name="booker_phone" value="{{ Auth::guard('web')->user()->email }}" type="text" class="form-control" required placeholder="Nhập số điện thoại...">
                                      </div>
                                  </div>
                                  <div class="text-block">
                                    <h5 class="mb-4">Phương thức thanh toán</h5>
                                    <div class="mb-4">
                                      <div class="form-check">
                                        <input id="cash" type="radio" class="form-check-input" name="payment_method" value="online" checked="">
                                        <label for="cash" class="form-check-label"><span class="text-sm">Thanh toán trực tiếp tại sân</span></label>
                                      </div>
                                    </div>
                                  </div>
                                  <input type="text" name="asset_id" value="77" hidden="">
                                  <input type="text" name="begin_use_time" value="2022-12-13 13:00:00 +0700" hidden="">
                                  <input type="number" name="duration" value="1" hidden="">
                            </div>
                        </div>
                    </div>
                    <div class="step-actions d-flex justify-content-end">
                        <button class="waves-effect waves-dark btn next-step" data-validator="validateStepOne">CONTINUE</button>
                    </div>
                </div>
            </li>
            <li class="step">
                <div class="step-title waves-effects waves-dark">Step 2</div>
                <div class="step-content">
                    <div class="d-flex shadown mb-4">
                        <div class="col-xs-12 col-sm-12 border-right col-md-6 col-lg-6 ">
                            <div>
                                <div class="text-block">
                                    <p class="subtitle text-sm text-primary pb-1">Tiện ích</p>
                                    <ul class="amenities-list list-inline">
                                        <?php
                                            $extension = json_decode($pitch->pitch_extension);
                                            foreach ($extension as $key => $value):
                                        ?> 
                                        <li class="list-inline-item mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-circle bg-primary mr-2"><i class="fa fa-check"></i></div>
                                            <span>{{ extension($value)->ex_name }}</span>
                                        </div>
                                        </li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                                <div class="text-block">
                                    <p class="subtitle text-sm text-primary pb-1">Bản đồ</p>
                                    <p><a class="text-muted" target='_blank' href="{{ $pitch->pitch_link_map }}">Tìm đường tới sân</a></p>
                                </div>
                                <div class="text-block">
                                    <p class="subtitle text-sm text-primary pb-1">Hình ảnh</p>
                                    <p class="imglist">
                                        <?php foreach($list_img as $key=>$value): ?>
                                        <a href="{{ URL::to('public/uploads/pitch/'.$value->img_name) }}" data-fancybox="group" data-caption="This image has a caption 1">
                                          <img src="{{ asset('public/uploads/pitch/'.$value->img_name) }}" />
                                        </a>
                                        <?php endforeach ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 text-block col-lg-6 p-6 side-bar h-fit-content right-side-bar">
                            <div class="form-group right-icon">
                                <label for="field_id" class="heading-text">Sân <small class="text-danger">*</small></label>
                                <input type="text" value="{{ $pitch->pitch_name }}" class="input-custom" disabled>
                                <input type="hidden" value="{{ $pitch->pitch_id }}" name="pitch" class="input-custom">
                            </div>   
                            <div class="form-group right-icon box_input_infor">
                                <label class="heading-text" for="field_type">Loại sân <small class="text-danger">*</small></label>
                                <select onchange='select_pitch_type(this);select_timeslot()' class="pitch_type_id" name="booker_type" class="input-custom">
                                    <option selected disabled>Chọn loại sân</option>
                                    <?php foreach($type as $key=>$value) :?>
                                    <option value="{{ $value->type_id }}">{{ $value->type_name }}</option>
                                    <?php endforeach ?>
                                </select>                                                      
                            </div>   
                            <div class="form-group right-icon box_input_infor">
                                <label class="heading-text" for="field_type">Sân bóng <small class="text-danger">*</small></label>
                                <select onchange = 'select_timeslot()' required class="pitch_type" name="booker_pitch_type" class="input-custom">
                                    <option selected disabled>Chọn sân bóng</option>
                                </select>                                                      
                            </div>    
                        </div>
                    </div>
                <div class="step-actions justify-content-end">
                    <button class="waves-effect waves-dark btn next-step">CONTINUE</button>
                    <button class="waves-effect waves-dark btn-flat previous-step">Trở lại</button>
                </div>
                </div>
            </li>
            <li class="step">
                <div class="step-title waves-effects waves-dark">Step 3</div>
                <div class="step-content">
                    <div class="d-flex flex-column">
                        <div class="step-actions justify-content-end">
                            <button type="submit" class="btn">Đặt sân</button>
                            <button class="waves-effect waves-dark btn-flat previous-step">Trở lại</button>
                        </div>
                        <div class="d-flex">
                            <div class="datepicker col-8">
                                <input readonly type="text" onchange="select_timeslot()" name="booker_date" class="form-control mt-3" id="demo-timegrid">
                            </div>
                            <div class="mbsc-ios mbsc-datepicker-inline mt-3 col-4">
                                <div class="timepicker"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            </ul>
        </form>
    </section>
@endsection

@push('js')
  <script src="{{ asset('public/frontend/js/steper.js') }}"></script>
  <script src="{{ asset('public/frontend/js/mobiscroll.jquery.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
  <script>
        
    mobiscroll.setOptions({
        locale: mobiscroll.localeEn,
        theme: 'ios',
            themeVariant: 'light'
        });
        $(function () {
            $('#demo-timegrid').mobiscroll().datepicker({
                controls: ['calendar'],
                display: 'inline',
                min: '{{ date("Y-m-d",time()) }}'+'T00:00',
                labels: [{
                    start: '{{ date("Y-m-d",time()) }}',
                    textColor: '#e1528f',
                    // title: '3 SPOTS'
                }],
            });
        });

        $('#demo-timegrid').mobiscroll().eventcalendar({
        onCellClick: function (event, inst) {
        }
    });
    // 
    function select_pitch_type(e)
    {
        var id = $(e).val();
        var pitch_id = $('input[name="pitch"]').val();
        $.ajax({
                url:"{{ URL::to('/select-pitch-type')}}",
                type: 'post',
                dataType: 'json',
                data: {
                    id: id,
                    pitch_id: pitch_id,
                },
                success:function(data)
                {
                    var html = '<option value="">Chọn sân bóng</option>';
                    $.each(data, function(index, val) {
                        html += '<option value="' + val.pitch_type_id + '">' + val.pitch_type_name + '</option>'
                    });
                    $(".pitch_type").html(html);
                }
            });
    }
    function select_timeslot()
    {
        var pitch_type_id = $('select[name="booker_pitch_type"]').val();
        var type_id = $('select[name="booker_type"]').val();
        var date = $('input[name="booker_date"]').val();
        var pitch_id = $('input[name="pitch"]').val();
        $.ajax({
                url:"{{ URL::to('/select-date')}}",
                type: 'post',
                dataType: 'json',
                data: {
                    pitch_type_id: pitch_type_id,
                    type_id: type_id,
                    date: date,
                    pitch_id:pitch_id
                },
                success:function(data)
                {
                    $('.timepicker').children().remove();
                    var i = 0;
                    var html = '';
                    $.each(data, function(index, val) {
                        if(val.disabled != 1)
                        {
                            html += '<div class="mbsc-timegrid-cell"><div><label class="mbsc-timegrid-item time-item" for="timepicker'+i+'">'+ val.time_AM +'</label><input class="radio-timepicker" name="timepicker" id="timepicker'+i+'" type="radio" value="'+ val.time_id +'"></div></div>';
                        }
                        else
                        {
                            html += '<div class="mbsc-timegrid-cell mbsc-disabled"><div><label class="mbsc-timegrid-item mbsc-disabled time-item" for="timepicker'+i+'">'+ val.time_AM +'</label><input class="radio-timepicker" name="timepicker" id="timepicker'+i+'" type="radio" value="'+ val.time_id +'"></div></div>';
                        }
                        i++;
                    });
                    $('.timepicker').append(html);
                    $('.time-item').click(function(){
                        $('.time-item').each(function(){
                            $(this).removeClass('active')
                        })
                        $(this).addClass('active');
                    }) 
                }
            });
    }
    // 
    $('select').select2({ });
    // 
    $('[data-fancybox]').fancybox({
        buttons : [
            'close'
        ],
        wheel : false,
        transitionEffect: "slide",
        loop            : true,
        toolbar         : false,
        clickContent    : false
    });
    $('.waves-effects').click(function(){
        return false;
    })
  </script>
@endpush
@push('css')
  <link rel="stylesheet" href="{{ asset('public/frontend/css/materialize-stepper.css') }}">
  <link rel="stylesheet" href="{{ asset('public/frontend/css/mobiscroll.jquery.min.css') }}">
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css">
@endpush
