@extends('layout')

@section('main_content')



       <!--=================== PAGE-COVER =================-->
    <section class="page-cover dashboard">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title">Kết quả tìm kiếm đối thủ</h1>
                    <ul class="breadcrumb">
                        <li> <a href="{{URL::to('/')}}"><i class="fa fa-home"></i> Trang chủ</a></li>
                        <li class="active">Kết quả tìm kiếm</li>
                    </ul>
                </div>
                <!-- end columns -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- end page-cover -->

    <div class="d-flex justify-content-between container mt-5 align-items-center flex-column flex-md-row mb-4">
        <div class="mr-3">
            Có <b> {{$count}} </b> kết quả tìm kiếm</b>
        </div>
      </div>
    <!--===== INNERPAGE-WRAPPER ====-->
    <section class="innerpage-wrapper">
        <div id="team-listing" class="innerpage-section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-3 side-bar left-side-bar">
                        <div class="side-bar-block filter-block">
                            <h3>Lọc kết quả</h3>
                            <p>Tìm kiếm theo địa điểm</p>

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
                                    <a href="{{ URL::to('/booking/'.$pitch->pitch_id) }}" class="text-decoration-none">{{ $pitch->pitch_name }}</a>
                                  </div>
                                  <div class="venue-item__address venue-item__link mb-2">
                                    <i class="fas fa-map-marker-alt"></i> {{ $pitch->pitch_address.', '.street($pitch->pitch_street)->_name.', '.ward($pitch->pitch_ward)->_name.', '.district($pitch->pitch_district)->_name.', '.city($pitch->pitch_city)->cit_name}}
                                  </div>
                                  <div class="d-flex align-items-center">
                                    <div class="fas fa-mobile-alt mr-2"></div>
                                        <span class="text-muted phone-number">{{ $pitch->phone }}</span>
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
        .venue-item__wrapper {
            display: flex;
            width: 100%;
        }
        .venue-item__main {
            display: flex;
            width: 85%;
            height: 140px;
        }
        .venue-item-image {
    width: 20%;
    height: 100%;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
}
.venue-item__link {
    text-decoration: none;
}

.venue-item__name {
    font-size: 20px;
    text-transform: uppercase;
    color: orange;
}
.venue-item-image img {
    height: 100%;
    max-width: 100%;
    width: auto;
}

.img-fluid {
    max-width: 100%;
    width: 100%;
    height: 100%;
    background-size: contain;
}
        .venue-item-actions {
            width: 15%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .shadow {
            box-shadow: 0 0 1rem rgb(0 0 0 / 15%) !important;
        }
        .select2-container .select2-selection--single .select2-selection__rendered {
    padding-left: 0px !important;
}
    </style>
@include('layouts.count')
@endsection
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
