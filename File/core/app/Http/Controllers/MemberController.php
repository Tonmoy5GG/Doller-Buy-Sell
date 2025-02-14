<?php

namespace App\Http\Controllers;

use App\Bank;
use App\Bonus;
use App\BuyConfirm;
use App\BuyCurrency;
use App\ExchangeConfirm;
use App\ExchangeCurrency;
use App\GeneralSetting;
use App\Member;
use App\Currency;
use App\Menu;
use App\SellConfirm;
use App\SellCurrency;
use App\Withdraw;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class MemberController extends Controller
{
    public function __construct()
    {
        $data = [];
        $this->middleware('auth:member');
        $general_all = GeneralSetting::first();
        $this->site_title = $general_all->title;
        $this->gen_phone = $general_all->number;
        $this->gen_email = $general_all->email;
        $this->base_currency = $general_all->currency;
        $this->withdraw = $general_all->withdraw;
        $this->footer_text = $general_all->footer_text;
        $this->footer_bottom_text = $general_all->footer_bottom_text;

    }
    public function memberDashboard()
    {
        $data['site_title'] = $this->site_title;
        $data['footer_text'] = $this->footer_text;
        $data['footer_bottom_text'] = $this->footer_bottom_text;
        $data['menu'] = Menu::all();
        $data['general'] = GeneralSetting::first();
        $data['member'] = Member::findOrFail(Auth::guard('member')->user()->id);
        $mem = Member::findOrFail(Auth::guard('member')->user()->id);
        $data['total_reference'] = Member::whereUnder_reference($mem->reference)->get()->count();
        $data['sell'] = SellConfirm::whereMember_id($mem->id)->orderBy('id','DESC')->paginate(5);
        $data['buy'] = BuyConfirm::whereMember_id($mem->id)->orderBy('id','DESC')->paginate(5);
        $data['exchange'] = ExchangeConfirm::whereMember_id($mem->id)->orderBy('id','DESC')->paginate(5);
        return view('member.member-dashboard',$data);
    }
    public function memberBonus()
    {
        $data['site_title'] = $this->site_title;
        $data['footer_text'] = $this->footer_text;
        $data['footer_bottom_text'] = $this->footer_bottom_text;
        $data['menu'] = Menu::all();
        $data['general'] = GeneralSetting::first();
        $data['member'] = Member::findOrFail(Auth::guard('member')->user()->id);
        $mem = Member::findOrFail(Auth::guard('member')->user()->id);
        $data['total_reference'] = Member::whereReference($data['member']->reference)->count();
        $data['bonus'] = Bonus::whereUnder_reference($mem->reference)->orderBy('id','DESC')->paginate(10);
        return view('member.member-bonus',$data);
    }
    public function requestWithdraw()
    {
        $data['site_title'] = $this->site_title;
        $data['footer_text'] = $this->footer_text;
        $data['footer_bottom_text'] = $this->footer_bottom_text;
        $data['menu'] = Menu::all();
        $data['general'] = GeneralSetting::first();
        $data['member'] = Member::findOrFail(Auth::guard('member')->user()->id);
        $mem = Member::findOrFail(Auth::guard('member')->user()->id);
        $data['total_reference'] = Member::whereReference($data['member']->reference)->count();
        $data['bonus'] = Withdraw::whereMember_id($mem->id)->orderBy('id','DESC')->paginate(5);
        $data['couurency'] = Currency::all();
        return view('member.member-withdraw',$data);
    }
    public function postWithdraw(Request $request)
    {
        $this->validate($request,[
           'amount' => 'required|numeric',
            'currency_id' => 'required',
            'details' => 'required',
        ]);
        $member = Member::findOrfail(Auth::guard('member')->user()->id);
        if ($member->amount < $request->amount)
        {
            session()->flash('message', 'Sorry.. Your Request Balance is Larger Then Current Balance.');
            Session::flash('type', 'warning');
            return redirect()->back();
        }
        if ($request->amount < $this->withdraw){
            session()->flash('message', "Sorry.. Your Request Balance is Smaller Then Withdraw Request Balance. Minimum $this->withdraw - $this->base_currency.");
            Session::flash('type', 'warning');
            return redirect()->back();
        }
        $wr['member_id'] = $member->id;
        $wr['amount'] = $request->amount;
        $wr['currency_id'] = $request->currency_id;
        $wr['details'] = $request->details;
        $wr['message'] = $request->message;
        Withdraw::create($wr);
        $member->amount = $member->amount - $request->amount;
        $member->save();
        session()->flash('message', "Successfully Withdraw Request Completed.");
        Session::flash('type', 'warning');
        return redirect()->back();

    }

    public function changePassword()
    {
        $data['site_title'] = $this->site_title;
        $data['footer_text'] = $this->footer_text;
        $data['footer_bottom_text'] = $this->footer_bottom_text;
        $data['menu'] = Menu::all();
        $data['general'] = GeneralSetting::first();
        return view('member.member-change-password',$data);
    }
    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'current' =>'required',
            'password' => 'required|min:6|confirmed'
        ]);

        try {
            $c_password = Auth::guard('member')->user()->password;
            $c_id = Auth::guard('member')->user()->id;

            $user = Member::findOrFail($c_id);

            if(Hash::check($request->current, $c_password)){

                $password = Hash::make($request->password);
                $user->password = $password;
                $user->save();
                session()->flash('message', 'Password Changes Successfully.');
                Session::flash('type', 'success');
                return redirect()->back();
            }else{
                session()->flash('message', 'Password Not Match');
                Session::flash('type', 'warning');
                return redirect()->back();
            }

        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }
    public function editMember()
    {
        $data['site_title'] = $this->site_title;
        $data['footer_text'] = $this->footer_text;
        $data['footer_bottom_text'] = $this->footer_bottom_text;
        $data['menu'] = Menu::all();
        $data['general'] = GeneralSetting::first();
        $data['member'] = Member::findOrFail(Auth::guard('member')->user()->id);
        return view('member.member-edit',$data);
    }
    public function updateMember(Request $request)
    {
        $mem = Member::findOrFail(Auth::guard('member')->user()->id);
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|unique:members,email,'.$mem->id,
            'phone' => 'required|unique:members,phone,'.$mem->id,
            'image' => 'mimes:jpg,png,jpeg',
            'nid' => 'mimes:jpg,png,jpeg'
        ]);
        $mem1 = Input::except('_method','_token','reference');
        if($request->hasFile('image')){
            $image3 = $request->file('image');
            $filename3 = time().'.'.$image3->getClientOriginalExtension();
            $location = 'images/' . $filename3;
            Image::make($image3)->resize(220,220)->save($location);
            $mem1['image'] = $filename3;
        }
        if($request->hasFile('nid')){
            $image3 = $request->file('nid');
            $filename3 = time().'.'.$image3->getClientOriginalExtension();
            $location = 'images/' . $filename3;
            Image::make($image3)->save($location);
            $mem1['nid'] = $filename3;
        }
        $mem->fill($mem1)->save();
        session()->flash('message', 'Member Update Successfully.');
        Session::flash('title', 'Success');
        Session::flash('type', 'success');
        return redirect()->back();
    }
    public function userBuyCurrency(Request $request)
    {
        $this->validate($request,[
            'currency_id' => 'required',
            'quantity' => 'required',
        ]);
        $data['site_title'] = $this->site_title;
        $data['footer_bottom_text'] = $this->footer_bottom_text;
        $data['quantity'] = $request->quantity;
        $data['general'] = GeneralSetting::first();
        $data['menu'] = Menu::all();
        $data['bank'] = Bank::all();
        $data['base_currency'] = $this->base_currency;
        $buy['currency_id'] = $request->currency_id;
        $buy['quantity'] = $request->quantity;
        $data['buy_currency'] = BuyCurrency::create($buy);
        return view('home.buy-confirm',$data);
    }
    public function confirmOrder(Request $request)
    {
        $buy = BuyCurrency::findOrFail($request->buy_id);
        $currency_name = $buy->currency->name;
        $currency_quantity = $buy->currency->quantity;
        $gen = GeneralSetting::first();
        $to = $gen->email;
        $subject = "Order Message";
        $name = $request->name;
        $email = $request->email;
        $msg = "Hi. I'm $name.I want to Buy $currency_quantity - $currency_name .";

        $headers = "From: $name <$email> \r\n";
        $headers .= "Reply-To: $name <$email> \r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $message = "
                    <html>
                    <head>
                    <title>Currency Buy Message</title>
                    </head>
                    <body>
                    <p>$msg</p>
                    </body>
                    </html>
                    ";

        if (mail($to, $subject, $message, $headers)) {
            session()->flash('message', "Currency Sell Successfully Completed. Admin Contact So Soon.");
            Session::flash('type', 'success');
            return redirect()->route('buy-currency');
        } else {
            session()->flash('message', "Something is Error.");
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }
    public function userSellCurrency(Request $request)
    {
        $this->validate($request,[
            'currency_id' => 'required',
            'quantity' => 'required',
        ]);
        $data['site_title'] = $this->site_title;
        $data['footer_bottom_text'] = $this->footer_bottom_text;
        $data['quantity'] = $request->quantity;
        $data['general'] = GeneralSetting::first();
        $data['menu'] = Menu::all();
        $data['bank'] = Bank::first();
        $data['base_currency'] = $this->base_currency;
        $sell['currency_id'] = $request->currency_id;
        $sell['quantity'] = $request->quantity;
        $data['sell_currency'] = SellCurrency::create($sell);
        return view('home.sell-confirm',$data);
    }
    public function sellConfirmOrder(Request $request)
    {

        try {
            $this->validate($request,[
                'image' => 'required|mimes:jpg,jpeg,png'
            ]);
            $sc = Input::except('_method','_token');

            if($request->hasFile('image')){
                $image = $request->file('image');
                $filename = time().'.'.$image->getClientOriginalExtension();
                $location = 'images/' . $filename;
                Image::make($image)->save($location);
                $sc['image'] = $filename;
            }
            SellConfirm::create($sc);
            $sell = SellCurrency::findOrFail($request->sell_id);
            $currency_name = $sell->currency->name;
            $currency_quantity = $sell->currency->quantity;
            $gen = GeneralSetting::first();
            $to = $gen->email;
            $subject = "Order Message";
            $name = $request->name;
            $email = $request->email;
            $msg = "Hi. I'm $name.I want to Buy $currency_quantity - $currency_name .";

            $headers = "From: $name <$email> \r\n";
            $headers .= "Reply-To: $name <$email> \r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            $message = "
                    <html>
                    <head>
                    <title>Currency Buy Message</title>
                    </head>
                    <body>
                    <p>$msg</p>
                    </body>
                    </html>
                    ";

            if (mail($to, $subject, $message, $headers)) {
                session()->flash('message', "Order Successfully Completed.Admin Contact So Soon.");
                Session::flash('type', 'success');
                return redirect()->route('sell-currency');
            } else {
                session()->flash('message', "Something is Error.");
                Session::flash('type', 'danger');
                return redirect()->back();
            }
        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }

    }
    public function buyOrderConfirm(Request $request)
    {

        try {
            $this->validate($request,[
                'image' => 'required|mimes:jpg,jpeg,png'
            ]);
            $sc = Input::except('_method','_token');

            if($request->hasFile('image')){
                $image = $request->file('image');
                $filename = time().'.'.$image->getClientOriginalExtension();
                $location = 'images/' . $filename;
                Image::make($image)->save($location);
                $sc['image'] = $filename;
            }
            BuyConfirm::create($sc);
            $buy = BuyCurrency::findOrFail($request->buy_id);
            $currency_name = $buy->currency->name;
            $currency_quantity = $buy->currency->quantity;
            $gen = GeneralSetting::first();
            $to = $gen->email;
            $subject = "Order Message";
            $name = $request->name;
            $email = $request->name;
            $msg = "Hi. I'm $name.I want to Buy $currency_quantity - $currency_name .";

            $headers = "From: $name <$email> \r\n";
            $headers .= "Reply-To: $name <$email> \r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            $message = "
                    <html>
                    <head>
                    <title>Currency Buy Message</title>
                    </head>
                    <body>
                    <p>$msg</p>
                    </body>
                    </html>
                    ";

            if (mail($to, $subject, $message, $headers)) {
                session()->flash('message', "Order Successfully Completed.Admin Contact So Soon.");
                Session::flash('type', 'success');
                return redirect()->route('buy-currency');
            } else {
                session()->flash('message', "Something is Error.");
                Session::flash('type', 'danger');
                return redirect()->route('buy-currency');
            }
        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }
    public function userExchangeCurrency(Request $request)
    {
        $this->validate($request,[
            'currency_id' => 'required',
            'quantity' => 'required',
            'exchange_currency_id' => 'required',
        ]);
        if ($request->currency_id == $request->exchange_currency_id) {
            session()->flash('message', "Currency and Exchange Currency can't Same");
            Session::flash('type', 'danger');
            return redirect()->back();
        }else{
            $data['site_title'] = $this->site_title;
            $data['footer_bottom_text'] = $this->footer_bottom_text;
            $data['quantity'] = $request->quantity;
            $data['general'] = GeneralSetting::first();
            $data['menu'] = Menu::all();
            $data['bank'] = Bank::first();
            $data['base_currency'] = $this->base_currency;
            $sell['currency_id'] = $request->currency_id;
            $sell['quantity'] = $request->quantity;
            $sell['exchange_currency_id'] = $request->exchange_currency_id;
            $data['exchange_currency'] = ExchangeCurrency::create($sell);
            return view('home.exchange-confirm',$data);
        }
    }
    public function exchangeConfirm(Request $request)
    {
        try {
            $this->validate($request,[
                'image' => 'required|mimes:jpg,jpeg,png'
            ]);
            $sc = Input::except('_method','_token');

            if($request->hasFile('image')){
                $image = $request->file('image');
                $filename = time().'.'.$image->getClientOriginalExtension();
                $location = 'images/' . $filename;
                Image::make($image)->save($location);
                $sc['image'] = $filename;
            }
            ExchangeConfirm::create($sc);
            $exchange = ExchangeCurrency::findOrFail($request->exchange_id);
            $currency_name = $exchange->currency->name;
            $currency_quantity = $exchange->currency->quantity;
            $gen = GeneralSetting::first();
            $to = $gen->email;
            $subject = "Order Message";
            $name = $request->name;
            $email = $request->email;
            $msg = "Hi. I'm $name.I want to Buy $currency_quantity - $currency_name .";

            $headers = "From: $name <$email> \r\n";
            $headers .= "Reply-To: $name <$email> \r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            $message = "
                    <html>
                    <head>
                    <title>Currency Buy Message</title>
                    </head>
                    <body>
                    <p>$msg</p>
                    </body>
                    </html>
                    ";

            if (mail($to, $subject, $message, $headers)) {
                session()->flash('message', "Order Successfully Completed.Admin Contact So Soon.");
                Session::flash('type', 'success');
                return redirect()->route('exchange-currency');
            } else {
                session()->flash('message', "Something is Error.");
                Session::flash('type', 'danger');
                return redirect()->route('exchange-currency');
            }
        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }


}
