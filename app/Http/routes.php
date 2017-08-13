

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
/*  Train Requests */
Route::post('RefuseRequest', 'PersonController@RefuseRequest');
Route::post('AcceptRequest', 'PersonController@AcceptRequest');
Route::get('/ShowRequests', 'PersonController@ShowRequests');
Route::post('/TrainRequest', 'PersonController@TrainRequest');
Route::post('/ClubTrainRequest', 'ClubController@ClubTrainRequest');
Route::post('RefuseRequestClub', 'ClubController@RefuseRequestClub');
Route::post('AcceptRequestClub', 'ClubController@AcceptRequestClub');
Route::post('CancelTrainRequest', 'PersonController@CancelTrainRequest');
Route::post('CancelTrainRequestClub', 'ClubController@CancelTrainRequestClub');
/*======================================*/

/*yareet m7d4 y4el el routes bt3ty tany t7t ya gma3a*/
Route::get('posts', 'PostsAjaxController@index');
Route::post('upload', 'PostsAjaxController@upload');
Route::get('RemovePost/{PostID}', 'PostsAjaxController@RemovePost');
Route::post('CreateEvent', 'PostsAjaxController@CreateEvent');
/*=================================================*/



/*for invitation requeset*/
Route::post('/store', 'PersonController@store');
Route::post('/store_respond', 'PersonController@store_respond');
/*************************************************************/





/*for Like && comment*/
Route::post('add_comment','PostsAjaxController@add_comment');
Route::get('/check_user_like/{postId}', 'PostsAjaxController@check_user_like');
Route::post('add_like','PostsAjaxController@add_like');
Route::post('delete_like','PostsAjaxController@delete_like');
/*************************************************************/




Route::post('/reportpost', 'PostsAjaxController@reportpost');
Route::post('/checkReports', 'PostsAjaxController@checkReports');
Route::get('profile', 'PostsAjaxController@profile');
Route::get('/searchResults', 'PersonController@searchResults');
Route::get('/Coachs', 'PostsAjaxController@Coachs');
Route::get('/AcceptPlayer', 'PostsAjaxController@AcceptPlayer');
Route::get('/Respond', 'PersonController@Respond');
Route::get('/ClubWall', 'PostsAjaxController@ClubWall');
Route::get('/', 'PersonController@index');
Route::get('/about', 'PersonController@about');
Route::get('/Complaint', 'PersonController@Complaint');
Route::post('/SaveComplaint', 'PersonController@SaveComplaint');
Route::get('/contact', 'PersonController@Complaint');
Route::get('/faq', 'PersonController@faq');
Route::get('/error', 'PersonController@error');
Route::get('/loginAccount', 'PersonController@loginAccount');
Route::post('/AfterLogin','PersonController@AfterLogin');
Route::get('index','PersonController@index');
//Route::get('/addSubscriber','PersonController@addSubscriber');
Route::post('storeSubscriber','PersonController@storeSubscriber');
Route::get('successRegister', 'PersonController@successRegister');

// Pages : edit profile & follow Club & wall  & view profile

Route::get('/editProfile', 'PersonController@editProfile');
Route::post('/SaveProfile', 'PersonController@SaveProfile');
// Event Actions And Routes
Route::get('/Events', 'PostsAjaxController@Events');
Route::post('/addEventUser','PostsAjaxController@addEventUser');
Route::post('/deleteEventUser','PostsAjaxController@deleteEventUser');
Route::get("/Check_EventUser/{eventId}",'PostsAjaxController@Check_EventUser');

//Club Action And Route 
Route::get('/followClub', 'ClubController@followClub');
Route::post ( '/addItem', 'ClubController@addItem' );
Route::get('/Check_club/{clubId}', 'ClubController@Check_club');
Route::post('/DeleteFromClubFollowers','ClubController@DeleteFromClubFollowers');

//follow users in search page
Route::post ( '/addFollower', 'UserFollowerController@addFollower' );
Route::get('/check_follower/{userId}', 'UserFollowerController@check_follower');
Route::post('/DeleteFollower','UserFollowerController@DeleteFollower');



Route::post('/storeClub', 'ClubController@storeClub');
Route::post('/storeUser', 'PersonController@storeUser');
Route::get('/Logout','PersonController@Logout');



Route::get("user/{UserId}",'PersonController@showProfile');
Route::get("club/{ClubId}",'PersonController@showProfileClub');
Route::get('SearchRequest','SearchController@index');
Route::get('search','SearchController@search');

Route::get('/welcome', function () {
    return view('welcome');
});

Route::auth();

