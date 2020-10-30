<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {    
    if(Session::has('user_info') && Session::get('user_info')['auth'] == "true"){
    //if(Auth::check(){
        return view('home');
    }
    else{
        return view('accounts.login');
    }
});

Route::get('home', array('as'=>'home', function(){ 
    if(Session::has('user_info') && Session::get('user_info')['auth'] == "true"){
    //if(Auth::check(){
        return view('home');
    }
    else{
        return view('accounts.login');
    }
}));

Route::get('toexcel', array('as'=>'toexcel', function(){ 
    return view('toexcel');
}));
Route::get('toexcel2', array('as'=>'toexcel2', function(){ 
    return view('toexcel2');
}));

Route::get('/login',function(){
    return view('accounts.login');
})->name('login');

Route::get('/signup',function(){
    return view('accounts.signup');
})->name('signup');



Route::post('/login', 'Auth\LoginController@login')->name('login');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::post('/signup', 'Auth\RegisterController@signup')->name('signup');



Route::resource('tester_inventory','TesterInventoryController');





Route::resource('product_detail','ProductDetailController');

Route::resource('software_detail','CurSoftwareController');

Route::resource('platform','PlatformController');

route::resource('developer','DeveloperController');

Route::resource('member','MemberController');

Route::resource('job_history','JobHisController');

Route::resource('eventlogs','EventLogController');

Route::resource('profile','ProfileController');


Route::get('/platform/add/{pf}','PlatformController@createx');

Route::post('/profile.update', 'ProfileController@update')->name('profile.update');

Route::post('/eventlogs.event', 'EventLogController@event')->name('eventlogs.event');

Route::post('/developer.edit', 'DeveloperController@edit')->name('developer.edit');
Route::post('/developer.update', 'DeveloperController@update')->name('developer.update');
Route::post('/developer.delete', 'DeveloperController@delete')->name('developer.delete');
Route::post('/developer.store', 'DeveloperController@store')->name('developer.store');
Route::post('/developer.event', 'DeveloperController@event')->name('developer.event');

Route::post('/member.edit', 'MemberController@edit')->name('member.edit');
Route::post('/member.update', 'MemberController@update')->name('member.update');
Route::post('/member.delete', 'MemberController@delete')->name('member.delete');
Route::post('/member.store', 'MemberController@store')->name('member.store');
Route::post('/member.event', 'MemberController@event')->name('member.event');

Route::post('/software_detail.edit', 'CurSoftwareController@edit')->name('software_detail.edit');
Route::post('/software_detail.update', 'CurSoftwareController@update')->name('software_detail.update');
Route::post('/software_detail.delete', 'CurSoftwareController@delete')->name('software_detail.delete');
Route::post('/software_detail.store', 'CurSoftwareController@store')->name('software_detail.store');
Route::post('/home.chart', 'CurSoftwareController@chart')->name('home.chart');

Route::post('/software_history.event', 'CurSoftwareController@event')->name('software_history.event');

Route::post('/product_detail.edit', 'ProductDetailController@edit')->name('product_detail.edit');
Route::post('/product_detail.update', 'ProductDetailController@update')->name('product_detail.update');
Route::post('/product_detail.delete', 'ProductDetailController@delete')->name('product_detail.delete');
Route::post('/product_detail.store', 'ProductDetailController@store')->name('product_detail.store');
Route::post('/product_detail.event', 'ProductDetailController@event')->name('product_detail.event');

Route::post('/platform.edit', 'PlatformController@edit')->name('platform.edit');
Route::post('/platform.update', 'PlatformController@update')->name('platform.update');
Route::post('/platform.delete', 'PlatformController@delete')->name('platform.delete');
Route::post('/platform.store', 'PlatformController@store')->name('platform.store');
Route::post('/platform.event', 'PlatformController@event')->name('platform.event');



Route::post('/tester_inventory.store', 'TesterInventoryController@store')->name('tester_inventory.store');

Route::post('/job_history.event', 'JobHisController@event')->name('job_history.event');


Route::get('ddl_event_inventory/{id}',function($id){
    if(Request::ajax()){

        $str_spt = explode(";",$id);

        $where='where ';

        if($id == 'SELECT_ALL;SELECT_ALL;SELECT_ALL;SELECT_ALL')
        {
            $where='';
        }
        else
        {
            if($str_spt[0] != "SELECT_ALL")
            {
                $where .= "ProductName = '". $str_spt[0] ."' and ";
            }
            if($str_spt[1] != "SELECT_ALL")
            {
                $where .= "MasterRev = '". $str_spt[1] ."' and ";
            }
            if($str_spt[2]!= "SELECT_ALL")
            {
                $where .= "Platform = '". $str_spt[2] ."' and ";
            }
            if($str_spt[3] != "SELECT_ALL")
            {
                $where .= "TesterName = '". $str_spt[3] ."' and ";
            }
            $where = substr($where, 0, -4);
        }

        $str_array = DB::select("select * from tb_tester_inventory " .$where);

        return $str_array;
    }
});

Route::get('query_member/{id}',function($id){
    if(Request::ajax()){
        $str_spt = explode("_",$id);
        if($str_spt[0] = 'empid')
        {

            $str_array = DB::select("select emp_name from tb_members where emp_id = '". $str_spt[1] ."' ");
        }
        else//if ($str_spt[0] = 'empname') 
        {
            //$str_array = DB::select("select emp_id from tb_members where emp_name = 'NIMIT SRISONGKRAM'");
        }
        return  $str_array;
        //return view('home');
    }
});

Route::get('/software_history', array('as'=>'software_history', function(){ 
    return view('software_history');
}));






