@extends('layouts.dashboard')
@section('title', 'Bank Edit')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">

                <div class="portlet-body form">
                    {!! Form::model($bank,['route'=>['bank-update',$bank->id],'method'=>'PUT','class'=>'form-horizontal','files'=>true]) !!}
                    <div class="form-body">


                        <div class="form-group">
                            <label class="col-sm-3 control-label">Bank Name : </label>

                            <div class="col-sm-6">
                                <input name="name" value="{{ $bank->name }}" class="form-control input-lg" type="text" required placeholder="Bank Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Account Number : </label>

                            <div class="col-sm-6">
                                <input name="account" value="{{ $bank->account }}" class="form-control input-lg" type="text" required placeholder="Bank Account Number">
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="row">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" class="btn blue btn-block margin-top-10"><i class="fa fa-send"></i> Update Bank Info</button>
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

