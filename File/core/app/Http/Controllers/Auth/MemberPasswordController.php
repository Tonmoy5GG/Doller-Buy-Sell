<?php

namespace App\Http\Controllers\Auth;

use App\GeneralSetting;
use App\Http\Controllers\Controller;
use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Config;


class MemberPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;
    protected $redirectTo = '/member-login';

    //protected $linkRequestView = 'member.member-email';
    //protected $resetView = 'member.member-reset';
    protected $guard = 'member';
    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        Config::set("auth.defaults.passwords","member");
    }

    public function showLinkRequestForm()
    {
        $data['page_title'] = "Password Reset";
        $data['general'] = GeneralSetting::first();
        $data['site_title'] = $data['general']->title;
        $data['menu'] = Menu::all();
        return view('member.member-email',$data);
    }



}
