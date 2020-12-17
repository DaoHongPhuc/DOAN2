<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'Home@index');

Route::get('login','Login@index')->name('login');
Route::post('login','Login@post')->name('login');

Route::get('register','Register@index')->name('register');
Route::post('register','Register@post')->name('register');

Route::get('post/{slug}', 'Home@detailPost');

Route::get('homedocument', 'Home@homedocument')->name('homedocument');
Route::get('document/{slug}', 'Home@detailDocument');

Route::group(['prefix' => 'dashboard','middleware' => 'dashboard'], function () {
    // view admin

        //categories
        Route::get('/', 'Dashboard@index')->name('dashboard');
        Route::get('listcategory', 'Category@index')->name('listcategory');
        Route::get('listcategories', 'Category@listcategories')->name('listcategories');
        Route::post('addCategory', 'Category@addCategory')->name('addCategory');
        Route::post('deleteCategories', 'Category@deleteCategories')->name('deleteCategories');

        //level
        Route::get('listlevel', 'levelController@index')->name('listlevel');
        Route::get('listlevels', 'levelController@listlevels')->name('listlevels');
        Route::post('addLevel', 'levelController@addLevel')->name('addLevel');
        Route::post('deleteLevel', 'levelController@deleteLevel')->name('deleteLevel');

        //post
        Route::get('listwaitingpost','Post@listwaitingpost')->name('listwaitingpost');

        //document
        Route::get('newdocument', 'documentController@newdocument')->name('newdocument');
        Route::post('postnewdocument', 'documentController@postnewdocument')->name('postnewdocument');
        Route::get('listalldocument', 'documentController@index')->name('listalldocument');
        Route::get('listwaitingdocument', 'documentController@listwaitingdocument')->name('listwaitingdocument');


        Route::get('listdocument', 'documentController@listdocument')->name('listdocument');
    // view admin

    // view member
    
    Route::get('myinformation', 'myInformation@myinformation')->name('myinformation');
    Route::post('myinformation', 'myInformation@updatemyinformation')->name('myinformation');

    Route::get('newpost', 'Post@newpost')->name('newpost');
    Route::post('addnewpost', 'Post@addnewpost')->name('addnewpost');
    Route::post('deletePost', 'Post@deletePost')->name('deletePost');

    Route::get('listallpost','Post@listallpost')->name('listallpost');
    Route::get('mylistpost','Post@mylistpost')->name('mylistpost');

    Route::get('listuser','Category@listuser')->name('listuser');

    Route::get('chat','chatController@index')->name('chat');

    Route::post('addContact', 'contactController@addContact')->name('addContact');
    Route::get('checkContact', 'contactController@checkContact')->name('checkContact');


    //message 
    Route::get('getmessage', 'chatController@getmessage')->name('getmessage');
    Route::get('getcontact', 'chatController@getcontact')->name('getcontact');
    Route::post('deleteContact', 'chatController@deleteContact')->name('deleteContact');
    Route::post('deleteMessage', 'chatController@deleteMessage')->name('deleteMessage');
    
    Route::post('sendmessage', 'chatController@sendmessage')->name('sendmessage');
    


    

});
//test

//test

Route::get('logout', function () {
    if(Auth::check()){
        $user = \App\User::find(Auth::user()->id);
        $user->isActive = 0;
        $user->save();
        Auth::logout();
        return redirect('login');
    }
})->name('logout');
