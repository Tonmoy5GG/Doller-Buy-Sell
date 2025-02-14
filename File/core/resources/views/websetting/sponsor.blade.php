@extends('layouts.dashboard')
@section('title', 'Sponsor')
@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">

                <div class="portlet-body form">
                    {!! Form::open(['method'=>'post','files'=>true,'class'=>'form-horizontal']) !!}
                    <div class="form-body">

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Sponsor Name : </label>

                            <div class="col-sm-6">
                                <input name="name" value="" class="form-control input-lg" type="text" required placeholder="Sponsor Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Sponsor Image : </label>

                            <div class="col-sm-6">
                                <input name="image" value="" class="form-control input-lg" type="file" required ><br>
                                <b style="color:red; font-weight: bold; float: right;margin-right: 10px">PNG IMAGE ONLY | Will Resize to 100 x 75 </b>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="row">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" class="btn blue btn-block margin-top-10"><i class="fa fa-paper-plane"></i> Create Sponsor</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div><!---ROW-->
    <hr>
    <div class="row">
        @foreach($sponsor as $s)
            <div class="col-md-3">
                <div class="images">
                    <img src="{{ asset('extra-images') }}/{{ $s->image }}" alt="" style="width: 245px;height: 160px; margin-top: 20px;margin-bottom: 10px">
                    {!! Form::open(['route'=>['delete-slider',$s->id],'method'=>'DELETE']) !!}
                    <button type="submit" class="btn btn-danger btn-block btn-lg" onclick="return confirm('Are You Sure..!')"><i class="fa fa-trash"></i> Delete Sponsor</button>
                    {!! Form::close() !!}
                </div>
            </div>
        @endforeach
    </div>


@endsection

