<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('timetable/{week}/{timegaps}/{name}/{year}/{place}','frcont@maketab');
Route::get('shiftbar','frcont@shiftbar');
Route::get('addbookin/{date}/{id}/{name}/{start}/{end}/{place}','frcont@addbookin'); 
Route::get('addshift/{numreq}/{date}/{id}/{start}/{end}/{place}','frcont@add_shift');
Route::get('add_bookin/{date}/{name_id}/{start}/{end}/{place_id}','frcont@add_bookin'); 
Route::get('bottom/{name}','frcont@bottomform');
Route::get('test/','frcont@shwfrm');
Route::get('main/','frcont@mainwindow');
Route::get('sidepanel/{clicked_name}/{date}/{start}/{finish}','frcont@sidepanel');
Route::get('mkfrm/','frcont@mktble');
Route::get('delfrm/','frcont@drpmktble');
Route::get('parsediv/{htmldivs}','frcont@parsetimecell');
Route::get('testroute/',function(){ return 'we here';});
Route::get('datetest/',function(){ return view('date');});
Route::get('mainwindow/',function(){ return view('mainwindow');});
Route::get('topbar/','frcont@topbar');
Route::get('temp', function () {
    return view('mp');
});
