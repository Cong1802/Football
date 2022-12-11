    <!--============== TOP datsannhanh ============-->
    <section id="datsannhanh" class="section-padding container">
        <div class="container">
            <div class="row shadown py-5">
                <div class="col-sm-12">
                    <div class="page-heading">
                        <h3 class="font-weight-bold text-shadow">Sân bóng 28Sport</h3>
                        <span class="animate-border mr-auto ml-auto mb-4"></span>
                    </div>
                    <div class="row">
                        <div class="swiper py-3 mySwiper">
                            <div class="swiper-wrapper">
                                <?php foreach($list_pitch as $key => $value): ?>
                                <div class="swiper-slide">
                                    <a href="{{URL::to('/booking/'.$value->pitch_id)}}">
                                        <div class="card">
                                            @if(!empty(imgPitch($value->pitch_id)))
                                                <img src="{{ asset('public/uploads/pitch/'.imgPitch($value->pitch_id)->img_name)}}" alt="A City skyline at sunset"/>
                                            @else
                                                <img src="{{ asset('public/backend/images/default.jpg')}}" alt="">
                                            @endif
                                           
                                            <div class="text">
                                            
                                            <p data-splitting="">{{$value->pitch_description}}</p>
                                            <h2>{{ $value->pitch_name }}</h2>    
                                        </div>
                                        </div>
                                    </a>
                                </div>
                                <?php endforeach ?>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>