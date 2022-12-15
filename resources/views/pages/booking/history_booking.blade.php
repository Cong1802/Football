@extends('layout')

@section('main_content')
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
        <li class="breadcrumb-item"><a class="heading-text" href="#">Lịch sử đặt sân</a></li>
    </ol>
</nav>

{{-- <p>Sau khi được duyệt xin hãy kiểm tra bên thông tin đặt sân</p> --}}

    <!--===== INNERPAGE-WRAPPER ====-->
    <section class="innerpage-wrapper">
        <div id="team-listing" class="innerpage-section-padding">
            <div class="container">
                <div class="d-flex mb-5">
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 content-side">
                    <?php $i=1; ?>
                    @if(count($booking_history) > 0)
                    @foreach($booking_history as $key => $booking_history_info)
                        <div class="list-block f-list-block">
                            <div class="list-content">                           
                                <div class="list-info f-list-info">
                                        <?php 
                                            $success=Session::get('success');
                                            if($success){
                                                echo'<span style="font-size: 16px" class="wait-for-match">'.$success.'</span>' ;
                                                Session::put('success',null);
                                            }
                                        ?> 
                                    <div class="list-team-info lmatch">
                                        <h3 class="t-info-heading">#{{$i}}</h3>
                                        <div class="table-responsive">                                        
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td><span><ion-icon name="alarm-outline"></ion-icon> </span> Thời gian bắt đầu: </td>
                                                        <td>
                                                            {{ $booking_history_info->time_start }} || {{ date('d/m/Y',$booking_history_info->booking_date) }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><span><ion-icon name="alarm-outline"></ion-icon> </span> Thời gian kết thúc: </td>
                                                        <td>
                                                            {{ $booking_history_info->time_end }} || {{ date('d/m/Y',$booking_history_info->booking_date) }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><span><ion-icon name="call-outline"></ion-icon> </span> Số điện thoại liên hệ: </td>
                                                        <td>
                                                            0{{$booking_history_info->booking_phone}} 
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><span><ion-icon name="albums-outline"></ion-icon> </span> Sân: </td>
                                                        <td>{{ $booking_history_info->pitch_type_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><span><ion-icon name="albums-outline"></ion-icon> </span> Loại sân: </td>
                                                        <td>{{ $booking_history_info->type_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><span><ion-icon name="person-outline"></ion-icon> </span>Người đặt:</td>
                                                        <td>{{$booking_history_info->name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><span><ion-icon name="server-outline"></ion-icon> </span>Trạng thái:</td>
                                                        <td>
                                                            @if($booking_history_info->booking_status == 1)
                                                            <span class="badge badge-success">Đã duyệt</span>
                                                            @elseif($booking_history_info->booking_status == 2)
                                                            <span class="badge badge-danger">Đã hủy</span>
                                                            @elseif($booking_history_info->booking_status == 0)
                                                            <span class="badge badge-info">Đang chờ</span>
                                                            @elseif($booking_history_info->booking_status == 3)
                                                            <span class="badge badge-warning">Hoàn thành</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><span><ion-icon name="cash-outline"></ion-icon> </span>Giá tiền:</td>
                                                        <td>{{ number_format($booking_history_info->price) }} VNĐ</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- end table-responsive -->
                                        {{-- <button type="submit" class="btn btn-orange" data-toggle="modal" data-target="#invite-match">Mời giao lưu</button> --}}

                                    </div>
                                    <!-- end f-list-info -->
                                </div>
                                <!-- end list-content -->
                            </div>
                        </div>
                        <!-- end f-list-block -->
                    <?php $i++; ?>
                    @endforeach
                    @else
                    <div>
                        <img src="{{ asset('public/frontend/images/error.webp') }}" style="width:100%">
                        <h6 class="text-center">Bạn chưa có lịch sử đặt sân nào !!!</h6>
                    </div>
                    @endif
                    </div>
                    <!-- end columns -->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 p-4 side-bar blog-sidebar right-side-bar">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-12">
                                <div class="side-bar-block contact">
                                    <h2 class="side-bar-heading">Liên hệ</h2>
                                    <div class="c-list d-flex align-items-center">
                                        <ion-icon name="mail"></ion-icon>
                                        <div class="text text-muted">{{ $admin->email }}</div>
                                    </div>
                                    <!-- end c-list -->

                                    <div class="c-list d-flex align-items-center">
                                        <ion-icon name="call"></ion-icon>
                                        <div class="text text-muted">{{ $admin->phone }}</div>
                                    </div>
                                </div>
                                <!-- end side-bar-block -->
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                </div>
                <div class="mb-5 d-flex justify-content-center">{!!$booking_history->links()!!}</div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end team-listing -->
    </section>
    <!-- end innerpage-wrapper -->
@endsection
