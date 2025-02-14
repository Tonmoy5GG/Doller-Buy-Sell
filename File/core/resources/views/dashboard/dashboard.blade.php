@extends('layouts.dashboard')
@section('title', 'Dashboard')

@section('content')

    <div class="row">
        <div class="col-md-4">
            <h4 class="text-center"><b>Sell Currency</b></h4>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>Currency</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($sell as $p)
                    <tr>
                        <td>{{ $p->buy->currency->name }}</td>
                        <td>{{ $p->buy->quantity}}</td>
                        <td>
                            @if($p->status == 0)
                                <span class="control-label label label-success">Pending</span>
                            @else
                                <span class="label label-primary">Success</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('sell-invoice',$p->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> View </a>

                        </td>

                    </tr>
                @endforeach

                </tbody>
            </table>
            <div class="text-center">
                {{ $sell->links() }}
            </div>
        </div>
        <div class="col-md-4">
            <h4 class="text-center"><b>Buy Currency</b></h4>
            <table class="table table-striped table-bordered table-hover">

                <thead>
                <tr>
                    <th>Currency</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($buy as $p)
                    <tr>
                        <td>{{ $p->sell->currency->name }}</td>
                        <td>{{ $p->sell->quantity}}</td>
                        <td>
                            @if($p->status == 0)
                                <span class="control-label label label-success">Pending</span>
                            @else
                                <span class="control-label label label-primary">Success</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('buy-invoice',$p->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> View </a>
                        </td>

                    </tr>
                @endforeach

                </tbody>
            </table>
            <div class="text-center">
                {{ $buy->links() }}
            </div>
        </div>
        <div class="col-md-4">
            <h4 class="text-center"><b>Exchange Currency</b></h4>
            <table class="table table-striped table-bordered table-hover">

                <thead>
                <tr>
                    <th>Currency</th>
                    <th>Exchange</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($exchange as $p)
                    <tr>
                        <td>{{ $p->exchange->currency->name }}</td>
                        <td>{{ $p->exchange->exchangeCurrency->name }}</td>
                        <td>
                            @if($p->status == 0)
                                <span class="control-label label label-success">Pending</span>
                            @else
                                <span class="label label-primary">Success</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('exchange-invoice',$p->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> View </a>

                        </td>

                    </tr>
                @endforeach

                </tbody>
            </table>
            <div class="text-center">
                {{ $exchange->links() }}
            </div>
        </div>
    </div>

@endsection