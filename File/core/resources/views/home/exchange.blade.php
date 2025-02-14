@extends('layouts.home')
@section('title', "Exchange Currency" )
@section('content')


    <!-- Content
		============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <div class="row">
                    <div class="col-md-12">

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

                        {!! Form::open(['route'=>'user-exchange-currency','class'=>'form-horizontal','method'=>'get']) !!}

                        <div class="form-body">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-12">Select Currency : </label>

                                    <div class="col-sm-12">
                                        <select name="currency_id" id="rate" class="form-control input-lg" required>
                                            <option value="">Select One</option>
                                            @foreach($currency as $c)
                                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

 
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-12">Exchange Currency : </label>

                                    <div class="col-sm-12">
                                        <select name="exchange_currency_id" id="rate" class="form-control input-lg" required>
                                            <option value="">Select One</option>
                                            @foreach($currency as $c)
                                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>



                             <div class="col-md-12">
                                   <div class="form-group">
                                        <label class="col-sm-12">Currency Quantity: </label>

                                        <div class="col-sm-12">
                                            <input type="number" name="quantity" id="quantity" class="form-control input-lg" placeholder="Currency Quantity" required>
                                        </div>
                                    </div>


                            </div>

                            <div class="form-group">

                                <div class="row">
                                    <div class="col-md-offset-3 col-md-6">
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