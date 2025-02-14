@extends('layouts.home')
@section('title', "Buy Currency" )
@section('content')


    <!-- Content
		============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <div class="row">
                    <div class="col-md-8 col-md-offset-2">

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

                        {!! Form::open(['route'=>'user-buy-currency','class'=>'form-horizontal','method'=>'get']) !!}
                        <div class="form-body">

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Select Currency : </label>

                                <div class="col-sm-7">
                                    <select name="currency_id" id="rate" class="form-control input-lg" required>
                                        <option value="">Select One</option>
                                        @foreach($currency as $c)
                                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Currency Quantity: </label>

                                <div class="col-sm-7">
                                    <input type="number" name="quantity" id="quantity" class="form-control input-lg" placeholder="Currency Quantity" required>
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="row">
                                    <div class="col-md-offset-3 col-md-7">
                                        <button type="submit" class="btn btn-success btn-block margin-top-10"><i class="fa fa-paper-plane"></i> Next</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}

                        <div style="margin: 60px 0;" class="text-center">
                            {!!  $advert->link  !!}
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section><!-- #content end -->




@endsection