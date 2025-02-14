@extends('layouts.home')
@section('title','Member Area')
@section('content')

    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <div class="tabs divcenter nobottommargin clearfix" id="tab-login-register" style="max-width: 500px;">


                    <div class="tab-container">

                        <div class="text-center">
                            <h3>Register Under A Reference</h3>
                        </div>
                        <div class="tab-content clearfix" id="tab-register">
                            <div class="panel panel-default nobottommargin">
                                <div class="panel-body" style="padding: 40px;">
                                    <h3>Register for an Account</h3>

                                    <form id="register-form" name="register-form" class="nobottommargin" action="{{ route('member-registration') }}" method="post" enctype="multipart/form-data">
                                        {!! csrf_field() !!}

                                        <div class="col_full">
                                            <label for="register-form-name">Name:</label>
                                            <input type="text" id="register-form-name" name="name" required value="" class="form-control" />
                                        </div>

                                        <div class="col_full">
                                            <label for="register-form-email">Email Address:</label>
                                            <input type="text" id="register-form-email" name="email" required value="" class="form-control" />
                                        </div>

                                        <div class="col_full">
                                            <label for="register-form-phone">Phone Number:</label>
                                            <input type="text" id="register-form-phone" name="phone" required value="" class="form-control" />
                                        </div>

                                        <div class="col_full">
                                            <label for="register-form-phone">Address:</label>
                                            <textarea name="address" id="" required cols="30" rows="3"
                                                      class="form-control"></textarea>
                                        </div>
                                        <div class="col_full">
                                            <label for="register-form-phone">Reference User ID:</label>
                                            <input type="text" id="register-form-phone" name="reference" readonly value="{{ $reference }}" class="form-control" />
                                        </div>
                                        <div class="col_full">
                                            <label for="register-form-phone">Profile Picture:</label>
                                            <input type="file" name="image" required id="" class="form-control">
                                        </div>
                                        <div class="col_full">
                                            <label for="register-form-phone">NID or Passport Picture:</label>
                                            <input type="file" name="nid" required id="" class="form-control">
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
                                            <button class="button button-3d button-black nomargin" id="register-form-submit" name="register-form-submit" value="register"><i class="fa fa-send"></i> Register Now</button>
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