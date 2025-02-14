@extends('layouts.dashboard')
@section('title', 'Sell Currency')
@section('content')


    @if(count($sell))

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
                            @foreach($sell as $p)
                                @php $i++; @endphp
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $p->buy->currency->name }}</td>
                                    <td>{{ $p->buy->quantity}} - {{ $p->buy->currency->name }}</td>
                                    <td>{{ $p->buy->currency->sell_rate * $p->buy->quantity}} - {{ $base_currency }}</td>
                                    <td>{{ $p->name }}</td>
                                    <td>{{ $p->email }}</td>
                                    <td>
                                        @if($p->status == 0)
                                            <span class="control-label label label-success">Pending</span>
                                        @else
                                            <span class="label label-primary">Success</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('sell-invoice',$p->id) }}" class="btn btn-primary"><i class="fa fa-eye"></i> View Details</a>

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
            {!! $sell->render() !!}
        </div>
    @else

        <div class="text-center">
            <h3>No Data available</h3>
        </div>
    @endif


@endsection


