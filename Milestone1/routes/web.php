<?php

/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider within a group which
 * | contains the "web" middleware group. Now create something great!
 * |
 */

// return defualt welcome page
// will be changed to complete home page
Route::get('/', function () {
    return view('welcome');
});
// Home page Routs////////////////////////////////////////////////////////
// displays home page
Route::get('/home', function () {
    return view('home');
});
// sends data from Home page
Route::post('/home', 'PostController@loginSubmit');
// Login Page Routs///////////////////////////////////////////////////////
// display Login page
Route::get('/login', function () {
    return view('login');
});
// post login data
Route::post('/login', 'PostController@loginSubmit');
// Register page routs/////////////////////////////////////////////////////
// return register view
Route::get('/register', function () {
    return view('register');
});
// post data from register view
Route::post('/register', 'PostController@registerSubmit');

//Admin page Routs////////////////////////////////////////////////////////
//displays Admin page
Route::get('/admin', function()
{
    return view('admin');
});
//sends data from admin page
Route::post('/admin','PostController@displayAll');

// Profile Page Routes////////////////////////////////////////////////////////////
// Create Profile form
Route::get('/createProfile', function () {
    return view('createProfile');
});
// Submit request to create method in profile controller
Route::post('/makeProfile', 'ProfileController@create');
// Edit Profile form page
Route::get('/editProfile', function () {
    return view('createProfile');
});
// Submit request to create method in profile controller
Route::post('/updateProfile', 'ProfileController@update');
    
//Job Page Routes////////////////////////////////////////////////////////////
// Create Job form
Route::get('/createJobInfo', function () {
    return view('createPortfolio');
});
    // Submit request to create method in profile controller
Route::post('/createJobInfo', 'PortfolioController@createPortfolioData');

Route::get('/editPortfolioView', 'PortfolioController@getAllPortfolios');

Route::post('/editPortfolioView', 'PortfolioController@deletePortfolio');



Route::get('/addSkill', function () {
    return view('addSkill');
});
    
Route::post('/addSkill', 'PortfolioController@createSkill');
