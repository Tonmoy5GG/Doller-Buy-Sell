@extends('layouts.home')
@section('title','Member Area')
@section('content')

    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <div class="tabs divcenter nobottommargin clearfix" id="tab-login-register" style="max-width: 500px;">

                    <div class="tab-container">
                        
                        <div class="tab-content clearfix" id="tab-register">
                            <div class="panel panel-default nobottommargin">
                                <div class="panel-body" style="padding: 40px;">
                                    <h3>Changes Your Password</h3>

                                    <form id="register-form" name="register-form" class="nobottommargin" action="{{ url('member/password/reset')}}" method="post">
                                        {!! csrf_field() !!}

                                        <input type="hidden" name="token" value="{{ $token }}">
                                        <div class="col_full">
                                            <label for="register-form-email">Email Address:</label>
                                            <input type="text" id="register-form-email" name="email" required value="" class="form-control" />
                                        </div>
                                        
                                        <div class="col_full">
                                            <label for="register-form-password">Choose Password:</label>
                                            <input type="password" id="register-form-password" name="password" required value="" class="form-control" />
                                        </div>

                                        <div class="col_full">
                                            <label for="register-form-repassword">Re-enter Password:</label>
                                            <input type="password" id="register-form-repassword" name="password_confirmation" value="" class="form-control" />
                                        </div>

                                        <div class="col_full nobottommargin">
                                            <button class="button button-3d button-black nomargin" id="register-form-submit" name="register-form-submit" value="register"><i class="fa fa-send"></i> Change Password</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


@endsection