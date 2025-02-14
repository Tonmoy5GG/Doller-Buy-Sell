@extends('layouts.home')
@section('title','Member Update')
@section('content')

    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <div class="tabs divcenter nobottommargin clearfix" id="tab-login-register" style="max-width: 500px;">

                    <div class="tab-container">

                        <div class="tab-content clearfix" id="tab-login">
                            <div class="panel panel-default nobottommargin">
                                <div class="panel-body" style="padding: 40px;">
                                    <form id="register-form" name="register-form" class="nobottommargin" action="{{ route('member-update') }}" method="post" enctype="multipart/form-data">
                                        {!! csrf_field() !!}

                                        <h3>Update Member Details</h3>

                                        <div class="col_full">
                                            <label for="register-form-name">Name:</label>
                                            <input type="text" id="register-form-name" name="name" required value="{{ $member->name }}" class="form-control" />
                                        </div>

                                        <div class="col_full">
                                            <label for="register-form-email">Email Address:</label>
                                            <input type="text" id="register-form-email" name="email" required value="{{ $member->email }}" class="form-control" />
                                        </div>

                                        <div class="col_full">
                                            <label for="register-form-phone">Phone Number:</label>
                                            <input type="text" id="register-form-phone" name="phone" required value="{{ $member->phone }}" class="form-control" />
                                        </div>

                                        <div class="col_full">
                                            <label for="register-form-phone">Address:</label>
                                            <textarea name="address" id="" required cols="30" rows="3"
                                                      class="form-control">{{ $member->address }}</textarea>
                                        </div>
                                        <div class="col_full">
                                            <label for="register-form-phone">Reference User ID:</label>
                                            <input type="text" id="register-form-phone" name="reference" readonly value="{{ $member->reference }}" class="form-control" />
                                        </div>
                                        <div class="col_full">
                                            <label for="register-form-phone">Profile Picture:</label><br>
                                            <img style="width: 30%;" src="{{ asset('images') }}/{{ $member->image }}" alt="">
                                        </div>
                                        <div class="col_full">
                                            <label for="register-form-phone">Change Picture:</label>
                                            <input type="file" name="image" id="" class="form-control">
                                        </div>

                                        <div class="col_full">
                                            <label for="register-form-phone">Nid or Passport:</label><br>
                                            <a href="#" data-toggle="modal" data-target=".pop-up-1">
                                                <img src="{{ asset('images') }}/{{ $member->nid }}" width="150" class="img-responsive img-rounded" alt="">
                                            </a>
                                            {{--<img style="width: 40%;" src="" alt="">--}}
                                        </div>
                                        <div class="col_full">
                                            <label for="register-form-phone">Change NID or Passport:</label>
                                            <input type="file" name="nid" id="" class="form-control">
                                        </div>


                                        <div class="col_full nobottommargin">
                                            <button class="button button-3d button-black nomargin" id="register-form-submit" name="register-form-submit" value="register"><i class="fa fa-send"></i> Update Member</button>
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