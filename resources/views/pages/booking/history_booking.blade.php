@extends('layout')

@section('main_content')



    <!--=================== PAGE-COVER =================-->
    <section style="background-image: url(&quot;https://www.sporta.vn/assets/default_venue_0-be9661c93168f3e7e041490927476f582d3f441c4a8f1e57bce38c077b8a3e3c.jpg&quot;); background-position: bottom; background-size: cover;" class="pt-7 pb-5 d-flex align-items-end dark-overlay bg-cover">
        <div class="container overlay-content">
            <div class="d-flex justify-content-between align-items-start flex-column flex-lg-row align-items-lg-end container">
                <div class="text-white mb-4 mb-lg-0">
                    <h1 class="text-shadow verified text-left orange-text">Lịch sử đặt sân</h1>
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
            </div>
        </div>
    </section>
    <!-- end page-cover -->

{{-- <p>Sau khi được duyệt xin hãy kiểm tra bên thông tin đặt sân</p> --}}

    <!--===== INNERPAGE-WRAPPER ====-->
    <section class="innerpage-wrapper">
        <div id="team-listing" class="innerpage-section-padding">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 content-side">
                    <?php $i=1; ?>
                    @foreach($booking_history as $key => $booking_history_info)
                        <div class="list-block main-block f-list-block">
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
                                                            {{ date('H:i ||  d/m/Y',$booking_history_info->time_start) }} 
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><span><ion-icon name="alarm-outline"></ion-icon> </span> Thời gian kết thúc: </td>
                                                        <td>
                                                            {{ date('H:i || d/m/Y',$booking_history_info->time_end) }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><span><ion-icon name="call-outline"></ion-icon> </span> Số điện thoại liên hệ: </td>
                                                        <td>
                                                            {{$booking_history_info->user_phone}} 
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
                                                        <td><span><ion-icon name="cash-outline"></ion-icon> </span>Giá tiền:</td>
                                                        <td>{{ number_format($booking_history_info->price) }}</td>
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
                <span>{!!$booking_history->links()!!}</span>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end team-listing -->
    </section>
    <!-- end innerpage-wrapper -->

@include('layouts.count')
@endsection
