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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Reference ID</th>
                                <th>Under Reference</th>
                                <th>Created Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @php $i=0; @endphp
                            @foreach($member as $s)
                                @php $i++; @endphp
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $s->name }}</td>
                                    <td>{{ $s->email }}</td>
                                    <td>{{ $s->phone }}</td>
                                    <td>{{ $s->address }}</td>
                                    <td>{{ $s->reference }}</td>
                                    <td>{{ $s->under_reference }}</td>
                                    <td>{{ date('d-F-Y',strtotime($s->created_at)) }}</td>
                                    <td>
                                        @if($s->status == 0)
                                            <button type="button" class="btn btn-sm btn-primary delete_button"
                                                    data-toggle="modal" data-target="#DelModal"
                                                    data-id="{{ $s->id }}">
                                                <i class='fa fa-check'></i> Active
                                            </button>
                                        @else
                                            <button type="button" class="btn btn-sm btn-danger delete_button1"
                                                    data-toggle="modal" data-target="#DelModal1"
                                                    data-id="{{ $s->id }}">
                                                <i class='fa fa-times'></i> DeActive
                                            </button>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin-member-edit',$s->id) }}" class="btn btn-danger"><i class="fa fa-edit"></i> Edit Member</a>
                                        <a href="{{ route('member-activity',$s->id) }}" class="btn btn-primary"><i class="fa fa-eye"></i> View Activity</a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div><!-- ROW-->
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
                    <h4 class="modal-title" id="myModalLabel"> <i class='fa fa-times'></i> DeActive!</h4>
                </div>

                <div class="modal-body">
                    <strong>Are you sure. You Want to DeActive This member ?</strong>
                </div>

                <div class="modal-footer">
                    <form method="post" action="{{ route('member-deactive') }}" class="form-inline">
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
                    <h4 class="modal-title" id="myModalLabel"> <i class='fa fa-check'></i> Active !</h4>
                </div>

                <div class="modal-body">
                    <strong>Are you sure you Want to Active This Member ?</strong>
                </div>

                <div class="modal-footer">
                    <form method="post" action="{{ route('active-member') }}" class="form-inline">
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

