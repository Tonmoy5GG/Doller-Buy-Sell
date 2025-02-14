@extends('layouts.dashboard')
@section('title', 'Bonus History')
@section('content')


    @if(count($buy))

        <div class="row">
            <div class="col-md-12">


                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                        </div>
                        <div class="tools"> </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_1">

                            <thead>
                            <tr>
                                <th>ID#</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Method</th>
                                <th>Details</th>
                                <th>Message</th>
                                <th>Member Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @php $i=0; @endphp
                            @foreach($buy as $s)
                                @php $i++; @endphp
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ date('d-F-Y',strtotime($s->created_at)) }}</td>
                                    <td>{{ $s->amount }} - {{ $general->currency }}</td>
                                    <td>{{ $s->currency->name }}</td>
                                    <td>{{ $s->details }}</td>
                                    <td>{{ $s->message }}</td>
                                    <td>{{ $s->member->email }}</td>
                                    <td>

                                        @if($s->status == 0)
                                            <span class="label label-danger"><i class="fa fa-spinner"></i> Pending</span>
                                        @elseif($s->status == 1)
                                            <span class="label label-primary"><i class="fa fa-check"></i> Success</span>
                                        @else
                                            <span class="label label-warning"><i class="fa fa-exclamation-triangle"></i> Refund</span>
                                        @endif

                                    </td>
                                    <td>
                                        @if($s->status == 0)
                                            <button type="button" class="btn btn-sm btn-primary delete_button"
                                                    data-toggle="modal" data-target="#DelModal1"
                                                    data-id="{{ $s->id }}">
                                                <i class='fa fa-check'></i> Payment
                                            </button>
                                            <button type="button" class="btn btn-sm btn-danger delete_button1"
                                                    data-toggle="modal" data-target="#DelModal"
                                                    data-id="{{ $s->id }}">
                                                <i class='fa fa-exclamation-triangle'></i> Refund
                                            </button>
                                        @else
                                            <span class="label label-primary"><i class="fa fa-times"></i> No Action</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div><!-- ROW-->


        <div class="text-center">
            {!! $buy->render() !!}
        </div>
    @else

        <div class="text-center">
            <h3>No Data available</h3>
        </div>
    @endif

    <div class="modal fade" id="DelModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"> <i class='fa fa-money'></i> Success !</h4>
                </div>

                <div class="modal-body">
                    <strong>Are you sure Payment Success ?</strong>
                </div>

                <div class="modal-footer">
                    <form method="post" action="{{ route('withdraw-success') }}" class="form-inline">
                        {!! csrf_field() !!}
                        <input type="hidden" name="id" class="abir_id" value="0">

                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger"><i class="fa fa-check"></i> Yes. Sure</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="DelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"> <i class='fa fa-money'></i> Refund !</h4>
                </div>

                <div class="modal-body">
                    <strong>Are you sure Payment Refund ?</strong>
                </div>

                <div class="modal-footer">
                    <form method="post" action="{{ route('withdraw-refund') }}" class="form-inline">
                        {!! csrf_field() !!}
                        <input type="hidden" name="id" class="abir_id" value="0">

                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger"><i class="fa fa-check"></i> Yes. Sure</button>
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

