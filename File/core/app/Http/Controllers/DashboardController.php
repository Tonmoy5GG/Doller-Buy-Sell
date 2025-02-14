<?php

namespace App\Http\Controllers;

use App\Bank;
use App\Bonus;
use App\BuyConfirm;
use App\Currency;
use App\ExchangeConfirm;
use App\GeneralSetting;
use App\Member;
use App\Advert;
use App\SellConfirm;
use App\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;


class DashboardController extends Controller
{
    public function __construct()
    {
        $data = [];
        $this->middleware('auth:admin');
        $general_all = GeneralSetting::first();
        $this->site_title = $general_all->title;
        $this->gen_phone = $general_all->number;
        $this->gen_email = $general_all->email;
        $this->base_currency = $general_all->currency;
        $this->percentage = $general_all->percentage;

    }

    public function getDashboard()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Dashboard";
        $data['base_currency'] = $this->base_currency;
        $data['sell'] = BuyConfirm::orderBy('id', 'DESC')->paginate(10);
        $data['buy'] = SellConfirm::orderBy('id', 'DESC')->paginate(10);
        $data['exchange'] = ExchangeConfirm::orderBy('id', 'DESC')->paginate(10);
        return view('dashboard.dashboard', $data);
    }

    public function createCurrency()
    {
        $general = GeneralSetting::first();
        $data['site_title'] = $general->title;
        $data['page_title'] = "Create Currency";
        return view('dashboard.currency-create', $data);
    }

    public function storeCurrency(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:currencies,name',
            'sell_rate' => 'required|numeric',
            'buy_rate' => 'required|numeric',
            'image' => 'required|mimes:png,jpg,jpeg'
        ]);
        try {
            $curr = Input::except('_method', '_token');
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $location = 'images/' . $filename;
                Image::make($image)->resize(200, 80)->save($location);
                $curr['image'] = $filename;
            }
            Currency::create($curr);
            session()->flash('message', 'Currency Created Successfully.');
            Session::flash('title', 'success');
            Session::flash('type', 'success');
            return redirect()->back();
        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }

    public function showCurrency()
    {
        $general = GeneralSetting::first();
        $data['site_title'] = $general->title;
        $data['base_currency'] = $general->currency;
        $data['page_title'] = "All Currency";
        $data['currency'] = Currency::orderBy('id', 'ASC')->paginate(100);
        return view('dashboard.currency-show', $data);
    }
    public function addMember()
    {
        $general = GeneralSetting::first();
        $data['site_title'] = $general->title;
        $data['base_currency'] = $general->currency;
        $data['page_title'] = "Create New Member";
        return view('dashboard.member-create', $data);
    }
    public function editMember($id)
    {
        $general = GeneralSetting::first();
        $data['site_title'] = $general->title;
        $data['base_currency'] = $general->currency;
        $data['page_title'] = "Edit Member";
        $data['member'] = Member::findOrFail($id);
        return view('dashboard.member-edit', $data);
    }
    public function updateMember(Request $request,$id)
    {
        $mem = Member::findOrFail($id);
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|unique:members,email,'.$mem->id,
            'phone' => 'required|unique:members,phone,'.$mem->id,
            'image' => 'mimes:jpg,png,jpeg',
            'nid' => 'mimes:jpg,png,jpeg',
            'password' => 'min:6|confirmed'
        ]);
        $mem1 = Input::except('_method','_token','reference');
        if($request->hasFile('image')){
            $image3 = $request->file('image');
            $filename3 = time().'.'.$image3->getClientOriginalExtension();
            $location = 'images/' . $filename3;
            Image::make($image3)->resize(180,180)->save($location);
            $mem1['image'] = $filename3;
        }
        if($request->hasFile('nid')){
            $image3 = $request->file('nid');
            $filename3 = time().'.'.$image3->getClientOriginalExtension();
            $location = 'images/' . $filename3;
            Image::make($image3)->save($location);
            $mem1['nid'] = $filename3;
        }
        if ($request->npassword){
            $mem1['password'] = Hash::make($request->password);
        }
        $mem->fill($mem1)->save();
        session()->flash('message', 'Member Update Successfully.');
        Session::flash('title', 'Success');
        Session::flash('type', 'success');
        return redirect()->back();
    }

    public function editCurrency($id)
    {
        $general = GeneralSetting::first();
        $data['site_title'] = $general->title;
        $data['page_title'] = "Edit Currency";
        $data['currency'] = Currency::findOrFail($id);
        return view('dashboard.currency-edit', $data);
    }

    public function updateCurrency(Request $request, $id)
    {
        $curr = Currency::findOrFail($id);
        $this->validate($request, [
            'name' => 'required|unique:currencies,name,' . $curr->id,
            'sell_rate' => 'required',
            'buy_rate' => 'required',
            'image' => 'mimes:png,jpg,jpeg'
        ]);
        try {
            $currency = Input::except('_method', '_token');
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $location = 'images/' . $filename;
                Image::make($image)->resize(200, 80)->save($location);
                $currency['image'] = $filename;
            }
            $curr->fill($currency)->save();
            session()->flash('message', 'Currency Updated Successfully.');
            Session::flash('type', 'success');
            return redirect()->back();
        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }

    public function deleteCurrency(Request $request)
    {
        try {
            if ($request->input('id') === '') {
                session()->flash('message', 'Oops, bad request!');
                Session::flash('type', 'danger');
                return redirect()->back();
            } else {
                $currency = Currency::findOrFail($request->input('id'));
                $currency->delete();
                session()->flash('message', 'Currency Deleted Successfully.');
                Session::flash('type', 'success');
                return redirect()->back();
            }

        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }

    public function getBank()
    {
        $data['bank'] = Bank::first();
        $general = GeneralSetting::first();
        $data['site_title'] = $general->title;
        $data['page_title'] = "Manage Bank Info";
        return view('dashboard.bank-info', $data);
    }


    public function adminBuyCurrency()
    {
        $general = GeneralSetting::first();
        $data['site_title'] = $general->title;
        $data['base_currency'] = $general->currency;
        $data['page_title'] = "Manage Buy Currency";
        $data['buy'] = SellConfirm::orderBy('id', 'DESC')->paginate(1000);
        return view('dashboard.buy-currency', $data);
    }

    public function updateAdminBuyCurrency(Request $request)
    {
        try {
            if ($request->input('id') === '') {
                session()->flash('message', 'Oops, bad request!');
                Session::flash('type', 'danger');
                return redirect()->back();
            } else {
                $con = SellConfirm::findOrFail($request->input('id'));
                $member = Member::whereReference($con->member->under_reference)->first();
                $bo = [];
                $bo['bonus_type'] = 1;
                $bo['member_id'] = $member->id;
                $bo['member_reference'] = $con->member->under_reference;
                $bo['under_reference'] = $con->member->reference;
                $bo['percentage'] = $this->percentage;
                $bo['sell_id'] = $request->input('id');
                $bo['amount'] = (($con->sell->currency->buy_rate * $con->sell->quantity) * $this->percentage) / 100;
                $member->amount = $member->amount + $bo['amount'];
                Bonus::create($bo);
                $member->save();
                $con->status = 1;
                $con->save();
                session()->flash('message', 'Payment Successfully Completed.');
                Session::flash('type', 'success');
                return redirect()->back();
            }

        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }


    public function adminSellCurrency()
    {
        $general = GeneralSetting::first();
        $data['site_title'] = $general->title;
        $data['base_currency'] = $general->currency;
        $data['page_title'] = "Manage Sell Currency";
        $data['sell'] = BuyConfirm::orderBy('id', 'DESC')->paginate(1000);
        return view('dashboard.sell-currency', $data);
    }

    public function adminBuyCurrencyUpdate(Request $request)
    {
        try {
            if ($request->input('id') === '') {
                session()->flash('message', 'Oops, bad request!');
                Session::flash('type', 'danger');
                return redirect()->back();
            } else {
                $con = BuyConfirm::findOrFail($request->input('id'));
                $member = Member::whereReference($con->member->under_reference)->first();
                $bo = [];
                $bo['bonus_type'] = 2;
                $bo['member_id'] = $member->id;
                $bo['member_reference'] = $con->member->under_reference;
                $bo['under_reference'] = $con->member->reference;
                $bo['percentage'] = $this->percentage;
                $bo['buy_id'] = $request->input('id');
                $bo['amount'] = ($con->buy->currency->sell_rate * $con->buy->quantity * $this->percentage) / 100;
                $member->amount = $member->amount + $bo['amount'];
                Bonus::create($bo);
                $member->save();
                $con->status = 1;
                $con->save();
                session()->flash('message', 'Payment Successfully Completed.');
                Session::flash('type', 'success');
                return redirect()->back();
            }

        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }

    public function sellInvoice($id)
    {
        $general = GeneralSetting::first();
        $data['site_title'] = $general->title;
        $data['base_currency'] = $general->currency;
        $data['page_title'] = "Sell Currency Details";
        $data['sell'] = BuyConfirm::findOrFail($id);
        return view('dashboard.sell-details', $data);
    }

    public function buyMessage(Request $request)
    {
        $gen = GeneralSetting::first();
        $to = $gen->email;
        $subject = $request->subject;
        $name = $request->name;
        $email = $request->name;
        $msg = $request->message;

        $headers = "From: $name <$email> \r\n";
        $headers .= "Reply-To: $name <$email> \r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $message = "
                    <html>
                    <head>
                    <title>Admin Message</title>
                    </head>
                    <body>
                    <p>$msg</p>
                    </body>
                    </html>
                    ";

        if (mail($to, $subject, $message, $headers)) {
            session()->flash('message', "Message Successfully Send.");
            Session::flash('type', 'success');
            return redirect()->back();
        } else {
            session()->flash('message', "Something is Error.");
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }

    public function buyInvoice($id)
    {
        $general = GeneralSetting::first();
        $data['site_title'] = $general->title;
        $data['base_currency'] = $general->currency;
        $data['page_title'] = "Buy Currency Details";
        $data['buy'] = SellConfirm::findOrFail($id);
        return view('dashboard.buy-details', $data);
    }

    public function getExchange()
    {
        $general = GeneralSetting::first();
        $data['site_title'] = $general->title;
        $data['base_currency'] = $general->currency;
        $data['page_title'] = "Manage Exchange Currency";
        $data['exchange'] = ExchangeConfirm::orderBy('id', 'DESC')->paginate(1000);
        return view('dashboard.exchange-currency', $data);
    }

    public function invoiceExchange($id)
    {
        $general = GeneralSetting::first();
        $data['site_title'] = $general->title;
        $data['base_currency'] = $general->currency;
        $data['page_title'] = "Exchange Currency Details";
        $data['exchange'] = ExchangeConfirm::findOrFail($id);
        return view('dashboard.exchange-details', $data);
    }

    public function exchangeUpdate(Request $request)
    {
        try {
            if ($request->input('id') === '') {
                session()->flash('message', 'Oops, bad request!');
                Session::flash('type', 'danger');
                return redirect()->back();
            } else {
                $con = ExchangeConfirm::findOrFail($request->input('id'));
                $member = Member::whereReference($con->member->under_reference)->first();
                $bo = [];
                $bo['bonus_type'] = 3;
                $bo['member_id'] = $member->id;
                $bo['member_reference'] = $con->member->under_reference;
                $bo['under_reference'] = $con->member->reference;
                $bo['percentage'] = $this->percentage;
                $bo['exchange_id'] = $request->input('id');
                $bo['amount'] = ($con->exchange_price * $con->exchange->exchangeCurrency->sell_rate * $this->percentage) / 100;
                $member->amount = $member->amount + $bo['amount'];
                Bonus::create($bo);
                $member->save();
                $con->status = 1;
                $con->save();
                session()->flash('message', 'Exchange Successfully Completed.');
                Session::flash('type', 'success');
                return redirect()->back();
            }

        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }

    public function bonusHistory()
    {
        $general = GeneralSetting::first();
        $data['site_title'] = $general->title;
        $data['base_currency'] = $general->currency;
        $data['page_title'] = "Bonus History";
        $data['general'] = $general;
        $data['buy'] = Bonus::orderBy('id', 'DESC')->paginate(10);
        return view('dashboard.bonus-history', $data);
    }

    public function requestWithdraw()
    {
        $general = GeneralSetting::first();
        $data['site_title'] = $general->title;
        $data['base_currency'] = $general->currency;
        $data['page_title'] = "Withdraw Request";
        $data['general'] = $general;
        $data['buy'] = Withdraw::orderBy('id', 'DESC')->paginate(10);
        return view('dashboard.withdraw-history', $data);
    }

    public function successWithdraw(Request $request)
    {
        $this->validate($request, [
            'id' => 'required'
        ]);
        $wt = Withdraw::findOrFail($request->id);
        $wt->status = 1;
        $wt->save();
        session()->flash('message', 'Withdraw Request Payment Successfully Completed.');
        Session::flash('type', 'success');
        return redirect()->back();
    }

    public function refundWithdraw(Request $request)
    {
        $this->validate($request, [
            'id' => 'required'
        ]);
        $wt = Withdraw::findOrFail($request->id);
        $wt->status = 2;
        $mem = Member::findOrFail($wt->member_id);
        $mem->amount = $mem->amount + $wt->amount;
        $wt->save();
        $mem->save();
        session()->flash('message', 'Withdraw Request Payment Successfully Completed.');
        Session::flash('type', 'success');
        return redirect()->back();
    }

    public function manageMember()
    {
        $general = GeneralSetting::first();
        $data['site_title'] = $general->title;
        $data['base_currency'] = $general->currency;
        $data['page_title'] = "Manage Member";
        $data['general'] = $general;
        $data['member'] = Member::orderBy('id','DESC')->get();
        $data['buy'] = Withdraw::orderBy('id', 'DESC')->paginate(10);
        return view('dashboard.manage-member', $data);
    }
    public function deactiveMember(Request $request)
    {
        $this->validate($request,[
           'id' => 'required'
        ]);
        $id = $request->id;
        $mem = Member::findOrFail($id);
        $mem->status = 0;
        $mem->save();
        session()->flash('message', 'Member Successfully DeActivate.');
        Session::flash('type', 'success');
        return redirect()->back();
    }
    public function activeMember(Request $request)
    {
        $this->validate($request,[
            'id' => 'required'
        ]);
        $id = $request->id;
        $mem = Member::findOrFail($id);
        $mem->status = 1;
        $mem->save();
        session()->flash('message', 'Member Successfully Activate.');
        Session::flash('type', 'success');
        return redirect()->back();
    }

    public function activityMember($id)
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Member Activity";
        $data['general'] = GeneralSetting::first();
        $data['member'] = Member::findOrFail($id);
        $mem = Member::findOrFail($id);
        $data['total_reference'] = Member::whereUnder_reference($mem->reference)->get()->count();
        $data['sell'] = SellConfirm::whereMember_id($mem->id)->orderBy('id','DESC')->paginate(5);
        $data['sell_t'] = SellConfirm::whereMember_id($mem->id)->orderBy('id','DESC')->count();
        $data['buy'] = BuyConfirm::whereMember_id($mem->id)->orderBy('id','DESC')->paginate(5);
        $data['buy_t'] = BuyConfirm::whereMember_id($mem->id)->orderBy('id','DESC')->count();
        $data['exchange'] = ExchangeConfirm::whereMember_id($mem->id)->orderBy('id','DESC')->paginate(5);
        $data['exchange_t'] = ExchangeConfirm::whereMember_id($mem->id)->orderBy('id','DESC')->count();
        return view('dashboard.member-activity',$data);
    }
    public function createBank()
    {
        $general = GeneralSetting::first();
        $data['site_title'] = $general->title;
        $data['page_title'] = "Add New Bank";
        return view('dashboard.bank-create', $data);
    }
    public function storeBank(Request $request)
    {
        $this->validate($request,[
           'name' => 'required',
            'account' => 'required'
        ]);
        Bank::create($request->all());
        session()->flash('message', 'Bank Added Successfully..');
        Session::flash('type', 'success');
        Session::flash('title', 'Success');
        return redirect()->back();
    }
    public function manageBank()
    {
        $general = GeneralSetting::first();
        $data['site_title'] = $general->title;
        $data['page_title'] = "All Bank";
        $data['bank'] = Bank::orderBy('id','DESC')->get();
        return view('dashboard.bank-manage', $data);
    }
    public function editBank($id)
    {
        $general = GeneralSetting::first();
        $data['site_title'] = $general->title;
        $data['page_title'] = "Edit Bank";
        $data['bank'] = Bank::findOrFail($id);
        return view('dashboard.bank-edit', $data);
    }
    public function updateBank(Request $request, $id)
    {
        $bank = Bank::findOrFail($id);
        $this->validate($request, [
            'name' => 'required',
            'account' => 'required'
        ]);
        try {
            $ban = Input::except('_method', '_token');

            $bank->fill($ban)->save();
            session()->flash('message', 'Bank Updated Successfully.');
            Session::flash('type', 'success');
            return redirect()->back();
        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }
    public function deleteBank(Request $request)
    {
        $this->validate($request,[
           'id' => 'required'
        ]);
        Bank::destroy($request->id);
        session()->flash('message', 'Bank Deleted Successfully.');
        Session::flash('type', 'success');
        Session::flash('title', 'Success');
        return redirect()->back();
    }
    public function getAdvert()
    {
        $general = GeneralSetting::first();
        $data['site_title'] = $general->title;
        $data['page_title'] = "Manage Advertisement";
        $data['advert'] = Advert::first();
        return view('dashboard.advert-create', $data);
    }
    public function putAdvert(Request $request,$id)
    {
        $this->validate($request,[
           'link' => 'required',
           'link2' => 'required',
        ]);
        $mem = Advert::findOrFail($id);
        $mem->fill($request->all())->save();
        session()->flash('message', 'Advertisement Updated Successfully.');
        Session::flash('type', 'success');
        Session::flash('title', 'Success');
        return redirect()->back();
    }


}
