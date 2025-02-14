<?php

namespace App\Http\Controllers;

use App\Advert;
use App\Category;
use App\GeneralSetting;
use App\Member;
use App\Menu;
use App\SubCategory;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class MemberAuthController extends Controller
{
    public function __construct()
    {
        $data = [];
        //$this->middleware('auth:admin');
        $general_all = GeneralSetting::first();
        $this->site_title = $general_all->title;
        $this->gen_phone = $general_all->number;
        $this->gen_email = $general_all->email;
        $this->site_color = $general_all->color;

    }
    public function getLogIn()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Member Login";
        $data['general'] = GeneralSetting::first();
        $data['menu'] = Menu::all();
        return view('member.member-login',$data);
    }
    public function postLogIn(Request $request)
    {


        if (Auth::guard('member')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])
        ) {
            $mem = Auth::guard('member')->user();
            if ($mem->status == 0)
            {
                Auth::guard('member')->logout();
                session()->flash('message', 'Sorry.. your Account is DeActive.');
                Session::flash('type', 'success');
                return redirect()->route('member-login');
            }
            return redirect()->route('member-dashboard');
        }

        $request->session()->flash('message', 'Login incorrect!');
        Session::flash('type', 'success');
        return redirect()->back();
    }
    public function getRegistration()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Member Registration";
        $data['general'] = GeneralSetting::first();
        $data['menu'] = Menu::all();
        return view('member.member-login',$data);
    }
    public function postRegistration(Request $request)
    {

        $this->validate($request,[
           'name' => 'required',
            'email' => 'required|unique:members,email',
            'phone' => 'required|unique:members,phone',
            'password' => 'required|confirmed|min:6',
            'image' => 'required|mimes:jpg,png,jpeg',
            'nid' => 'required|mimes:jpg,png,jpeg',
            'address' => 'required'
        ]);
        $ref = Member::whereReference($request->reference)->count();
        if ($ref == 0){
            session()->flash('message', 'Reference User ID is Incorrect. ');
            Session::flash('title', 'warning');
            Session::flash('type', 'success');
            return redirect()->back();
        }
        $mem = Input::except('_method','_token');
        $mem['password'] = Hash::make($request->password);
        $mem['reference'] = rand(0,9).uniqid().rand(0,9);
        $mem['under_reference'] = $request->reference;
        $mem['status'] = 1;
        if($request->hasFile('image')){
            $image3 = $request->file('image');
            $filename3 = time().'.'.$image3->getClientOriginalExtension();
            $location = 'images/' . $filename3;
            Image::make($image3)->resize(220,220)->save($location);
            $mem['image'] = $filename3;
        }
        if($request->hasFile('nid')){
            $image3 = $request->file('nid');
            $filename3 = time().'.'.$image3->getClientOriginalExtension();
            $location = 'images/' . $filename3;
            Image::make($image3)->save($location);
            $mem['nid'] = $filename3;
        }
        Member::create($mem);
        session()->flash('message', 'Member Created Successfully.');
        Session::flash('title', 'Success');
        Session::flash('type', 'success');
        return redirect()->back();
    }

    public function logout()
    {
        Auth::guard('member')->logout();
        session()->flash('message', 'Just Logged Out!');
        Session::flash('type', 'success');
        /*return 'LOG OUT';*/
        return redirect()->route('member-login');
    }
}
