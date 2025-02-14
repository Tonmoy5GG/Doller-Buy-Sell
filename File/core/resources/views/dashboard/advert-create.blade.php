@extends('layouts.dashboard')
@section('title', 'Bank Add')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">

                <div class="portlet-body form">
                    {!! Form::model($advert,['route'=>['advert-update',$advert->id],'method'=>'put','class'=>'form-horizontal','files'=>true]) !!}
                    <div class="form-body">


                        <div class="form-group">
                            <label class="col-sm-3 control-label">Advert Size ( 728x90 ) : </label>

                            <div class="col-sm-8">
                                <textarea name="link" id="" class="form-control input-lg" cols="30" rows="5" required placeholder="Advertisement Link">{{ $advert->link }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Advert Size ( 468x60 ) : </label>

                            <div class="col-sm-8">
                                <textarea name="link2" id="" class="form-control input-lg" cols="30" rows="5" required placeholder="Advertisement Link">{{ $advert->link2 }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="row">
                                <div class="col-md-offset-3 col-md-8">
                                    <button type="submit" class="btn blue btn-block margin-top-10"><i class="fa fa-send"></i> Update Advertisement</button>
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

