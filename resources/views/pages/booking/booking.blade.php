@extends('layout')

@section('main_content')
       <!--=================== PAGE-COVER =================-->
       <section style="background-image: url(&quot;https://www.sporta.vn/assets/default_venue_0-be9661c93168f3e7e041490927476f582d3f441c4a8f1e57bce38c077b8a3e3c.jpg&quot;); background-position: bottom; background-size: cover;" class="pt-7 pb-5 d-flex align-items-end dark-overlay bg-cover">
        <div class="container overlay-content">
          <div class="d-flex justify-content-between align-items-start flex-column flex-lg-row align-items-lg-end container">
            <div class="text-white mb-4 mb-lg-0">
              <h1 class="text-shadow verified text-left orange-text">{{ $pitch->pitch_name }}</h1>
              <p class="mb-1"><ion-icon name="location-outline"></ion-icon>{{ $pitch->pitch_address.', '.street($pitch->pitch_street)->_name.', '.ward($pitch->pitch_ward)->_name.', '.district($pitch->pitch_district)->_name.', '.city($pitch->pitch_city)->cit_name}}</p>
              <p class="mb-1 d-flex align-items-center">
                  <ion-icon name="star-outline"></ion-icon>
                  <span class="ml-1"><a href="#seeReview" class="orange-text" style="text-decoration: none;">Chưa có đánh giá</a></span>
              </p>
              <p class="mb-1 d-flex align-items-center">
                  <ion-icon name="alert-circle-outline"></ion-icon>
                  <a href="https://www.sporta.vn/users/sign_in" class="orange-text" onclick="alert('Bạn cần đăng nhập để báo lỗi')" aria-pressed="true">Báo lỗi</a>
              </p>
              <div class="fb-like justify-contet-end d-flex mt-3 fb_iframe_widget" data-href="https://www.sporta.vn/vinh-thanh-sport" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true" fb-xfbml-state="rendered" fb-iframe-plugin-query="action=like&amp;app_id=1761051974180267&amp;container_width=336&amp;href=https%3A%2F%2Fwww.sporta.vn%2Fvinh-thanh-sport&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey&amp;share=true&amp;show_faces=true&amp;size=small"><span style="vertical-align: bottom; width: 150px; height: 28px;"><iframe name="f95b08c5480b94" width="1000px" height="1000px" data-testid="fb:like Facebook Social Plugin" title="fb:like Facebook Social Plugin" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" src="https://www.facebook.com/v5.0/plugins/like.php?action=like&amp;app_id=1761051974180267&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fx%2Fconnect%2Fxd_arbiter%2F%3Fversion%3D46%23cb%3Df36dad5364090c%26domain%3Dwww.sporta.vn%26is_canvas%3Dfalse%26origin%3Dhttps%253A%252F%252Fwww.sporta.vn%252Ff39803a4338f07%26relation%3Dparent.parent&amp;container_width=336&amp;href=https%3A%2F%2Fwww.sporta.vn%2Fvinh-thanh-sport&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey&amp;share=true&amp;show_faces=true&amp;size=small" style="border: none; visibility: visible; width: 150px; height: 28px;" class=""></iframe></span></div>
            </div>
            <div class="calltoactions">
                <a href="#showContact" data-toggle="modal" data-target="#booking5" class="btn btn-primary mt-2">Đặt sân</a>
            </div>
          </div>
        </div>
       </section>
    <!-- end page-cover -->
    <!--==== INNERPAGE-WRAPPER =====-->
    <section class="innerpage-wrapper container my-5">
        <div id="thank-you" class="innerpage-section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 ">
                        <div>
                            <div class="text-block">
                                <p class="subtitle text-sm text-primary pb-1">Mô tả - Thông tin kèm theo</p>
                                <p>{{ $pitch->pitch_description}}</p>
                            </div>
                            <!-- Amenities-->
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
                                <!-- Listing Location-->
                                <p class="subtitle text-sm text-primary pb-1">Bản đồ</p>
                                <p><a class="text-muted" target='_blank' href="{{ $pitch->pitch_link_map }}">Tìm đường tới sân</a></p>
                                <!-- <div class="map-wrapper-300 mb-3">
                                <div id="venue_map" style="margin-top: 10px;" lat="21.027964" lng="105.8510132" name="Sân Bạch Đằng"></div>
                                </div> -->
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
                            <div class="text-block" id="seeReview">
                                <p class="subtitle text-sm text-primary">Đánh Giá</p>
                                <p class="text-muted"> Chưa có đánh giá về địa điểm này.</p>
                            </div>
                        </div>
                    </div>
                    <!-- end columns -->

                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 p-4 side-bar h-fit-content blog-sidebar right-side-bar">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-12">
                                <div class="side-bar-block contact">
                                    <h2 class="side-bar-heading">Liên hệ</h2>
                                    <div class="c-list d-flex align-items-center">
                                        <ion-icon name="mail"></ion-icon>
                                        <div class="text text-muted">{{ $manager->email }}</div>
                                    </div>
                                    <!-- end c-list -->

                                    <div class="c-list d-flex align-items-center">
                                        <ion-icon name="call"></ion-icon>
                                        <div class="text text-muted">{{ $manager->phone }}</div>
                                    </div>
                                </div>
                                <!-- end side-bar-block -->
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end columns -->

                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end thank-you -->
    </section>
    <!-- end innerpage-wrapper -->
    @if(Auth::guard('web')->user())
    @include('includes.popup_booking')
    @else
    @include('includes.popup_login')
    @endif
@endsection
@push('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css">
@endpush
@push('js')
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<script>
    $("#BookingPost").validate({
                errorPlacement: function (error, element) {
                error.appendTo(element.parents(".box_input_infor"));
                error.wrap("<span class='error'>");
                element.parents('.box_input_infor').addClass('validate_input');
            },
			rules: {
				type: "required",
				pitch_type: "required",
				booking_details_date: "required",
				booking_time: "required",
			},
			messages: {
				type: "Vui lòng chọn loại sân",
				pitch_type: "Vui lòng chọn sân bóng",
                booking_details_date: "Ngày đặt không thể bỏ trống",
				booking_time: "Khung giờ không thể bỏ trống",
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
        var pitch_type_id = $('select[name="pitch_type"]').val();
        var type_id = $('select[name="type"]').val();
        var date = $('input[name="booking_details_date"]').val();
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
                    var html = '<option value="">Chọn khung giờ</option>';
                    $.each(data, function(index, val) {
                        if(val.disabled == 1)
                        {
                            html += '<option disabled value="' + val.time_id + '">' + val.time_st + ' - ' + val.time_end + ' - ' + val.price +' VNĐ</option>'
                        }
                        else
                        {
                            html += '<option value="' + val.time_id + '">' + val.time_st + ' - ' + val.time_end + ' - ' + val.price +' VNĐ</option>'
                        }
                    });
                    $(".bookingtime").html(html);
                }
            });
    }
    // 
    $('select').select2({ });
    // 
    $('[data-fancybox]').fancybox({
    // Options will go here
    buttons : [
        'close'
    ],
    wheel : false,
    transitionEffect: "slide",
    // thumbs          : false,
    // hash            : false,
    loop            : true,
    // keyboard        : true,
    toolbar         : false,
    // animationEffect : false,
    // arrows          : true,
    clickContent    : false
    });
</script>
@endpush
