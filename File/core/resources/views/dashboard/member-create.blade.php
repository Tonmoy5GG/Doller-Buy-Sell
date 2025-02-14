@extends('layouts.dashboard')
@section('title', 'Currency Create')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">

                <div class="portlet-body form">
                    <form action="{{ route('member-registration') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                        {{--{!! Form::open(['route'=>'member-registration','method'=>'post','class'=>'form-horizontal','files'=>true]) !!}--}}
                    <div class="form-body">

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Member Name : </label>

                            <div class="col-sm-7">
                                <input name="name" value="" class="form-control input-lg" type="text" required placeholder="Member Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Member Email : </label>

                            <div class="col-sm-7">
                                <input name="email" value="" class="form-control input-lg" type="email" required placeholder="Member Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Member Phone : </label>

                            <div class="col-sm-7">
                                <input name="phone" value="" class="form-control input-lg" type="text" required placeholder="Member Phone">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Member Address : </label>

                            <div class="col-sm-7">
                                <textarea name="address" id="" cols="30" rows="5" required class="form-control input-lg" placeholder="Member Address"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Member Reference ID : </label>

                            <div class="col-sm-7">
                                <input type="text" name="reference" id="" required class="form-control input-lg" placeholder="Member Reference ID">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Profile Picture : </label>
                            <div class="col-sm-7">
                                <input type="file" name="image" id="" class="form-control input-lg" required><br>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Member NID or Passport : </label>
                            <div class="col-sm-7">
                                <input type="file" name="nid" id="" class="form-control input-lg" required><br>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Member Password : </label>
                            <div class="col-sm-7">
                                <input type="password" name="password" id="" class="form-control input-lg" required placeholder="Member Password"><br>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Confirm Password : </label>
                            <div class="col-sm-7">
                                <input type="password" name="password_confirmation" id="" class="form-control input-lg" required placeholder="Confirm Password"><br>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="row">
                                <div class="col-md-offset-3 col-md-7">
                                    <button type="submit" class="btn blue btn-block margin-top-10"><i class="fa fa-paper-plane"></i> Create New Member</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--{!! Form::close() !!}--}}
                    </form>
                </div>

            </div>
        </div>
    </div><!---ROW-->


@endsection

