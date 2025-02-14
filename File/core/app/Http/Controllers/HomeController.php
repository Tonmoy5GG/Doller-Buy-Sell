<?php

namespace App\Http\Controllers;

use App\Bank;
use App\BuyConfirm;
use App\BuyCurrency;
use App\Currency;
use App\Bonus;
use App\ExchangeConfirm;
use App\ExchangeCurrency;
use App\GeneralSetting;
use App\Home;
use App\Advert;
use App\HomeTop;
use App\Menu;
use App\SellConfirm;
use App\SellCurrency;
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;


class HomeController extends Controller
{
    public function __construct()
    {
        $data = [];
        $general_all = GeneralSetting::first();
        $this->site_title = $general_all->title;
        $this->footer_text = $general_all->footer_text;
        $this->footer_bottom_text = $general_all->footer_bottom_text;
        $this->base_currency = $general_all->currency;
    }

    public function getHome()
    {
        $data['site_title'] = $this->site_title;
        $data['footer_text'] = $this->footer_text;
        $data['footer_bottom_text'] = $this->footer_bottom_text;
        $data['slider'] = Slider::all();
        $data['currency'] = Currency::orderBy('id','ASC')->get();
        $data['general'] = GeneralSetting::first();
        $data['menu'] = Menu::all();
        $data['home'] = Home::first();
        $data['item'] = HomeTop::inRandomOrder()->take(4)->get();
        $data['sell'] = SellConfirm::whereStatus(1)->orderBy('id','DESC')->take(5)->get();
        $data['buy'] = BuyConfirm::whereStatus(1)->orderBy('id','DESC')->take(5)->get();
        $data['exchange'] = ExchangeConfirm::whereStatus(1)->orderBy('id','DESC')->take(5)->get();
        $data['bonus'] = Bonus::orderby('id','DESC')->take(10)->get();
        $data['advert'] = Advert::first();
        return view('home.home',$data);
    }
    public function memberReference($id)
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Member Registration";
        $data['general'] = GeneralSetting::first();
        $data['menu'] = Menu::all();
        $data['reference'] = $id;
        return view('home.reference-registration',$data);
    }
    public function buyCurrency()
    {
        $data['site_title'] = $this->site_title;
        $data['footer_bottom_text'] = $this->footer_bottom_text;
        $data['currency'] = Currency::orderBy('id','ASC')->get();
        $data['general'] = GeneralSetting::first();
        $data['menu'] = Menu::all();
        $data['advert'] = Advert::first();
        return view('home.buy',$data);
    }
    public function sellCurrency()
    {
        $data['site_title'] = $this->site_title;
        $data['footer_bottom_text'] = $this->footer_bottom_text;
        $data['currency'] = Currency::orderBy('id','ASC')->get();
        $data['general'] = GeneralSetting::first();
        $data['menu'] = Menu::all();
        $data['advert'] = Advert::first();
        return view('home.sell',$data);
    }
    public function exchangeCurrency()
    {
        $data['site_title'] = $this->site_title;
        $data['footer_bottom_text'] = $this->footer_bottom_text;
        $data['currency'] = Currency::orderBy('id','ASC')->get();
        $data['general'] = GeneralSetting::first();
        $data['menu'] = Menu::all();
        $data['advert'] = Advert::first();
        return view('home.exchange',$data);
    }
    public function menu($id)
    {
        $menu = Menu::findOrFail($id);
        $data['site_title'] = $this->site_title;
        $data['footer_text'] = $this->footer_text;
        $data['footer_bottom_text'] = $this->footer_bottom_text;
        $data['menu_name'] = $menu->name;
        $data['menu_description'] = $menu->description;
        $data['menu'] = Menu::all();
        $data['slider'] = Slider::all();
        $data['general']= GeneralSetting::first();
        $data['currier'] = null;
        return view('home.menu',$data);
    }
    public function getContact()
    {

        $data['site_title'] = $this->site_title;
        $data['footer_text'] = $this->footer_text;
        $data['footer_bottom_text'] = $this->footer_bottom_text;
        $data['menu'] = Menu::all();
        $data['general'] = GeneralSetting::first();
        return view('home.contact-us',$data);
    }
    public function sendContact(Request $request)
    {
        $gen = GeneralSetting::first();
        $to = $gen->email;
        $subject = "Contact Message";
        $msg = Input::get('message');
        $name = Input::get('name');
        $email = Input::get('email');

        $headers = "From: $name <$email> \r\n";
        $headers .= "Reply-To: $name <$email> \r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $message = "
                    <html>
                    <head>
                    <title>Contact Message</title>
                    </head>
                    <body>
                    <p>$msg</p>
                    </body>
                    </html>
                    ";

        if (mail($to, $subject, $message, $headers)) {
            session()->flash('message', "Email Send Successfully.");
            Session::flash('type', 'success');
            return redirect()->back();
        } else {
            session()->flash('message', "Email not Send.");
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }






}
