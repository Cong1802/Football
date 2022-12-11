@extends('layout')
@section('main_content')
    <!--========================= FLEX SLIDER =====================-->
    <section class="container py-5">
      <div class="tab-content">
        <div class="meta py-5">
          <div class="container">
            <div class="text-lg-left d-none d-md-block mb-2">
              <img src="https://www.sporta.vn/assets/wordmark_orange-ed66bc5b0e0947731a85c89881eccaae39d86b653850da31181ad841b9c9cdd2.svg" alt="Sporta" style="height: 50px;">
           </div>
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
          <div id="TimDoiNhanh" class="tab-pane in active">
              <form action="{{URL::to('/search')}}" onsubmit="return false" autocomplete="off" method="POST">
               {{csrf_field()}}
                  <div class="row">
                      <div class="col-xs-12 d-flex justify-content-between col-sm-12 col-md-12">
                          <div class="left-icon input-search">
                              <input type="text" class="form-control" name="keywords_submit" placeholder="Tìm kiếm quận huyện hoặc tên sân bóng">
                          </div>
                          <div class="left-icon select2-search-div">
                            <select onchange="change_address(this,'districts','ajaxGetListDistricts','Quận/ huyện','1')" id="select_city" name="pitch_city" class="form-control">
                                <option disabled selected>Thành phố</option>
                                <?php foreach($city as $key =>$value): ?>
                                <option value="{{$value->cit_id}}">{{ $value->cit_name}}</option>
                                <?php endforeach ?>
                            </select>
                          </div>
                          <div class="left-icon select2-search-div">
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
    </section>
    <div class="banner container">
      <img src="https://xuanlongfc.com/images/background/background-image.jpeg">
    </div>
    <section class="py-5 bg-gray-100 container ">
        <div class="shadown py-5">
          <div class="text-center pb-lg-4">
            <h3 class="font-weight-bold text-shadow">Tại sao lại cần 28Sport</h3>
            <p class="subtitle text-secondary">Nền tảng đặt sân bóng hàng đầu tại Việt Nam</p>
            <span class="animate-border mr-auto ml-auto mb-4"></span>
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
<style>
  .select2-container--default .select2-selection--single {
      border:none !important;
  }
</style>
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
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
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
                  console.log(response);
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
