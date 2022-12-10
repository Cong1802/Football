@extends('layout')
@section('main_content')
    <!--========================= FLEX SLIDER =====================-->
    <section class="flexslider-container" id="flexslider-container-2">
        <div class="flexslider slider" id="slider-2">
            <ul class="slides">
                <li class="item-1 back-size" style="background:linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3)),url({{('public/frontend/images/field1.jpg')}}) 50% 15%;background-size:cover;background-repeat: no-repeat;background-position: center;height:100%;">
                    <div class="meta">
                        <div class="container">
                            <h2>DHNT FOOTBALL FIELD</h2>
                            <p>Liên hệ số điện thoại 0905692030.</p>
                        </div>
                        <!-- end container -->
                    </div>
                    <!-- end meta -->
                </li>
                <!-- end item-1 -->

                <li class="item-2 back-size" style="background:linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3)),url({{('public/frontend/images/field2.jpg')}}) 50% 15%;background-size:cover;background-repeat: no-repeat;background-position: center;height:100%;">
                    <div class=" meta">
                        <div class="container">
                            <h2>FRIENDLY FOOTBALL</h2>
                            <p>Giao hữu bóng đá để nâng cao sức khoẻ, trình độ và gặp gỡ những người bạn.</p>
                        </div>
                        <!-- end container -->
                    </div>
                    <!-- end meta -->
                </li>
                <!-- end item-2 -->
            </ul>
        </div>
        <div class="search-tabs" id="search-tabs-2">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="tab-content">
                            <div id="TimDoiNhanh" class="tab-pane in active">
                                <form action="{{URL::to('/search')}}" onsubmit="return false" autocomplete="off" method="POST">
                                 {{csrf_field()}}
                                    <div class="row">
                                        <div class="col-xs-12 d-flex justify-content-between col-sm-12 col-md-12">
                                            <div class="left-icon input-search">
                                                <input type="text" class="form-control" name="keywords_submit" placeholder="Tìm kiếm quận huyện hoặc tên sân bóng">
                                            </div>
                                            <div class="left-icon select2-search">
                                              <select onchange="change_address(this,'districts','ajaxGetListDistricts','Quận/ huyện','1')" id="select_city" name="pitch_city" class="form-control">
                                                  <option disabled selected>Thành phố</option>
                                                  <?php foreach($city as $key =>$value): ?>
                                                  <option value="{{$value->cit_id}}">{{ $value->cit_name}}</option>
                                                  <?php endforeach ?>
                                              </select>
                                            </div>
                                            <div class="left-icon select2-search">
                                              <select name="pitch_district" class="districts form-control">
                                                <option disabled selected>Quận/ huyện</option>
                                              </select>
                                            </div>
                                            <button type="submit" name="btn-search" class="btn btn-orange">Tìm kiếm</button>
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </form>
                            </div>
                            <!-- end hotels -->

                        </div>
                        <!-- end tab-content -->

                    </div>
                    <!-- end columns -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
    </section>
    <section class="py-5 bg-gray-100">
        <div class="container">
          <div class="text-center pb-lg-4">
            <h2>Tại sao lại cần DHNT FOOTBALL</h2>
            <p class="subtitle text-secondary">Nền tảng đặt sân - tìm đối đầu tiên tại Việt Nam</p>
          </div>
          <div class="row">
            <div class="col-lg-4 mb-3 mb-lg-0 text-center">
              <div class="px-0 px-lg-3">
                <div class="icon-rounded bg-primary-light mb-3">
                  <img class="icon-image" src="https://www.sporta.vn/assets/info-b35871504f4af944c9e1f28c2419d2df5ee8fa2dcab47d650aa94d4c054eaa9a.svg">
                </div>
                <h3 class="h5">Tìm kiếm và đặt sân bóng online</h3>
                <p class="text-muted">Thông tin sân gần vị trí của bạn nhất, đặt sân online, tiện lợi, dễ dàng</p>
              </div>
            </div>
            <div class="col-lg-4 mb-3 mb-lg-0 text-center">
              <div class="px-0 px-lg-3">
                <div class="icon-rounded bg-primary-light mb-3">
                  <img class="icon-image" src="https://www.sporta.vn/assets/book-d9bc1eefa8ffc1c1a130292a3714a9565f07b44eda536fe02456b2a55ba5af1b.svg">
                </div>
                <h3 class="h5">Công cụ quản lý sân bóng online</h3>
                <p class="text-muted">Quản lý lịch đặt đơn giản, tiếp nhận đặt sân online dễ dàng, lấp đầy sân trống</p>
              </div>
            </div>
            <div class="col-lg-4 mb-3 mb-lg-0 text-center">
              <div class="px-0 px-lg-3">
                <div class="icon-rounded bg-primary-light mb-3">
                  <img class="icon-image" src="https://www.sporta.vn/assets/pr-5099167e7f25e00100225c9db1dbd0fb96c51c1dd95fd7e2e9f90d5a3186c985.svg">
                </div>
                <h3 class="h5">Tạo đội, tìm đối dễ với mobile app</h3>
                <p class="text-muted">
                  </p><div>
                    <a href="#"><img style="width: 150px" src={{ asset("public/frontend/images/icon-appstore.svg")}}></a>
                    <a href="#"><img style="width: 150px" src={{ asset("public/frontend/images/icon-google.svg")}}></a>
                  </div>
                <p></p>
              </div>
            </div>
          </div>
        </div>
      </section>
    @include('layouts.quick')
    @include('layouts.count')
@endsection
@push('css')
<link rel="stylesheet" href={{ asset("public/frontend/css/card.css")}}>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
@endpush
@push('js')
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script src='https://unpkg.com/splitting/dist/splitting.min.js'></script>
<script src={{ asset("public/frontend/js/card.js")}}></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<script>
    // 
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 10,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        breakpoints: {
          "@0.00": {
            slidesPerView: 1,
            spaceBetween: 10,
          },
          "@0.75": {
            slidesPerView: 2,
            spaceBetween: 20,
          },
          "@1.00": {
            slidesPerView: 3,
            spaceBetween: 20,
          },
          "@1.50": {
            slidesPerView: 4,
            spaceBetween: 20,
          },
        },
      });

      function change_address(value1, value2, value3, value4, value5) {
        if (value5 == 3) {
            var city_id = $('.districts').val();
        } else {
            var city_id = $(value1).val();
        }
        if (city_id > 0) {
            $.ajax({
                url: '{{ url('') }}/admin/'+value3,
                type: 'post',
                dataType: 'json',
                data: {
                    city: city_id
                },
  
                success: function(response) {
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

    $('button[name="btn-search"]').click(function(){
      var keyword = $('input[name="keywords_submit"]').val();
      var district = $('select[name="pitch_district"]').val();
      var city = $('select[name="pitch_city"]').val();
      var link = 'search?keyword='+keyword;
      if(city != '' && city != null)
      {
        link += '&city='+city;
        if(district != '' && district != null)
        {
          link += '&district='+district;
        }
      }
      window.location.replace(link);
    })
</script>
@endpush
