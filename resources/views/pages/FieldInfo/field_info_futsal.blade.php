@extends('layout')

@section('main_content')
    <!--========== PAGE-COVER =========-->
    <section class="page-cover dashboard">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title">Bảng đặt sân Futsal</h1>
                    <ul class="breadcrumb">
                        <li> <a href="{{URL::to('/')}}"><i class="fa fa-home"></i> Trang chủ</a></li>
                        <li class="active">Loại sân Futsal</li>
                    </ul>
                </div>
                <!-- end columns -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- end page-cover -->

    <!--================= Bang dat san =============-->
    <section id="BangDatSan" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-heading">
                        <h2>BẢNG ĐẶT SÂN FUTSAL</h2>
                        <hr class="heading-line" />
                    </div>
                    <!-- end page-heading -->

                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                                <ul class="booking-responsive-table">
                                    <li class="booking-table-header">
                                        <div class="booking-col booking-col-1">Người đặt</div>
                                        <div class="booking-col booking-col-2">Tên sân</div>
                                        <div class="booking-col booking-col-3">Bắt đầu</div>
                                        <div class="booking-col booking-col-4">Kết thúc</div>
                                    </li>
                            @foreach ($field_booking_info as $fbi)
                                    <li class="booking-table-row">
                                        <div class="booking-col booking-col-1" data-label="Job Id">{{$fbi->name}}</div>
                                        <div class="booking-col booking-col-2" data-label="Customer Name">{{$fbi->field_name}}</div>
                                        <div class="booking-col booking-col-3" data-label="Amount">{{$fbi->booking_start}}</div>
                                        <div class="booking-col booking-col-4" data-label="Payment Status">{{$fbi->booking_end}}</div>
                                    </li>
                            @endforeach
                                </ul>                                


                        </div>
                    </div>

                    <div class="view-all text-center">
                        {{ $field_booking_info->links() }}
                    </div>
                    <!-- end view-all -->
                </div>
                <!-- end columns -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- end BangDatSan -->

    @include('layouts.quick')
@include('layouts.count')
@endsection
