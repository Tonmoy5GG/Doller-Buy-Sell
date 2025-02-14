@extends('layouts.home')
@section('title','Change Password')
@section('content')

    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <div class="tabs divcenter nobottommargin clearfix" id="tab-login-register" style="max-width: 500px;">

                    <div class="tab-container">

                        <div class="tab-content clearfix" id="tab-login">
                            <div class="panel panel-default nobottommargin">
                                <div class="panel-body" style="padding: 40px;">
                                    <form id="login-form" name="login-form" class="nobottommargin" action="{{ route('update-member-password-change') }}" method="post">

                                        {!! csrf_field() !!}
                                        <h3>Change Your Password</h3>

                                        <div class="col_full">
                                            <label for="login-form-username">Current Password:</label>
                                            <input type="password" id="login-form-username" name="current" value="" class="form-control" required />
                                        </div>
                                        <div class="col_full">
                                            <label for="login-form-username">New Password:</label>
                                            <input type="password" id="login-form-username" name="password" value="" class="form-control" required />
                                        </div>
                                        <div class="col_full">
                                            <label for="login-form-username">RE-Type Password:</label>
                                            <input type="password" id="login-form-username" name="password_confirmation" value="" class="form-control" required />
                                        </div>

                                        <div class="col_full nobottommargin">
                                            <button class="button button-3d button-black nomargin" id="login-form-submit" name="login-form-submit" value="login"><i class="fa fa-send"></i> Change Password</button>
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