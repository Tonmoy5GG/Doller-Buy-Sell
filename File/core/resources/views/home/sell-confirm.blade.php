@extends('layouts.home')
@section('title', "Sell Currency" )
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
                                    <th class="text-center">Currency Image</th>
                                    <th class="text-center">Currency Sell Rate</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Total Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{ $sell_currency->currency->name }}</td>
                                    <td>
                                        <img src="{{ asset('images') }}/{{ $sell_currency->currency->image }}" style="height: 50px;margin-top: -5px;" alt="">
                                    </td>
                                    <td>{{ $sell_currency->currency->buy_rate }} - {{ $base_currency }}</td>
                                    <td>{{ $quantity }} - {{ $sell_currency->currency->name }}</td>
                                    <td>{{ $sell_currency->currency->buy_rate * $quantity }} - {{ $base_currency }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-5 col-md-offset-6">
                        <p style="margin-bottom: 0px;">Please Sent Currency this payment ID</p>
                        <h5>Payment ID : <b><i>{{ $sell_currency->currency->payment_id }}</i></b></h5>
                        {!! Form::open(['route'=>'sell-order-confirm','files'=>true]) !!}
                        <span>Transaction ID: <input type="number" value="" name="transaction_id" class="form-control" id="" required></span>
                        <span>Transaction ScreenShoot: <input type="file" value="" name="image" class="form-control" id="" required></span>
                        <span>Name: <input type="text" name="name" value="{{ Auth::guard('member')->user()->name }}" class="form-control" id="" readonly></span>
                        <span>Email: <input type="email" name="email" value="{{ Auth::guard('member')->user()->email }}" class="form-control" id="" readonly></span>
                        <span>Payment Method: <textarea name="payment_method" id="" class="form-control" cols="30" rows="3" placeholder="Payment Method" required></textarea></span>
                        <input type="hidden" name="sell_id" value="{{ $sell_currency->id }}">
                        <input type="hidden" name="member_id" value="{{ Auth::guard('member')->user()->id }}">
                        <button type="submit" class="btn btn-primary btn-block" style="margin-top: 10px;"><i class="fa fa-credit-card"></i> Confirm Sell</button>

                        {!! Form::close() !!}
                    </div>
                </div>

            </div>

        </div>

    </section><!-- #content end -->




@endsection