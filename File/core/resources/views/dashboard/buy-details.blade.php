@extends('layouts.dashboard')
@section('title', 'Buy Invoice')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-body">
                    <!-- Main content -->
                    <section class="content">
                        <section class="content invoice">
                            <!-- title row -->
                            <div class="row">

                            </div>

                            <!-- Table row -->
                            <div class="row">
                                <div class="col-xs-12 table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Currency</th>
                                            <th>Quantity</th>
                                            <th>Total Price</th>
                                            <th>Transaction ID</th>
                                            <th>Payment Method</th>
                                            <th>Seller Name</th>
                                            <th>Seller Email</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>{{ date('d F Y',strtotime($buy->created_at)) }}</td>
                                            <td>{{ $buy->sell->currency->name }}</td>
                                            <td>{{ $buy->sell->quantity}} - {{ $buy->sell->currency->name }}</td>
                                            <td>{{ $buy->sell->currency->buy_rate * $buy->sell->quantity}} - {{ $base_currency }}</td>
                                            <td>{{ $buy->transaction_id }}</td>
                                            <td>{{ $buy->payment_method }}</td>
                                            <td>{{ $buy->name }}</td>
                                            <td>{{ $buy->email }}</td>
                                            <td>
                                                @if($buy->status == 0)
                                                    <span class="control-label label label-success">Pending</span>
                                                @else
                                                    <span class="label label-primary">Success</span>
                                                @endif
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                            <div class="row">
                                <div class="col-md-3">
                                    <h3>Transaction Image :</h3>
                                </div>
                                <div class="col-md-9">
                                    <img style="width: 100%;height: 300px" src="{{ asset('images') }}/{{ $buy->image }}" alt="">
                                </div>

                            </div>

                            <div style="margin-top: 20px;" class="row">
                                <!-- accepted payments column -->
                                <div class="col-xs-6">

                                </div>
                                <!-- /.col -->
                                <div class="col-xs-6">
                                    <p class="lead">Amount</p>

                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <th style="width:50%">Total:</th>
                                                <td>
                                                    {{ $buy->sell->currency->buy_rate * $buy->sell->quantity}} - {{ $base_currency }}
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                            <hr>
                            <!-- this row will not appear when printing -->
                            @if($buy->status == 0)
                            <div class="row">
                                <div class="col-md-2 col-md-offset-8">
                                    <button type="button" class="btn btn-danger btn-block btn-sm delete_button"
                                            data-toggle="modal" data-target="#DelModal"
                                            data-id="{{ $buy->id }}">
                                        <i class='fa fa-envelope'></i> Send Message
                                    </button>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-primary btn-sm btn-block delete_button1"
                                            data-toggle="modal" data-target="#DelModal1"
                                            data-id="{{ $buy->id }}">
                                        <i class='fa fa-money'></i> Payment Success
                                    </button>
                                </div>
                            </div>
                                @endif
                        </section>
                    </section>
                </div> {{-- Body Close --}}
            </div> {{-- Border Close--}}
        </div> {{-- col-md-12 --}}
    </div><!-- ROW-->

    <!-- Modal for DELETE -->
    <div class="modal fade" id="DelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"> <i class='fa fa-envelope'></i> Send Message !</h4>
                </div>

                <div class="modal-footer">

                    {!! Form::open(['route'=>'admin-buy-message','method'=>'post','class'=>'form-horizontal','files'=>true]) !!}
                    <div class="form-body">

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Seller Name : </label>

                            <div class="col-sm-9">
                                <input name="name" value="{{ $buy->name }}" class="form-control input-lg" type="text" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Seller Email : </label>

                            <div class="col-sm-9">
                                <input name="email" value="{{ $buy->email }}" class="form-control input-lg" type="text" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Subject : </label>

                            <div class="col-sm-9">
                                <input name="subject" value="" class="form-control input-lg" type="text" placeholder="Email Subject" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Message : </label>

                            <div class="col-sm-9">
                                <textarea name="message" id="" cols="30" rows="4"
                                          class="form-control input-lg" placeholder="Message......." required></textarea>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="row">
                                <div class="col-md-offset-3 col-md-8">
                                    <input type="hidden" name="id" class="abir_id" value="0">

                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-envelope"></i> Send Message</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
    <!-- Modal for DELETE -->
    <div class="modal fade" id="DelModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"> <i class='fa fa-money'></i> Success !</h4>
                </div>

                <div class="modal-body">
                    <strong>Are you sure you Payment Success ?</strong>
                </div>

                <div class="modal-footer">
                    <form method="post" action="{{ route('admin-sell-update') }}" class="form-inline">
                        {!! csrf_field() !!}
                        <input type="hidden" name="id" class="abir_id" value="0">

                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger"><i class="fa fa-check"></i> Yes. Completed</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
@section('scripts')

    <script>
        $(document).ready(function () {

            $(document).on("click", '.delete_button', function (e) {
                var id = $(this).data('id');
                $(".abir_id").val(id);

            });

        });
        $(document).ready(function () {

            $(document).on("click", '.delete_button1', function (e) {
                var id = $(this).data('id');
                $(".abir_id").val(id);

            });

        });
    </script>

@endsection

