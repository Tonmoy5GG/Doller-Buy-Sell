@extends('layouts.dashboard')
@section('title', 'Exchange Currency')
@section('content')


    @if(count($exchange))

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
                                <th>Exchange Currency</th>
                                <th>Exchange Price</th>
                                <th>Exchanger Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @php $i=0; @endphp
                            @foreach($exchange as $p)
                                @php $i++; @endphp
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $p->exchange->currency->name }}</td>
                                    <td>{{ $p->exchange->quantity}} - {{ $p->exchange->currency->name }}</td>
                                    <td>{{ $p->exchange->exchangeCurrency->name }}</td>
                                    <td>{{ $p->exchange_price }} - {{ $p->exchange->exchangeCurrency->name }}</td>
                                    <td>{{ $p->name }}</td>
                                    <td>
                                        @if($p->status == 0)
                                            <span class="control-label label label-success">Pending</span>
                                        @else
                                            <span class="label label-primary">Success</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('exchange-invoice',$p->id) }}" class="btn btn-primary"><i class="fa fa-eye"></i> View Details</a>

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
            {!! $exchange->render() !!}
        </div>
    @else

        <div class="text-center">
            <h3>No Data available</h3>
        </div>
    @endif


@endsection


