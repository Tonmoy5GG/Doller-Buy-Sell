<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;

class AdminAuthController extends Controller
{
    public function getLogin()
    {
        return view('auth.login');
    }
    public function postLogin(Request $request)
    {

        if (Auth::guard('admin')->attempt([
            'username' => $request->username,
            'password' => $request->password,
        ])
        ) {

            // Authentication passed...
            return redirect('/dashboard');
        }

        $request->session()->flash('message', 'Login incorrect!');
        return redirect()->back();
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        session()->flash('message', 'Just Logged Out!');
        return redirect('/admin');
    }

    public function managerLogin()
    {
        return view('auth.manager-login');
    }
    public function postManagerLogin(Request $request)
    {
        if (Auth::guard('manager')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])
        ) {
            // Authentication passed...
            return redirect('/manager-dashboard');
        }

        $request->session()->flash('message', 'Login incorrect!');
        return redirect()->back();
    }
    public function managerLogout()
    {
        Auth::guard('manager')->logout();
        session()->flash('message', 'Just Logged Out!');
        return redirect('/manager');
    }
    public function staffLogin()
    {
        return view('auth.staff-login');
    }
    public function postStaffLogin(Request $request)
    {
        if (Auth::guard('staff')->attempt([
            'email' => $request->email,
            'password' => $request->password,
            'status' => 1,
        ])
        ) {

            // Authentication passed...
            return redirect('/staff-dashboard');
        }

        $request->session()->flash('message', 'Login incorrect!');
        return redirect()->back();
    }
    public function staffLogout()
    {
        Auth::guard('staff')->logout();
        session()->flash('message', 'Just Logged Out!');
        return redirect('/staff');
    }



}
