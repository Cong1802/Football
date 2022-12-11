@extends('layout')

@section('main_content')
<section class="container">
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
    </div>
  </section>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="heading-text" href="#"><ion-icon name="home-sharp"></ion-icon> Home</a></li>
      <li class="breadcrumb-item"><a class="heading-text" href="#">Sân bóng</a></li>
    </ol>
  </nav>
  <div class="d-flex justify-content-between container align-items-center flex-column flex-md-row mb-4">

  </div>
    <!--===== INNERPAGE-WRAPPER ====-->
    <section class="innerpage-wrapper mb-5">
        <div id="team-listing" class="innerpage-section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-3 side-bar left-side-bar">
                        <div class="side-bar-block filter-block">
                            <h5 class="heading-text"><ion-icon name="search-sharp"></ion-icon> Tìm kiếm theo địa điểm</h5>
                            <nav class="filter-team">
                                <ul class="filter-team-list">
                                    <li class="filter-team-item filter-team-item--active">
                                        <select onchange="search()" id="select_city" name="pitch_city" class="form-control">
                                            <option disabled selected>Thành phố</option>
                                            <?php foreach($arr_city as $key =>$value): ?>
                                            <option @if(isset($_GET['city']) && $_GET['city'] == $value->cit_id) selected @endif value="{{$value->cit_id}}">{{ $value->cit_name}}</option>
                                            <?php endforeach ?>
                                        </select>
                                    </li>
                                    <li class="filter-team-item filter-team-item--active">
                                        <select onchange="search()" name="pitch_district" class="districts form-control">
                                            <option disabled selected>Quận/huyện</option>
                                            <?php foreach($arr_district as $key =>$value): ?>
                                            <option @if(isset($_GET['district']) && $_GET['district'] == $value->id) selected @endif value="{{$value->id}}">{{ $value->_name}}</option>
                                            <?php endforeach ?>
                                        </select>
                                    </li>
                                    <li class="filter-team-item filter-team-item--active">
                                        <select onchange="search()" name="pitch_ward" class="select_option wards js-states form-control">
                                            <option disabled selected>Chọn phường xã</option>
                                            <?php foreach($arr_ward as $key =>$value): ?>
                                            <option @if(isset($_GET['ward']) && $_GET['ward'] == $value->id) selected @endif value="{{$value->id}}">{{ $value->_name}}</option>
                                            <?php endforeach ?>
                                        </select>
                                    </li>
                                    <li class="filter-team-item filter-team-item--active">
                                        <select onchange="search()" name="pitch_street" class="select_option street js-states form-control">
                                            <option disabled selected>Chọn Đường/ phố</option>
                                            <?php foreach($arr_street as $key =>$value): ?>
                                            <option @if(isset($_GET['street']) && $_GET['street'] == $value->id) selected @endif value="{{$value->id}}">{{ $value->_name}}</option>
                                            <?php endforeach ?>
                                        </select>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- end columns -->
                    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 content-side">
                        @if(isset($_GET['keyword']))
                        <div class="mb-3">
                            Có <b> {{$count}} </b> kết quả tìm kiếm</b>
                        </div>
                        @endif
                        <ul>
                    @foreach($search as $key => $pitch)
        
                        <li class="d-flex mb-2 venue-item bg-light">
                            <div class="venue-item__wrapper border-0 shadow">
                              <div class="venue-item__main">
                                <div class="p-2 venue-item-image">
                                  <img class="img-fluid" src="{{ asset('public/uploads/pitch/'.imgPitch($pitch->pitch_id)->img_name)}}">
                                </div>
                                <div class="p-1 m-2 venue-item-details">
                                  <div class="venue-item__name venue-item__link mb-1">
                                    <a href="{{ URL::to('/booking/'.$pitch->pitch_id) }}" class="text-decoration-none heading-text"><h5>{{ $pitch->pitch_name }}</h5></a>
                                  </div>
                                  <div class="venue-item__address venue-item__link mb-2">
                                    <ion-icon name="location-sharp"></ion-icon> {{ $pitch->pitch_address.', '.street($pitch->pitch_street)->_name.', '.ward($pitch->pitch_ward)->_name.', '.district($pitch->pitch_district)->_name.', '.city($pitch->pitch_city)->cit_name}}
                                  </div>
                                  <div class="d-flex align-items-center">
                                        <span class="text-muted phone-number"><ion-icon name="call-sharp"></ion-icon> {{ $pitch->phone }}</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </li>
              
                    @endforeach
                </ul>
                    </div>
                    <!-- end columns -->

                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end team-listing -->
    </section>
    <!-- end innerpage-wrapper -->
    <style>

    </style>
@endsection
@push('css')
    <style>
        .select2-container--default .select2-selection--single {
            border:none !important;
        }
    </style>
@endpush
@push('js')
    <script>
        function search()
        {
            var district = $('select[name="pitch_district"]').val();
            var ward = $('select[name="pitch_ward"]').val();
            var street = $('select[name="pitch_street"]').val();
            var city = $('select[name="pitch_city"]').val();

            var link = 'search?city='+city;
            if(district != '' && district != null)
            {
                link += '&district='+district;
                if(ward != '' && ward != null)
                {
                    link += '&ward='+ward;
                    if(street != '' && street != null)
                    {
                        link += '&street='+street;
                        
                    }
                }
            }
            window.location.replace(link);
        }
    </script>
@endpush
