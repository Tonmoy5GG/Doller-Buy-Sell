@extends('layouts.home')

@section('title','Home Page')

@section('content')

    <section id="slider" class="slider-parallax swiper_wrapper clearfix">

        <div class="slider-parallax-inner">

            <div class="swiper-container swiper-parent">
                <div class="swiper-wrapper">
                    @foreach($slider as $s)
                        <div class="swiper-slide dark" style="background-image: url('{{ asset('images') }}/{{ $s->image }}');">
                            <div class="container clearfix">
                                <div class="slider-caption slider-caption-center">
                                    <h2 data-caption-animate="fadeInUp">{{ $s->bold_text }}</h2>
                                    <p data-caption-animate="fadeInUp" data-caption-delay="200">{{ $s->small_text }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div id="slider-arrow-left"><i class="icon-angle-left"></i></div>
                <div id="slider-arrow-right"><i class="icon-angle-right"></i></div>
                <div id="slide-number"><div id="slide-number-current"></div><span>/</span><div id="slide-number-total"></div></div>
            </div>

        </div>

    </section>


    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap">


            <div class="promo promo-light promo-full bottommargin-lg header-stick notopborder" style="background-color: #fff;">

                <div class="container clearfix">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="headlines" style="font-weight: bold; font-size: 20px; color:#86a821 !important;">

                                <marquee behavior="scroll" direction="left" scrollamount="2">

                                    <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                                    <a style="text-decoration: none" >{{ $general->scroll }}</a>

                                </marquee>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="promo promo-light promo-full bottommargin-lg header-stick notopborder">

                <div class="container clearfix">
                    <h3 class="text-center">{!! $home->title !!}</h3>
                </div>
            </div>

            <div class="container clearfix">

                @foreach($item as $i)

                <div class="col_one_fourth nobottommargin">
                    <div class="feature-box fbox-center fbox-light fbox-effect nobottomborder">
                        <div class="fbox-icon">
                            <a href="#"><i class="i-alt noborder icon-money"></i></a>
                        </div>
                        <h3>{{ $i->title }}<span class="subtitle">{{ $i->description }}</span></h3>
                    </div>
                </div>
                @endforeach

                <div class="clear"></div>

            </div>

            @if(Auth::guard('member')->check())
            <div class="section" style="margin-bottom: -10px;">
                <div class="container clearfix">

                    <div class="heading-block center">
                        <h2>Our Present Currency Rate</h2>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <thead>
                            <tr>
                                <th class="text-center">Currency Name</th>
                                <th class="text-center">Currency Image</th>
                                <th class="text-center">Currency Sell Rate</th>
                                <th class="text-center">Currency Buy Rate</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($currency as $c)
                                <tr>
                                    <td><b>{{ $c->name }}</b></td>
                                    <td>
                                        <img src="{{ asset('images') }}/{{ $c->image }}" style="height: 50px;margin-top: -5px;" alt="">
                                    </td>
                                    <td><b>{{ $c->buy_rate }} - {{ $general->currency }}</b></td>
                                    <td><b>{{ $c->sell_rate }} - {{ $general->currency }}</b></td>
                                    <td>
                                        <a href="{{ route('sell-currency') }}" class="btn btn-primary"><i class="fa fa-money"></i>&nbsp;&nbsp;Sell Currency</a>
                                        <a href="{{ route('buy-currency') }}" class="btn btn-success"><i class="fa fa-money"></i>&nbsp;&nbsp;Buy Currency</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="clear"></div>

                </div>
            </div>
            @endif

            <div style="margin: 60px 0;" class="text-center">
                {!!  $advert->link  !!}
            </div>

            <div class="section topmargin-lg" style="margin-bottom: -10px;">
                <div class="container clearfix">

                    <div class="heading-block center">
                        <h2>Our Payment Proof</h2>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">

                            <div class="text-center">
                                <h3>Sell Currency Proof</h3>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-responsive table-bordered text-center">
                                    <thead>
                                    <tr>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Seller Name</th>
                                        <th class="text-center">Currency</th>
                                        <th class="text-center">Quantity</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sell as $c)
                                        <tr>
                                            <td>{{ date('d-F-Y',strtotime($c->created_at)) }}</td>
                                            <td>{{ $c->member->name }}</td>
                                            <td width="25%">
                                                <img src="{{ asset('images') }}/{{ $c->sell->currency->image }}" alt="{{ $c->sell->currency->name }}">
                                            </td>
                                            <td>{{ $c->sell->quantity }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div class="col-md-4">

                    <div class="text-center">
                        <h3>Buy Currency Proof</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-responsive table-bordered text-center">
                            <thead>
                            <tr>
                                <th class="text-center">Date</th>
                                <th class="text-center">Buyer Name</th>
                                <th class="text-center">Currency</th>
                                <th class="text-center"> Quantity</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($buy as $c)
                                <tr>
                                    <td>{{ date('d-F-Y',strtotime($c->created_at)) }}</td>
                                    <td>{{ $c->member->name }}</td>
                                    <td width="25%">
                                        <img src="{{ asset('images') }}/{{ $c->buy->currency->image }}" alt="{{ $c->buy->currency->name }}">
                                    </td>
                                    <td>{{ $c->buy->quantity }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                            </div>
                        <div class="col-md-4">
                    <div class="text-center">
                        <h3>Exchange Currency Proof</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-responsive table-bordered text-center">
                            <thead>
                            <tr>
                                <th class="text-center">Date</th>
                                <th class="text-center">Exchanger Name</th>
                                <th class="text-center">From</th>
                                <th class="text-center">To</th>
                                <th class="text-center">Quantity</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($exchange as $c)
                                <tr>
                                    <td>{{ date('d-F-Y',strtotime($c->created_at)) }}</td>
                                    <td>{{ $c->member->name }}</td>
                                    <td width="20%">
                                        <img src="{{ asset('images') }}/{{ $c->exchange->currency->image }}" alt="{{ $c->exchange->currency->name }}">
                                    </td>
                                    <td width="20%">
                                        <img src="{{ asset('images') }}/{{ $c->exchange->exchangeCurrency->image }}" alt="{{ $c->exchange->exchangeCurrency->name }}">
                                    </td>

                                    <td> {{ $c->exchange->quantity }} - {{ $c->exchange_price }}</td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                        </div>
                    </div>

                    <div class="clear"></div>

                </div>
            </div>

            <div class="row" style="margin: 60px 0;">
                <div class="col-md-6">
                    <div class="text-center">
                        {!! $advert->link2 !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-center">
                        {!! $advert->link2 !!}
                    </div>
                </div>
            </div>

            <div class="section topmargin-lg" style="margin-bottom: -10px;margin-top: 0px;">
                <div class="container clearfix">

                    <div class="heading-block center">
                        <h2>Our Reference Bonus Proof</h2>
                    </div>
                    <hr>
                    <div class="text-center">
                        <h3>Bonus Proof</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-responsive table-bordered text-center">
                            <thead>
                            <tr>
                                <th>ID#</th>
                                <th>Date</th>
                                <th>Bonus For</th>
                                <th>Member Name</th>
                                <th>Percentage</th>
                                <th>Bonus</th>
                                <th>Reference ID</th>
                                <th>Bonus From</th>
                            </tr>
                            </thead>
                            <tbody>

                            @php $i=0; @endphp
                            @foreach($bonus as $s)
                                @php $i++; @endphp
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ date('d-F-Y',strtotime($s->created_at)) }}</td>
                                    <td>
                                        @if($s->bonus_type == 1)
                                            <span class="label label-primary label-sm">Sell Currency</span>
                                        @elseif($s->bonus_type == 2)
                                            <span class="label label-primary label-sm">Buy Currency</span>
                                        @else
                                            <span class="label label-primary label-sm">Exchange Currency</span>
                                        @endif
                                    </td>
                                    <td>{{ $s->member->name }}</td>
                                    <td>{{ $s->percentage }} %</td>
                                    <td>{{ $s->amount }} - {{ $general->currency }}</td>
                                    <td>{{ $s->member_reference }}</td>
                                    <td>{{ $s->under_reference }}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="clear"></div>

                </div>
            </div>
            <div style="margin: 60px 0;" class="text-center">
                {!!  $advert->link  !!}
            </div>

        </div>

    </section><!-- #content end -->


@endsection
@section('scripts')



    <script type="text/javascript" src="{{ asset('js/marquee.js') }}"></script>

    <script>

        $(document).ready(function() {


            $('div.headlines marquee').marquee('pointer').mouseover(function () {
                $(this).trigger('stop');
            }).mouseout(function () {
                $(this).trigger('start');
            }).mousemove(function (event) {
                if ($(this).data('drag') == true) {
                    this.scrollLeft = $(this).data('scrollX') + ($(this).data('x') - event.clientX);
                }
            }).mousedown(function (event) {
                $(this).data('drag', true).data('x', event.clientX).data('scrollX', this.scrollLeft);
            }).mouseup(function () {
                $(this).data('drag', false);
            });



        });
    </script>

@endsection