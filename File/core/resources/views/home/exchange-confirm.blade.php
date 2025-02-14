@extends('layouts.home')
@section('title', "Exchange Currency" )
@section('content')


    <!-- Content
		============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <div class="row">
                    <div class="col-md-10 col-md-offset-1">

                        <div class="info">
                            <table class="table table-bordered text-center table-condensed">
                                <thead>
                                <tr>
                                    <th class="text-center">Currency Name</th>
                                    <th class="text-center">Currency Rate</th>
                                    <th class="text-center">Currency Quantity</th>
                                    <th class="text-center">Exchange Name</th>
                                    <th class="text-center">Exchange Rate</th>
                                    <th class="text-center">Exchange Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{ $exchange_currency->currency->name }}</td>
                                    <td>{{ $exchange_currency->currency->buy_rate }} - {{ $base_currency }}</td>
                                    <td>{{ $quantity }} - {{ $exchange_currency->currency->name }}</td>
                                    <td>{{ $exchange_currency->exchangeCurrency->name }}</td>
                                    <td>{{ $exchange_currency->exchangeCurrency->sell_rate }} - {{ $base_currency }}</td>
                                    <td>{{ round( ($exchange_currency->currency->buy_rate * $quantity) / $exchange_currency->exchangeCurrency->sell_rate, 2 ) }} - {{ $exchange_currency->exchangeCurrency->name }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-5 col-md-offset-6">
                        <p style="margin-bottom: 5px;">Please Sent Currency this Payment ID :</p>
                        <h5>Payment ID : <b><i>{{ $exchange_currency->currency->payment_id }}</i></b></h5>
                        {!! Form::open(['route'=>'exchange-order-confirm','files'=>true]) !!}
                        <span>Transaction ID: <input type="number" value="" name="transaction_id" class="form-control" id="" required></span>
                        <span>Transaction ScreenShoot: <input type="file" value="" name="image" class="form-control" id="" required></span>
                        <hr>
                        <p style="margin-bottom: 5px;">Enter Your Payment ID :</p>
                        <span>Payment ID: <input type="text" name="payment_id" class="form-control" id="" required></span>
                        <hr>
                        <p style="margin-bottom: 5px;">Enter Your Personal Info :</p>
                        <span>Name: <input type="text" name="name" class="form-control" value="{{ Auth::guard('member')->user()->name }}" id="" readonly></span>
                        <span>Email: <input type="email" name="email" value="{{ Auth::guard('member')->user()->email }}" class="form-control" id="" readonly></span>
                        <input type="hidden" name="member_id" value="{{ Auth::guard('member')->user()->id }}">
                        <input type="hidden" name="exchange_id" value="{{ $exchange_currency->id }}">
                        <input type="hidden" name="exchange_price" value="{{ round( ($exchange_currency->currency->buy_rate * $quantity) / $exchange_currency->exchangeCurrency->sell_rate, 2 ) }}">
                        <button type="submit" class="btn btn-primary btn-block" style="margin-top: 10px;"><i class="fa fa-credit-card"></i> Confirm Exchange</button>

                        {!! Form::close() !!}
                    </div>
                </div>

            </div>

        </div>

    </section><!-- #content end -->

@endsection