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

                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-8 col-md-offset-2 col-sm-12 col-xm-12">
                            <div class="panel panel-default nobottommargin">
                                <div class="panel-body" style="padding: 40px;">
                                    <h3>Request a Withdraw Balance</h3>

                                    <form id="register-form" name="register-form" class="nobottommargin" action="{{ route('withdraw-post') }}" method="post" enctype="multipart/form-data">
                                        {!! csrf_field() !!}

                                        <div class="col_full">
                                            <label for="register-form-name">Request Balance:</label>
                                            <input type="number" id="register-form-name" name="amount" required value="{{ $general->withdraw }}" class="form-control" />
                                        </div>

                                        <div class="col_full">
                                            <label for="register-form-email">Withdrawal Method:</label>
                                            <select name="currency_id" required class="form-control">
                                                <option value="">Select One</option>
                                                @foreach($couurency as $m)
                                                    <option value="{{ $m->id }}">{{ $m->name }}</option>
                                                @endforeach
                                            </select>
                                        
                                        </div>
                                        <div class="col_full">
                                            <label for="register-form-phone">Method Details :</label>
                                            <textarea required name="details" id="" cols="30" rows="3"
                                                      class="form-control"></textarea>
                                        </div>
                                        <div class="col_full">
                                            <label for="register-form-phone">Message :</label>
                                            <textarea name="message" id="" cols="30" rows="5"
                                                      class="form-control"></textarea>
                                        </div>

                                        <div class="col_full nobottommargin">
                                            <button class="button button-3d button-black nomargin" id="register-form-submit" name="register-form-submit" value="register"><i class="fa fa-send"></i> Send Request</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <hr>
                <div class="text-center">
                    <h3>Member Bonus Withdraw Activity</h3>
                </div>

                <div class="table-responsive">

                    <table class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Method</th>
                            <th>Details</th>
                            <th>Message</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($bonus)
                            @foreach($bonus as $s)
                                <tr>
                                    <td>{{ date('d-F-Y',strtotime($s->created_at)) }}</td>
                                    <td>{{ $s->amount }} - {{ $general->currency }}</td>
                                    <td>{{ $s->currency->name }}</td>
                                    <td>{{ $s->details }}</td>
                                    <td>{{ $s->message }}</td>
                                    <td>

                                        @if($s->status == 0)
                                            <span class="label label-danger">Pending</span>
                                        @elseif($s->status == 1)
                                            <span class="label label-primary">Success</span>
                                        @else
                                            <span class="label label-warning">Refund</span>
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
                        {!! $bonus->links() !!}
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
