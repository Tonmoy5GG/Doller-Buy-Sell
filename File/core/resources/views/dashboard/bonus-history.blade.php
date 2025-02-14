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
                                <th>Bonus For</th>
                                <th>Member Name</th>
                                <th>Percentage</th>
                                <th>Bonus</th>
                                <th>Reference ID</th>
                                <th>Bonus From</th>
                            </tr>
                            </thead>
                            <tbody>

                            @php $i=0; @endphp
                            @foreach($buy as $s)
                                @php $i++; @endphp
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ date('d-F-Y',strtotime($s->created_at)) }}</td>
                                    <td>
                                        @if($s->bonus_type == 1)
                                            <span class="label label-primary label-sm">Sell Currency</span>
                                        @elseif($s->bonus_type == 2)
                                            <span class="label label-primary label-sm">Buy Currency</span>
                                        @else
                                            <span class="label label-primary label-sm">Exchange Currency</span>
                                        @endif
                                    </td>
                                    <td>{{ $s->member->name }}</td>
                                    <td>{{ $s->percentage }} %</td>
                                    <td>{{ $s->amount }} - {{ $general->currency }}</td>
                                    <td>{{ $s->member_reference }}</td>
                                    <td>{{ $s->under_reference }}</td>
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


@endsection

@section('scripts')


@endsection

