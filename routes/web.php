<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\meetingsController;
use App\Http\Controllers\PlaygroudController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

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


Route::get('/', 'startController@index');
Route::get('/eng', 'startController@indexeng');

//Route::get('/admin', 'startController@index');
Route::view('/mail','mailgun');




//Playground
Route::get('/pg',[PlaygroudController::class,'index']);
Route::get('/pg2',[PlaygroudController::class,'index2']);
Route::get('/cf',[PlaygroudController::class,'companyForm']);

Route::get('/mf',[PlaygroudController::class,'meetingForm']);
Route::post('/newm/{id}',[meetingsController::class,'createMeeting'])->middleware('auth');


Route::get('notedelete/{id}',[meetingsController::class,'noteDelete']);




Route::get('company/{id}', 'CompanyController@index');
Route::get('company/eng/{id}', 'CompanyController@indexeng');


Route::get('/catalogue', 'CatalogueController@index');


//Route::get('/catalogue/{id}', 'CatalogueController@filter');
Route::get('b2b', [CatalogueController::class,'b2b']);

Route::get('/uc', 'UnderController@index');
Route::get('/uc/eng', 'UnderController@indexeng');

Route::get('/uc2', 'UnderController@index2');
Route::get('/uc2/eng', 'UnderController@index2eng');

Route::get('/events', 'EventsController@index');
Route::get('/events/eng', 'EventsController@indexeng');

Route::get('/event/eng/{id}', 'EventsController@eventeng');
Route::get('/event/{id}', 'EventsController@event');


Route::get('/media/{id}', 'MediaController@index');





Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/usersettings', 'HomeController@settings');



Route::post('/createcompany', 'HomeController@store');
Route::post('/usersettings', 'HomeController@editemail');


Route::get('/step1', 'HomeController@compcreator');
Route::post('/step1', 'HomeController@store');
Route::get('/step2', 'HomeController@compcreator2');
Route::post('/step2', 'HomeController@storemedia');
Route::post('/step2/desc', 'HomeController@description');
Route::post('/step2/deleteother', 'HomeController@deleteother');
Route::post('/step2/change', 'HomeController@change');
Route::post('/editName', 'HomeController@editCompanyName');
Route::post('/step2/tags','HomeController@editTags');
Route::get('/setasmain/{id}/{oid}',[HomeController::class,'setAsMain']);
//Route::post('/usermedia/changelogo', 'HomeController@changelogo');

Route::get('/app','UnderController@index');

//test mailgun
Route::get('/mailgun', function (){

    $data = [
        'title'=> 'Testint 1234',
        'content' => 'Witaj Świecie'
    ];

    Mail::send('mailgun',$data, function ($message){
        $message ->to('pinsir00@gmail.com', 'Kotlet')->subject('Chyba działa');
    });


});

//meetings routes

Route::get('/meetingSettings',[meetingsController::class,'companyForm']);
Route::post('/cd/{id}',[meetingsController::class,'companyDates']);
Route::get('/notifications',[meetingsController::class,'notesList']);
Route::get('/meetnope/{id}',[meetingsController::class,'meetnope']);
Route::get('/meetok/{id}',[meetingsController::class,'meetok']);

Route::get('/meetings',[meetingsController::class, 'meetsList']);
Route::get('/meetroom/{id}',[meetingsController::class, 'meetingRoom']);

//admin

Route::get('admin/dashboard',[adminController::class,'index']);

Route::get('admin/roles',[adminController::class,'roles']);
Route::get('/admin/roleDelete/{id}',[adminController::class,'roleDelete']);
Route::post('/admin/addRole',[adminController::class,'addRole']);
Route::post('/admin/giveRole',[adminController::class,'giveRole']);

Route::get('admin/companyVerify',[adminController::class,'companyVerify']);
Route::get('/verifyCompany/{id}',[adminController::class,'companyVerified']);
Route::get('/admin/companyDelete/{id}',[adminController::class,'companyDelete']);

Route::get('admin/photoVerify',[adminController::class,'photoVerify']);
Route::get('/verifyPhoto/{id}',[adminController::class,'photoVerified']);
Route::get('/admin/photoDelete/{id}',[adminController::class,'photoDelete']);

Route::get('admin/companySearch',[adminController::class,'companySearch']);

Route::get('admin/tags',[adminController::class,'tags']);
Route::get('/admin/tagDelete/{id}',[adminController::class,'tagDelete']);
Route::post('/admin/addTag',[adminController::class,'addTag']);

Route::get('admin/events',[adminController::class,'events']);
Route::get('admin/media',[adminController::class,'media']);
Route::get('admin/options',[adminController::class,'options']);
Route::get('admin/compcreator2/{id}',[adminController::class,'compcreator2']);
