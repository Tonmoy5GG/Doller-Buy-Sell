@extends('layouts.dashboard')
@section('title', 'Currency Create')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">

                <div class="portlet-body form">

                        {!! Form::model($member,['route'=>['admin-member-update',$member->id],'method'=>'put','class'=>'form-horizontal','files'=>true]) !!}
                        <div class="form-body">

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Member Name : </label>

                                <div class="col-sm-7">
                                    <input name="name" value="{{ $member->name }}" class="form-control input-lg" type="text" required placeholder="Member Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Member Email : </label>

                                <div class="col-sm-7">
                                    <input name="email" value="{{ $member->email }}" class="form-control input-lg" type="email" required placeholder="Member Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Member Phone : </label>

                                <div class="col-sm-7">
                                    <input name="phone" value="{{ $member->phone }}" class="form-control input-lg" type="text" required placeholder="Member Phone">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Member Address : </label>

                                <div class="col-sm-7">
                                    <textarea name="address" id="" cols="30" rows="5" required class="form-control input-lg" placeholder="Member Address">{{ $member->address }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Member Reference ID : </label>

                                <div class="col-sm-7">
                                    <input type="text" name="reference" id="" value="{{ $member->reference }}" required class="form-control input-lg" placeholder="Member Reference ID">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Profile Picture : </label>
                                <div class="col-sm-7">
                                    <img src="{{ asset('images') }}/{{ $member->image }}" alt="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Change Profile Picture : </label>
                                <div class="col-sm-7">
                                    <input type="file" name="image" id="" class="form-control input-lg"><br>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Member NID or Passport : </label>
                                <div class="col-sm-7">
                                    <a href="#" data-toggle="modal" data-target=".pop-up-1">
                                        <img src="{{ asset('images') }}/{{ $member->nid }}" width="150" class="img-responsive img-rounded" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Member NID or Passport : </label>
                                <div class="col-sm-7">
                                    <input type="file" name="nid" id="" class="form-control input-lg"><br>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Change Password : </label>
                                <div class="col-sm-7">
                                    <input type="password" name="password" id="" class="form-control input-lg" placeholder="Member Change Password"><br>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Confirm Password : </label>
                                <div class="col-sm-7">
                                    <input type="password" name="password_confirmation" id="" class="form-control input-lg" placeholder="Confirm New Password"><br>
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="row">
                                    <div class="col-md-offset-3 col-md-7">
                                        <button type="submit" class="btn blue btn-block margin-top-10"><i class="fa fa-paper-plane"></i> Update Member</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div><!---ROW-->
    <!--  Modal content for the mixer image example -->
    <div class="modal fade pop-up-1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <img src="{{ asset('images') }}/{{ $member->nid }}" class="img-responsive img-rounded center-block" alt="">
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal mixer image -->


@endsection

