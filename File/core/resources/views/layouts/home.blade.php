<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="" />

    <!-- Stylesheets
    ============================================= -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('style.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/swiper.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/color.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/dark.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/font-icons.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}" type="text/css" />

    @yield('style')
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}"/>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Document Title
    ============================================= -->
    <title>{{ $site_title }} | @yield('title')</title>

</head>

<body class="stretched">

<!-- Document Wrapper
============================================= -->
<div id="wrapper" class="clearfix">

    <!-- Header
    ============================================= -->
    <header id="header" class="full-header">

        <div id="header-wrap">

            <div class="container clearfix">

                <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                <!-- Logo
                ============================================= -->
                <div id="logo">
                    <a href="{{ route('home') }}" class="standard-logo" data-dark-logo="{{ asset('images/logo.png') }}"><img src="{{ asset('images/logo.png') }}" alt="Canvas Logo"></a>
                    <a href="{{ route('home') }}" class="retina-logo" data-dark-logo="{{ asset('images/logo.png') }}"><img src="{{ asset('images/logo.png') }}" alt="Canvas Logo"></a>
                </div><!-- #logo end -->

                <!-- Primary Navigation
                ============================================= -->
                <nav id="primary-menu">

                    <ul>
                        <li class="{{ Request::is('/') ? "current" : "" }}"><a href="{{ route('home') }}"><div>Home</div></a></li>
                        <li class="{{ Request::is('sell-currency') ? "current" : "" }}"><a href="{{ route('sell-currency') }}"><div>Sell Currency</div></a></li>
                        <li class="{{ Request::is('buy-currency') ? "current" : "" }}"><a href="{{ route('buy-currency') }}"><div>Buy Currency</div></a></li>
                        <li class="{{ Request::is('exchange-currency') ? "current" : "" }}"><a href="{{ route('exchange-currency') }}"><div>Exchange Currency</div></a></li>
                        @foreach($menu as $m)
                            <li class="hidden-sm">
                                <a href="{{url('menu/')}}/{{$m->id}}/{{urlencode(strtolower($m->name))}}">
                                    <div>{{ $m->name }}</div>
                                </a>
                            </li>
                        @endforeach
                        <li><a href="{{ route('contact-us') }}"><div>Contact Us</div></a></li>
                        @if(Auth::guard('member')->check())

                            <li><a href="#"><div><i style="margin-top: 5px;" class="fa fa-user"></i>Hi. {{ Auth::guard('member')->user()->name }}<b><i style="margin-top: 5px;" class="fa fa-angle-down"></i></b></div></a>
                                <ul>
                                    <li><a href="{{ route('member-dashboard') }}"><div><i class="fa fa-dashboard"></i> Dashboard</div></a></li>
                                    <li><a href="{{ route('reference-bonus') }}"><div><i class="fa fa-money"></i> Reference Bonus</div></a></li>
                                    <li><a href="{{ route('withdraw-request') }}"><div><i class="fa fa-credit-card"></i> Withdraw Bonus</div></a></li>
                                    <li><a href="{{ route('member-edit') }}"><div><i class="fa fa-edit"></i> Edit Profile</div></a></li>
                                    <li><a href="{{ route('member-password-change') }}"><div><i class="fa fa-cogs"></i> Change Password</div></a></li>
                                    <li><a href="{{ route('member-logout') }}"><div><i class="fa fa-sign-out"></i> Log Out</div></a></li>
                                </ul>
                            </li>
                        @else
                        <li><a href="{{ route('member-login') }}"><div><i style="margin-top: 5px;" class="fa fa-user"></i> Log In | Register</div></a></li>
                        @endif
                    </ul>
                </nav><!-- #primary-menu end -->

            </div>

        </div>

    </header><!-- #header end -->
    <div class="row" style="margin-top: 20px;margin-right: 0px!important;">
    	<div class="col-md-6 col-md-offset-3">
    		<div style="margin-top: 20px;" class="text-center">
                    <!--  ==================================SESSION MESSAGES==================================  -->
                    @if (session()->has('message'))
                        <div class="alert alert-{!! session()->get('type')  !!} alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {!! session()->get('message')  !!}
                        </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{ session('status') }}
                        </div>
                    @endif
                    @if($errors->any())
                        @foreach ($errors->all() as $error)

                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                {!!  $error !!}
                            </div>
                    @endforeach
                @endif
                <!--  ==================================SESSION MESSAGES==================================  -->
	</div>
    	</div>
    </div>
    
    

    @yield('content')

    <!-- Footer
    ============================================= -->
    <footer id="footer" class="dark">


        <!-- Copyrights
        ============================================= -->
        <div id="copyrights">

            <div class="container clearfix">

                <div class="col_half">
                    {!! $general->footer_bottom_text !!}<br>
                </div>

                <div class="col_half col_last tright">
                    <div class="fright clearfix">
                        <a href="{!! $general->facebook !!}" class="social-icon si-small si-borderless si-facebook">
                            <i class="icon-facebook"></i>
                            <i class="icon-facebook"></i>
                        </a>

                        <a href="{!! $general->twitter !!}" class="social-icon si-small si-borderless si-twitter">
                            <i class="icon-twitter"></i>
                            <i class="icon-twitter"></i>
                        </a>

                        <a href="{!! $general->google_plus !!}" class="social-icon si-small si-borderless si-gplus">
                            <i class="icon-gplus"></i>
                            <i class="icon-gplus"></i>
                        </a>


                        <a href="{!! $general->linkedin !!}" class="social-icon si-small si-borderless si-linkedin">
                            <i class="icon-linkedin"></i>
                            <i class="icon-linkedin"></i>
                        </a>
                    </div>

                    <div class="clear"></div>

                   
                </div>

            </div>

        </div><!-- #copyrights end -->

    </footer><!-- #footer end -->

</div><!-- #wrapper end -->

<!-- Go To Top
============================================= -->
<div id="gotoTop" class="icon-angle-up"></div>

<!-- External JavaScripts
============================================= -->
<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/plugins.js') }}"></script>

<!-- Footer Scripts
============================================= -->
<script type="text/javascript" src="{{ asset('js/functions.js') }}"></script>

@yield('scripts')

</body>
</html>