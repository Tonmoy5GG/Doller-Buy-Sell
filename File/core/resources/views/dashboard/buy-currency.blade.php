@extends('layouts.dashboard')
@section('title', 'Buy Currency')
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
                                <th>Currency Name</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Seller Name</th>
                                <th>Seller Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @php $i=0; @endphp
                            @foreach($buy as $p)
                                @php $i++; @endphp
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $p->sell->currency->name }}</td>
                                    <td>{{ $p->sell->quantity}} - {{ $p->sell->currency->name }}</td>
                                    <td>{{ $p->sell->currency->buy_rate * $p->sell->quantity}} - {{ $base_currency }}</td>
                                    <td>{{ $p->name }}</td>
                                    <td>{{ $p->email }}</td>
                                    <td>
                                        @if($p->status == 0)
                                        <span class="label label-success">Pending</span>
                                        @else
                                            <span class="label label-primary">Success</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('buy-invoice',$p->id) }}" class="btn btn-primary"><i class="fa fa-eye"></i> View Details</a>
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

    <!-- Modal for DELETE -->
    <div class="modal fade" id="DelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"> <i class='fa fa-money'></i> Payment Complete !</h4>
                </div>

                <div class="modal-body">
                    <strong>Are you sure Payment Completed ?</strong>
                </div>

                <div class="modal-footer">
                    <form method="post" action="{{ route('admin-sell-update') }}" class="form-inline">
                        {!! csrf_field() !!}
                        <input type="hidden" name="id" class="abir_id" value="0">

                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Yes. Complete</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <img class="img-responsive" src="" style="width: 100%;height: 100%"/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
            $('img').on('click', function () {
                var image = $(this).attr('src');
                $('#myModal').on('show.bs.modal', function () {
                    $(".img-responsive").attr("src", image);
                });
            });
        });
    </script>

@endsection

