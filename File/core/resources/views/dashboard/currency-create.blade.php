@extends('layouts.dashboard')
@section('title', 'Currency Create')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">

                <div class="portlet-body form">
                    {!! Form::open(['method'=>'post','class'=>'form-horizontal','files'=>true]) !!}
                    <div class="form-body">

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Currency Name : </label>

                            <div class="col-sm-6">
                                <input name="name" value="" class="form-control input-lg" type="text" required placeholder="Currency Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Currency Logo : </label>
                            <div class="col-sm-6">
                                <input type="file" name="image" id="" class="form-control input-lg" required><br>
                                <span style="color: red;font-weight: bold">Image Must Be PNG or JPG & Resize 200 x 60</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Currency Buy Rate : </label>

                            <div class="col-sm-6">
                                <input name="buy_rate" value="" class="form-control input-lg" type="text" required placeholder="Currency Buy Rate ">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Currency Sell Rate : </label>

                            <div class="col-sm-6">
                                <input name="sell_rate" value="" class="form-control input-lg" type="text" required placeholder="Currency Sell Rate ">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Payment ID : </label>

                            <div class="col-sm-6">
                                <input name="payment_id" value="" class="form-control input-lg" type="text" required placeholder="Currency Payment ID ">
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="row">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" class="btn blue btn-block margin-top-10"><i class="fa fa-paper-plane"></i> Create Currency</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div><!---ROW-->


@endsection

