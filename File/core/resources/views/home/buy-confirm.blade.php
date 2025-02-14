@extends('layouts.home')
@section('title', "Buy Currency" )
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
                                    <th class="text-center">Currency Buy Rate</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Total Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $buy_currency->currency->name }}</td>
                                        <td>
                                            <img src="{{ asset('images') }}/{{ $buy_currency->currency->image }}" style="height: 50px;margin-top: -5px;" alt="">
                                        </td>
                                        <td>{{ $buy_currency->currency->sell_rate }} - {{ $base_currency }}</td>
                                        <td>{{ $quantity }} - {{ $buy_currency->currency->name }}</td>
                                        <td>{{ $buy_currency->currency->sell_rate * $quantity }} - {{ $base_currency }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-5 col-md-offset-6">
                        <p style="margin-bottom: 0px;">Please Sent Currency this Bank Account.</p>

                        <div class="well">
                            @foreach($bank as $b)
                                <h5 style="margin-bottom: 5px;">Bank Name : <b><i>{{ $b->name }}</i></b></h5>
                                <h5>Account Number : <b><i>{{ $b->account }}</i></b></h5>
                                <hr>
                            @endforeach
                        </div>


                        {!! Form::open(['route'=>'buy-order-confirm','files'=>true]) !!}

                        <span>Transaction Details: <textarea name="transaction_details" id="" cols="30" rows="2"
                                                             class="form-control input-lg" required></textarea></span>
                        <span>Transaction ScreenShoot: <input type="file" value="" name="image" class="form-control" id="" required></span>
                        <span>Name: <input type="text" name="name" value="{{ Auth::guard('member')->user()->name }}" class="form-control" id="" readonly></span>
                        <span>Email: <input type="email" name="email" value="{{ Auth::guard('member')->user()->email }}" class="form-control" id="" readonly></span>
                        <input type="hidden" name="buy_id" value="{{ $buy_currency->id }}">
                        <input type="hidden" name="member_id" value="{{ Auth::guard('member')->user()->id }}">
                        <button type="submit" class="btn btn-primary btn-block" style="margin-top: 10px;"><i class="fa fa-credit-card"></i> Confirm Order</button>

                        {!! Form::close() !!}
                    </div>
                </div>

            </div>

        </div>

    </section><!-- #content end -->




@endsection