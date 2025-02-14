@extends('layouts.home')
@section('title','Member Dashboard')
@section('style')
    <style>
        .profile-image img{
            width: 20%;
            border-radius: 10px;
        }
        .profile-body h4 {
            margin-bottom: 5px;
        }
        .profile-header-container{
            margin: 0 auto;
            text-align: center;
        }

        .profile-header-img > img.img-circle {
            width: 140px;
            height: 140px;
            border: 2px solid #51D2B7;
        }
        .rank-label-container {
            margin-top: -19px;
            /* z-index: 1000; */
            text-align: center;
        }

        .label.label-default.rank-label {
            background-color: rgb(81, 210, 183);
            padding: 5px 10px 5px 10px;
            border-radius: 27px;
            font-size: 13px;
        }
    </style>
@endsection
@section('content')

    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <div class="well well-lg">
                    <div class="profile-header-container">
                        <div class="profile-header-img">
                            <img class="img-circle" src="{{ asset('images') }}/{{ $member->image }}" />
                            <!-- badge -->
                            <div class="rank-label-container">
                                <span class="label label-default rank-label">{{ $member->amount }} - {{ $general->currency }}</span>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="profile-body text-center">
                        <h4> Name : {{ $member->name }}</h4>
                        <h4> Email : {{ $member->email }}</h4>
                        <h4> Phone : {{ $member->phone }}</h4>
                        <h4> Address : {{ $member->address }}</h4>
                        <h4> Reference ID : <span style="color: #fff;" class="label label-danger">{{ $member->reference }}</span></h4>
                        <h4> Reference Account : {{ $total_reference }} - Account</h4>
                        <button style="font-size: 14px;margin-top: 10px;" class="btn has btn-danger btn-sm" data-clipboard-text="{{ route('reference',$member->reference) }}">
                            <i class="fa fa-clipboard" aria-hidden="true"></i>  Copy Reference URL to Clipboard
                        </button>
                    </div>
                </div>
                <hr>
                <div class="text-center">
                    <h3>Sell Currency Activity</h3>
                </div>

                <div class="table-responsive">

                    <table class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Currency Name</th>
                            <th>Quantity</th>
                            <th>Rate</th>
                            <th>Total Price</th>
                            <th>Transaction ID</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($sell)
                            @foreach($sell as $s)
                            <tr>
                                <td>{{ date('d-F-Y',strtotime($s->created_at)) }}</td>
                                <td>{{ $s->sell->currency->name }}</td>
                                <td>{{ $s->sell->quantity }} - {{ $s->sell->currency->name }}</td>
                                <td>{{ $s->sell->currency->buy_rate }} - {{ $general->currency }} </td>
                                <td>{{ $s->sell->currency->buy_rate * $s->sell->quantity }} - {{ $general->currency }}</td>
                                <td>{{ $s->transaction_id }}</td>
                                <td>
                                    @if($s->status == 0)
                                        <span class="label label-danger">Pending</span>
                                    @else
                                        <span class="label label-primary">Competed</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="text-center" colspan="7">No Sell Activity Found</td>
                            </tr>
                        @endif

                        </tbody>
                    </table>
                    <div class="text-center">
                        {!! $sell->links() !!}
                    </div>

                </div>
                <hr>
                <div class="text-center">
                    <h3>Buy Currency Activity</h3>
                </div>

                <div class="table-responsive">

                    <table class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Currency Name</th>
                            <th>Quantity</th>
                            <th>Rate</th>
                            <th>Total Price</th>
                            <th>Transaction ID</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($buy)
                            @foreach($buy as $s)
                                <tr>
                                    <td>{{ date('d-F-Y',strtotime($s->created_at)) }}</td>
                                    <td>{{ $s->buy->currency->name }}</td>
                                    <td>{{ $s->buy->quantity }} - {{ $s->buy->currency->name }}</td>
                                    <td>{{ $s->buy->currency->sell_rate }} - {{ $general->currency }} </td>
                                    <td>{{ $s->buy->currency->sell_rate * $s->buy->quantity }} - {{ $general->currency }}</td>
                                    <td>{{ $s->transaction_details }}</td>
                                    <td>
                                        @if($s->status == 0)
                                            <span class="label label-danger">Pending</span>
                                        @else
                                            <span class="label label-primary">Competed</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="text-center" colspan="7">No Buy Activity Found</td>
                            </tr>
                        @endif

                        </tbody>
                    </table>
                    <div class="text-center">
                        {!! $buy->links() !!}
                    </div>

                </div>
                <hr>
                <div class="text-center">
                    <h3>Exchange Currency Activity</h3>
                </div>

                <div class="table-responsive">

                    <table class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Currency Name</th>
                            <th>Quantity</th>
                            <th>Exchange Currency</th>
                            <th>Exchange Quantity</th>
                            <th>Transaction ID</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($exchange)
                            @foreach($exchange as $s)
                                <tr>
                                    <td>{{ date('d-F-Y',strtotime($s->created_at)) }}</td>
                                    <td>{{ $s->exchange->currency->name }}</td>
                                    <td>{{ $s->exchange->quantity }} - {{ $s->exchange->currency->name }}</td>
                                    <td>{{ $s->exchange->exchangeCurrency->name }}</td>
                                    <td>{{ $s->exchange_price}} - {{ $s->exchange->exchangeCurrency->name }}</td>
                                    <td>{{ $s->transaction_id }}</td>
                                    <td>
                                        @if($s->status == 0)
                                            <span class="label label-danger">Pending</span>
                                        @else
                                            <span class="label label-primary">Competed</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="text-center" colspan="7">No Exchange Activity Found</td>
                            </tr>
                        @endif

                        </tbody>
                    </table>
                    <div class="text-center">
                        {!! $exchange->links() !!}
                    </div>

                </div>

            </div>

        </div>

    </section>


@endsection
@section('scripts')

    <script src="{{ asset('js/clipboard.min.js') }}"></script>
    <script>
        new Clipboard('.has');
    </script>


@endsection
