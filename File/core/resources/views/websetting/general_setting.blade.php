@extends('layouts.dashboard')
@section('title', 'General Setting')

@section('content')


    <div class="row">
        <div class="col-md-12">

            <div class="portlet light bordered">
                <div class="portlet-body form">
                    {!! Form::model($general,['route'=>['update_general',$general->id],'method'=>'PUT','role'=>'form','class'=>'form-horizontal','files'=>true]) !!}
                        <div class="form-body">

                            <div class="form-group">
                                <label class="col-md-3 control-label"><strong>Website Name</strong></label>

                                <div class="col-md-8">
                                    <input class="form-control input-lg" name="title" value="{{ $general->title }}"
                                           type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><strong>Website Logo</strong></label>

                                <div class="col-md-8">
                                    <img src="{{ asset('images/logo.png') }}" alt="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><strong>Change Logo</strong></label>
                                <div class="col-md-8">
                                    <div class="col-sm-4"><input name="image" type="file" class="form-control" /></div>
                                    <div class="col-sm-8"><b style="color:red; font-weight: bold; float: right;margin-right: 10px">Image Must be PNG & Resize: 225x60</b></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><strong>Website Favcion</strong></label>

                                <div class="col-md-8">
                                    <img src="{{ asset('images/favicon.png') }}" alt="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><strong>Change Favicon</strong></label>
                                <div class="col-md-8">
                                    <div class="col-sm-4"><input name="image1" type="file" class="form-control" /></div>
                                    <div class="col-sm-8"><b style="color:red; font-weight: bold; float: right;margin-right: 10px">Image Must be PNG & Resize: 60x60</b></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><strong>Base Currency</strong></label>

                                <div class="col-md-8">
                                    <input type="text" value="{{ $general->currency }}" name="currency" id="" class="form-control input-lg" placeholder="" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><strong>Reference Percentage</strong></label>

                                <div class="col-md-8">
                                    <input type="text" value="{{ $general->percentage }}" name="percentage" id="" class="form-control input-lg" placeholder="" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><strong>Member Withdraw Limit</strong></label>

                                <div class="col-md-8">
                                    <input type="number" value="{{ $general->withdraw }}" name="withdraw" id="" class="form-control input-lg" placeholder="" required>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><strong>Home Scroll Text</strong></label>

                                <div class="col-md-8">
                                    <textarea name="scroll" id="" cols="30" rows="5"
                                              class="form-control input-lg" required placeholder="Home Page Scroll Text">{{ $general->scroll }}</textarea>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><strong>Address</strong></label>

                                <div class="col-md-8">
                                    <input class="form-control input-lg" name="address" value="{{ $general->address }}"
                                           type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><strong>Mobile</strong></label>

                                <div class="col-md-8">
                                    <input class="form-control input-lg" name="number" value="{{ $general->number }}"
                                           type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><strong>Email</strong></label>

                                <div class="col-md-8">
                                    <input class="form-control input-lg" name="email" value="{{ $general->email }}"
                                           type="email">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><strong>Facebook</strong></label>

                                <div class="col-md-8">
                                    <input class="form-control input-lg" name="facebook" value="{{ $general->facebook }}"
                                           type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><strong>Twitter</strong></label>

                                <div class="col-md-8">
                                    <input class="form-control input-lg" name="twitter" value="{{ $general->twitter }}"
                                           type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><strong>Google Plus</strong></label>

                                <div class="col-md-8">
                                    <input class="form-control input-lg" name="google_plus" value="{{ $general->google_plus }}"
                                           type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><strong>Linkedin</strong></label>

                                <div class="col-md-8">
                                    <input class="form-control input-lg" name="linkedin" value="{{ $general->linkedin }}"
                                           type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><strong>Youtube</strong></label>

                                <div class="col-md-8">
                                    <input class="form-control input-lg" name="youtube" value="{{ $general->youtube }}"
                                           type="text">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><strong>Footer Text</strong></label>
                                <div class="col-md-8">
                                    <textarea name="footer_text" class="wysihtml5 form-control input-lg" id="" cols="30" rows="5">{{ $general->footer_text }}</textarea>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><strong>Footer Bottom Text</strong></label>
                                <div class="col-md-8">
                                    <textarea name="footer_bottom_text" class="wysihtml5 form-control input-lg" id="" cols="30" rows="2">{{ $general->footer_bottom_text }}</textarea>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-offset-3 col-md-8">
                                    <button type="submit" class="btn blue btn-block">Save Changes</button>
                                </div>
                            </div>

                        </div>
                    {!! Form::close() !!}
                </div>
            </div>


        </div>
    </div><!---ROW-->


@endsection
@section('scripts')

    <link href="{{asset('assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js')}}" type="text/javascript"></script>

    <script src="{{asset('assets/pages/scripts/components-editors.min.js')}}" type="text/javascript"></script>

@endsection