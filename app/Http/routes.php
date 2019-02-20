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

Route::get('/', function () {
    return view('auth.login');
});


Route::auth();
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');
Route::post('password/reset', 'API\AppUserController@postReset');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/users', 'AppUserController@index');
    Route::get('/user/{id}/block', 'AppUserController@blockUsers');
    Route::get('/user/{id}/details', 'AppUserController@getUserDetails');
    
    Route::get('/templates/list', 'TemplateController@index');
    Route::get('/template/add', 'TemplateController@addTemplate');
    Route::post('/template/save', 'TemplateController@saveTemplate');
    Route::get('/template/edit/{id}', 'TemplateController@editTemplate');
    
    Route::get('/test-area', 'TestTemplateController@index');
    Route::get('/test-template/add', 'TestTemplateController@addTestTemplate');
    Route::post('/test_template/save', 'TestTemplateController@saveTestTemplate');
    Route::get('/test-template/edit/{id}', 'TestTemplateController@editTestTemplate');
    Route::get('/test-template/delete/{id}', 'TestTemplateController@deleteTestTemplate');
    
    Route::get('/settings',['uses'=>'SettingsController@index']);
    Route::get('/settings/email/update',['uses'=>'SettingsController@getEmailUpdate']);
    Route::get('/settings/password/update',['uses'=>'SettingsController@getPasswordUpdate']);
    Route::post('/settings/email/update',['uses'=>'SettingsController@postEmailUpdate']);
    Route::post('/settings/password/update',['uses'=>'SettingsController@postPasswordUpdate']);

});

// API calls with no access token guarded
Route::group(['prefix' => 'api/v1','middleware' => ['api']], function () {
    Route::post('/userRegister', ['uses'=>'API\AppUserController@userRegister']);
    Route::post('/userLogin', ['uses'=>'API\AppUserController@userLogin']);
    Route::post('/userForgotPassword',['uses'=>'API\AppUserController@userForgotPassword']);
    Route::post('/inspire', ['uses'=>'API\ArtWorkController@inspire']);
    Route::post('/newPosts', ['uses'=>'API\ArtWorkController@newPosts']);
    Route::post('/listCategories', ['uses'=>'API\ArtWorkController@listCategories']);
        
});

// API calls with token guarded
Route::group(['prefix' => 'api/v1','middleware' => ['token_api']], function () {
    Route::post('/userLogout', ['uses'=>'API\AppUserController@userLogout']);
    Route::group(['middleware' => ['blockUser']], function () {
        Route::post('/userProfile', ['uses'=>'API\AppUserController@userProfile']);
        Route::post('/updateProfile', ['uses'=>'API\AppUserController@updateProfile']);
        Route::post('/profilePictureUpdate', ['uses'=>'API\AppUserController@updateProfilePicture']);
        Route::post('/followUser', ['uses'=>'API\AppUserController@followUser']);
        Route::post('/unfollowUser', ['uses'=>'API\AppUserController@unfollowUser']);
        Route::post('/followingList', ['uses'=>'API\AppUserController@listFollowing']);
        Route::post('/followersList', ['uses'=>'API\AppUserController@listFollowers']);
        Route::post('/searchUsers', ['uses'=>'API\AppUserController@searchUsers']);
        Route::post('/otherUserProfile', ['uses'=>'API\AppUserController@otherUserProfile']);
        Route::post('/subscribePackage', ['uses'=>'API\AppUserController@subscribe']);
        Route::post('/subscriptionExpireDate', ['uses'=>'API\AppUserController@subscriptionExpireDate']);
        Route::post('/cancelSubscriptions', ['uses'=>'API\AppUserController@cancelSubscriptions']);

        Route::post('/listTemplates', ['uses'=>'API\ArtWorkController@listTemplates']);
        Route::post('/listTestTemplates', ['uses'=>'API\ArtWorkController@listTestTemplates']);
        Route::post('/uploadPost', ['uses'=>'API\ArtWorkController@postUpload']);
        Route::post('/listArtIdeas', ['uses'=>'API\ArtWorkController@listArtIdeas']);
        Route::post('/getTemplate', ['uses'=>'API\ArtWorkController@getTemplate']);

        Route::post('/listComments', ['uses'=>'API\ArtWorkController@listComments']);
        Route::post('/addComment', ['uses'=>'API\ArtWorkController@addComment']);
        Route::post('/deleteComment', ['uses'=>'API\ArtWorkController@deleteComment']);
        Route::post('/likePost', ['uses'=>'API\ArtWorkController@likePost']);
        Route::post('/addFavouritePost', ['uses'=>'API\ArtWorkController@addFavouritePost']);
        Route::post('/listLikes', ['uses'=>'API\ArtWorkController@listLikes']);
        Route::post('/readLikes', ['uses'=>'API\ArtWorkController@readLikes']);
        Route::post('/readComments', ['uses'=>'API\ArtWorkController@readComments']);
        Route::post('/notificationCount', ['uses'=>'API\ArtWorkController@notificationCount']);
        Route::post('/newComments', ['uses'=>'API\ArtWorkController@newComments']);
        Route::post('/listNewFollowings', ['uses'=>'API\ArtWorkController@listFollowings']);
        Route::post('/readFollowings', ['uses'=>'API\ArtWorkController@readFollowings']);
        Route::post('/favouritePosts', ['uses'=>'API\ArtWorkController@favouritePosts']);
        Route::post('/deletePost', ['uses'=>'API\ArtWorkController@deletePost']);
        Route::post('/timeline', ['uses'=>'API\ArtWorkController@timeline']);
    });
});

Route::group(['prefix' => 'api/v1','middleware' => ['headerRequest']], function () {
    Route::post('/postUpload', ['uses'=>'API\ArtWorkController@uploadPost']);
    Route::post('/updateProfilePicture', ['uses'=>'API\AppUserController@profilePictureUpdate']);
});

