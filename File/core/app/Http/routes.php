<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/',['as'=>'home','uses'=>'HomeController@getHome']);
Route::get('/menu/{id}/{name}','HomeController@menu');
Route::get('contact-us',['as'=>'contact-us','uses'=>'HomeController@getContact']);
Route::post('contact-send',['as'=>'contact-send','uses'=>'HomeController@sendContact']);

//Authentication Route List
Route::get('admin', ['as'=>'login', 'uses'=>'AdminAuthController@getLogin']);
Route::post('admin', ['as'=>'login', 'uses'=>'AdminAuthController@postLogin']);
Route::get('admin/logout', ['as'=>'logout','uses'=>'AdminAuthController@logout']);

/* Admin password Change*/
Route::get('changepass', ['as'=>'change-pass', 'uses'=>'WebSettingController@getChangePass']);
Route::post('changepass', ['as'=>'change-pass', 'uses'=>'WebSettingController@postChangePass']);

/* Admin Dashboard Route List */
Route::get('dashboard',['as'=>'dashboard','uses'=>'DashboardController@getDashboard']);

/* Currency Route List*/
Route::get('currency-create', ['as'=>'currency_create','uses'=>'DashboardController@createCurrency']);
Route::post('currency-create', ['as'=>'currency_store','uses'=>'DashboardController@storeCurrency']);
Route::get('currency', ['as'=>'currency_show','uses'=>'DashboardController@showCurrency']);
Route::get('currency-edit/{id}', ['as'=>'currency_edit','uses'=>'DashboardController@editCurrency']);
Route::put('currency-edit/{id}', ['as'=>'currency_update','uses'=>'DashboardController@updateCurrency']);
Route::delete('currency-delete', ['as'=>'currency_delete','uses'=>'DashboardController@deleteCurrency']);

/* Bank Info Route List */
Route::get('bank-info',['as'=>'bank-info','uses'=>'DashboardController@getBank']);

/*WebSetting Route List*/
Route::get('general-setting', ['as'=>'general-setting', 'uses'=>'WebSettingController@getGeneralSetting']);
Route::put('general-setting/{id}', ['as'=>'update_general', 'uses'=>'WebSettingController@putGeneralSetting']);

/* Slider Setting */
Route::get('slider', ['as'=>'slider', 'uses' =>'WebSettingController@getSlider']);
Route::post('slider', ['as'=>'post_slider', 'uses' =>'WebSettingController@postSlider']);
Route::delete('slider', ['as'=>'delete_slider', 'uses' =>'WebSettingController@deleteSlider']);

/* Menu Route List*/
Route::get('menu-create',['as'=>'menu_create','uses'=>'WebSettingController@getMenuCreate']);
Route::post('menu-create',['as'=>'menu_create','uses'=>'WebSettingController@postMenuCreate']);
Route::get('menu-show',['as'=>'menu_show','uses'=>'WebSettingController@showMenuCreate']);
Route::get('menu-edit/{id}',['as'=>'menu-edit','uses'=>'WebSettingController@editMenuCreate']);
Route::put('menu-edit/{id}',['as'=>'menu-update','uses'=>'WebSettingController@updateMenuCreate']);
Route::delete('menu-delete/{id}',['as'=>'menu-delete','uses'=>'WebSettingController@deleteMenuCreate']);

/* Home Top Route Lis*/
Route::get('home-top-create',['as'=>'home-top-create','uses'=>'WebSettingController@topHome']);
Route::post('home-top-create',['as'=>'home-top-create','uses'=>'WebSettingController@postTopHome']);
Route::get('home-top-edit/{id}',['as'=>'home-top-edit','uses'=>'WebSettingController@editTopHome']);
Route::put('home-top-edit/{id}',['as'=>'home-top-update','uses'=>'WebSettingController@updateTopHome']);
Route::delete('home-top-delete',['as'=>'home-top-delete','uses'=>'WebSettingController@deleteTopHome']);

/* Home Page Route */
Route::get('home-page-setting',['as'=>'home_page_setting','uses'=>'WebSettingController@getHomePageSetting']);
Route::put('home-page-setting/{id}',['as'=>'update_home_page_setting','uses'=>'WebSettingController@putHomePageSetting']);

Route::get('buy-currency',['as'=>'buy-currency','uses'=>'HomeController@buyCurrency']);
Route::get('sell-currency',['as'=>'sell-currency','uses'=>'HomeController@sellCurrency']);
Route::get('exchange-currency',['as'=>'exchange-currency','uses'=>'HomeController@exchangeCurrency']);


/* User Buy Currency Route List */
Route::get('user-buy-currency',['as'=>'user-buy-currency','uses'=>'MemberController@userBuyCurrency']);
Route::post('buy-order-confirm',['as'=>'buy-order-confirm','uses'=>'MemberController@buyOrderConfirm']);
/* user Sell Currency */
Route::get('user-sell-currency',['as'=>'user-sell-currency','uses'=>'MemberController@userSellCurrency']);
Route::post('sell-order-confirm',['as'=>'sell-order-confirm','uses'=>'MemberController@sellConfirmOrder']);

/* Admin Buy Currency Route List*/
Route::get('admin-buy-currency',['as'=>'admin-buy-currency','uses'=>'DashboardController@adminBuyCurrency']);
Route::post('admin-sell-update',['as'=>'admin-sell-update','uses'=>'DashboardController@updateAdminBuyCurrency']);

/* Admin Sell Currency */
Route::get('admin-sell-currency',['as'=>'admin-sell-currency','uses'=>'DashboardController@adminSellCurrency']);
Route::post('admin-buy-update',['as'=>'admin-buy-update','uses'=>'DashboardController@adminBuyCurrencyUpdate']);
Route::post('admin-buy-message',['as'=>'admin-buy-message','uses'=>'DashboardController@buyMessage']);
/* Sell invoice*/
Route::get('sell-invoice/{id}',['as'=>'sell-invoice','uses'=>'DashboardController@sellInvoice']);
Route::get('buy-invoice/{id}',['as'=>'buy-invoice','uses'=>'DashboardController@buyInvoice']);

/* Currency Exchange Route List*/
Route::get('user-exchange-currency',['as'=>'user-exchange-currency','uses'=>'MemberController@userExchangeCurrency']);
Route::post('exchange-order-confirm',['as'=>'exchange-order-confirm','uses'=>'MemberController@exchangeConfirm']);

/* Admin Exchange Route List */
Route::get('admin-exchange-currency',['as'=>'admin-exchange-currency','uses'=>'DashboardController@getExchange']);
Route::get('exchange-invoice/{id}',['as'=>'exchange-invoice','uses'=>'DashboardController@invoiceExchange']);
Route::post('admin-exchange-update',['as'=>'admin-exchange-update','uses'=>'DashboardController@exchangeUpdate']);

/* Add member from admin*/
Route::get('member-add',['as'=>'member-add','uses'=>'DashboardController@addMember']);
Route::get('admin-member-edit/{id}',['as'=>'admin-member-edit','uses'=>'DashboardController@editMember']);
Route::put('admin-member-edit/{id}',['as'=>'admin-member-update','uses'=>'DashboardController@updateMember']);

/* Admin bank Route List */
Route::get('bank-create',['as'=>'bank-create','uses'=>'DashboardController@createBank']);
Route::post('bank-create',['as'=>'bank-create','uses'=>'DashboardController@storeBank']);
Route::get('bank-manage',['as'=>'bank-manage','uses'=>'DashboardController@manageBank']);
Route::get('bank-edit/{id}',['as'=>'bank-edit','uses'=>'DashboardController@editBank']);
Route::put('bank-update/{id}',['as'=>'bank-update','uses'=>'DashboardController@updateBank']);
Route::delete('bank-delete',['as'=>'bank-delete','uses'=>'DashboardController@deleteBank']);

/* Admin Advert Setting */
Route::get('manage-advert',['as'=>'manage-advert','uses'=>'DashboardController@getAdvert']);
Route::put('advert-update/{id}',['as'=>'advert-update','uses'=>'DashboardController@putAdvert']);

/* ----------------------- Member Route List --------------------------*/
Route::get('member-login',['as'=>'member-login','uses'=>'MemberAuthController@getLogIn']);
Route::post('member-login',['as'=>'member-login','uses'=>'MemberAuthController@postLogIn']);
Route::get('member-registration',['as'=>'member-registration','uses'=>'MemberAuthController@getRegistration']);
Route::post('member-registration',['as'=>'member-registration','uses'=>'MemberAuthController@postRegistration']);
Route::get('member-logout',['as'=>'member-logout','uses'=>'MemberAuthController@logout']);

// Member Password Reset Route List
Route::get('member/password/reset/{token?}', 'Auth\MemberPasswordController@showResetForm'); //Emailing Operation Here
Route::post('member/password/reset', 'Auth\MemberPasswordController@reset'); //Show Reset Form
Route::post('member/password/email', 'Auth\MemberPasswordController@sendResetLinkEmail'); //Show Password Reset Form

/* Member Password Change */
Route::get('member-password-change',['as'=>'member-password-change','uses'=>'MemberController@changePassword']);
Route::post('member-password-change',['as'=>'update-member-password-change','uses'=>'MemberController@updatePassword']);

/* Member Edit Route List */
Route::get('member-edit',['as'=>'member-edit','uses'=>'MemberController@editMember']);
Route::post('member-edit',['as'=>'member-update','uses'=>'MemberController@updateMember']);

/* Member Dashboard Route List */
Route::get('member-dashboard',['as'=>'member-dashboard','uses'=>'MemberController@memberDashboard']);

/* Member Reference Url*/
Route::get('reference/{id}',['as'=>'reference','uses'=>'HomeController@memberReference']);

/* member Reference Bonus */
Route::get('reference-bonus',['as'=>'reference-bonus','uses'=>'MemberController@memberBonus']);

/* Member Withdraw request  */
Route::get('withdraw-request',['as'=>'withdraw-request','uses'=>'MemberController@requestWithdraw']);
Route::post('withdraw-request',['as'=>'withdraw-post','uses'=>'MemberController@postWithdraw']);

/* Admin Bonus Route List*/
Route::get('bonus-history',['as'=>'bonus-history','uses'=>'DashboardController@bonusHistory']);

/* Admin withdraw-request */
Route::get('admin-withdraw-request',['as'=>'admin-withdraw-request','uses'=>'DashboardController@requestWithdraw']);

Route::post('withdraw-success',['as'=>'withdraw-success','uses'=>'DashboardController@successWithdraw']);
Route::post('withdraw-refund',['as'=>'withdraw-refund','uses'=>'DashboardController@refundWithdraw']);

/* manage user From Admin*/
Route::get('manage-member',['as'=>'manage-member','uses'=>'DashboardController@manageMember']);

/* member Active or DeActive*/
Route::post('member-deactive',['as'=>'member-deactive','uses'=>'DashboardController@deactiveMember']);
Route::post('active-member',['as'=>'active-member','uses'=>'DashboardController@activeMember']);

/* Member Activity*/
Route::get('member-activity/{id}',['as'=>'member-activity','uses'=>'DashboardController@activityMember']);

