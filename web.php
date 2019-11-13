<?php

use App\Visit;

Auth::routes();

Route::get('/', 'SignUpController@index');
Route::post('/signup', 'SignUpController@signup');
Route::get('/signup/thankyou', 'SignUpController@thankyou');
Route::get('/logout', 'Auth\LogoutController@logout')->name('logout');

Route::group(['middleware' => ['role:Admissions']], function () {
  // OLD index page = Route::get('/visits', 'VisitsController@index')->name('admissions');
  // NEW Vue index page
  Route::get('/visits', function () { return view('visits.indexvue'); })->name('admissions');
  Route::get('/api/visits', 'VisitsController@indexvueapi');
  Route::post('/api/visits', 'VisitsContoller@createapi');

  Route::get('/visits/createVisit', 'VisitsController@createVisit');
  Route::post('/visits/createVisit', 'VisitsController@storeVisit');
 

  // OLD create visit page = Route::get('/visits/create', 'VisitsController@create');
  // NEW create visit page in resources/assets/js/routes.js

  // OLD editVisit page = 
  Route::get('/visits/{visit}/editVisit', 'VisitsController@editVisit');
  // NEW Vue edit page

  // OLD updateVisit page = 
  Route::post('/visits/{visit}/update', 'VisitsController@update');
  // NEW Vue update page

  // OLD non-Vue routes to test href works *****************************
  Route::post('/visits/{id}/destroy', 'VisitsController@destroy')->name('visits.destroy');

  // TEST route for testing Vue functionality **************************
  //Route::get('/visits/{visit}', 'VisitsController@get_listing_web');
});

// OLD non-Vue routes **************************************************
Route::get('/activities', 'ActivitiesController@index')->name('members');
Route::post('/requirements/{requirement}/signoff', 'RequirementsController@signoff');

Route::group(['middleware' => ['role:Reception|Admissions']], function () {
  Route::get('/visits/reception', 'VisitsController@reception')->name('reception');
});

Route::get('/admin', 'AdminController@index');
Route::get('/admin/addUserToRole', 'AdminController@addUserToRole');
Route::get('/admin/removeUserFromRole', 'AdminController@removeUserFromRole');
Route::get('/admin/createRole', 'AdminController@createRole');
Route::post('/admin/addRole', 'AdminController@addRole');
Route::get('/admin/assignUserToRole', 'AdminController@assignUserToRole');
Route::post('/admin/assign', 'AdminController@assign');
Route::get('/admin/removeUserFromRole', 'AdminController@removeUserFromRole');
Route::post('/admin/remove', 'AdminController@remove');
Route::get('/admin/users', 'AdminController@users');
Route::post('/admin/removeUserFromAllTeams', 'AdminController@removeUserFromAllTeams');
Route::post('/admin/deleteTeamName/{id}', 'AdminController@destroyTeamName');
Route::post('/admin/deleteTypeName/{id}', 'AdminController@destroyTypeName');


/* OLD routes
Route::group(['middleware' => ['role:Admissions']], function() {
  Route::get('/visits', 'VisitsController@index')->name('admissions');
  Route::get('/visits/previous', 'VisitsController@previous');
  Route::get('/visits/create', 'VisitsController@create');
  //Route::get('/visits/{visit}', 'VisitsController@show');
  Route::post('/visits/store', 'VisitsController@store');
  Route::post('/visits/{visit}/activities', 'ActivitiesController@store');
  Route::get('/visits/{visit}/edit', 'VisitsController@edit');
  Route::get('/visits/{visit}/editVisit', 'VisitsController@editVisit');
  Route::post('/visits/{visit}/update', 'VisitsController@update');
  Route::get('/activities/{visit_id}/editActivity/{activity_id}', 'ActivitiesController@editActivity');
  Route::post('/activities/{activity}/update', 'ActivitiesController@update');
  //Route::get('/visits/{visit_id}/delete', 'VisitsController@destroy');
  Route::post('/visits/{id}/destroy', 'VisitsController@destroy')->name('visits.destroy');
  //Route::post('/activities/{activity}/delete', 'ActivitiesController@destroy')->name('deleteActivity');
  Route::post('/activities/{id}/destroy', 'ActivitiesController@destroy')->name('activities.destroy');
  Route::post('/requirements/{requirement}/delete', 'RequirementsController@destroy')->name('deleteRequirement');
  Route::post('/activities/chase', 'ActivitiesController@chase');
  Route::post('/activities/{visit}/addActivity', 'ActivitiesController@create');
  Route::post('/activities/{visit}/saveActivity', 'ActivitiesController@save');
  Route::post('/activities/{activity}/addRequirements', 'ActivitiesController@addRequirements');
  Route::get('/activities/createType', 'ActivitiesController@createType');
  Route::post('/activities/storeType', 'ActivitiesController@storeType');
  Route::get('/visits/combo', 'VisitsController@combo');
  Route::post('/visits/storeCombo', 'VisitsController@storeCombo');
  Route::get('/visits/multi', 'VisitsController@multi');
  Route::post('/visits/storeMulti', 'VisitsController@storeMulti');
});

//Route::group(['middleware' => ['role:Principal|VicePrincipal|HeadOfPastoralCare|HeadOfAdmissions|HeadOfLowerCollege|HeadOfUpperCollege|HeadOfSixthForm|Porters|Catering|PAC|HFC|Beale|Cambray|Elizabeth|Eversleigh|Farnley|Gransden|Roderic|StAustins|StHelens|StHildas|StMargarets']], function() {
  Route::get('/activities', 'ActivitiesController@index')->name('members');
  Route::post('/requirements/{requirement}/signoff', 'RequirementsController@signoff');
  //Route::get('/requirements/{requirement}/confirm', 'RequirementsController@confirm');
  //Route::post('/requirements/{requirement_id}/decline', 'RequirementsController@decline');
  //Route::get('/requirements/{requirement}/accept', 'RequirementsController@accept');
  //Route::get('/activities/{activity}/confirm', 'ActivitiesController@confirm');
  //Route::get('/activities/{activity}/decline', 'ActivitiesController@decline');
  //Route::get('/activities/{activity}/accept', 'ActivitiesController@accept');
//});

Route::group(['middleware' => ['role:Reception|Admissions']], function() {
  Route::get('/visits/reception', 'VisitsController@reception')->name('reception');
});

*/
