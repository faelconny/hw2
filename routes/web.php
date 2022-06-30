<?php

    use Illuminate\Support\Facades\Route;

    Route::get('/', function() { return redirect('login'); });

    Route::get('login', 'App\\Http\\Controllers\\LoginController@login')->name('login');
    Route::post('login', 'App\\Http\\Controllers\\LoginController@checkLogin')->name('login-post');
    Route::get('login/check/username/{username}', 'App\\Http\\Controllers\\LoginController@checkUsername');
    Route::get('login/check/email/{email}', 'App\\Http\\Controllers\\LoginController@checkEmail');

    Route::post('signup', 'App\\Http\\Controllers\\LoginController@checkSignup')->name('signup');

    Route::get('home', 'App\\Http\\Controllers\\HomeController@index')->name('home');
    Route::get('home/post', 'App\\Http\\Controllers\\HomeController@getPosts');
    Route::post('home/post/add', 'App\\Http\\Controllers\\HomeController@addPost');
    Route::get('home/like/check', 'App\\Http\\Controllers\\HomeController@getLikes');
    Route::get('home/like/add/{post}', 'App\\Http\\Controllers\\HomeController@addLike');
    Route::get('home/like/remove/{post}', 'App\\Http\\Controllers\\HomeController@removeLike');

    Route::get('picture', 'App\\Http\\Controllers\\ProfilePictureController@index')->name('picture');
    Route::get('picture/api', 'App\\Http\\Controllers\\ProfilePictureController@api');
    Route::get('picture/load/{url}', 'App\\Http\\Controllers\\ProfilePictureController@pictureLoad');

    Route::get('profile', 'App\\Http\\Controllers\\ProfileController@index')->name('profile');
    Route::post('profile', 'App\\Http\\Controllers\\ProfileController@checkChangePassword')->name('profile-post');

    Route::get('favourites', 'App\\Http\\Controllers\\FavouritesController@index')->name('favourites');
    Route::get('favourites/add/movie/{title}/{desc}/{poster}', 'App\\Http\\Controllers\\FavouritesController@addFavourite');
    Route::get('favourites/remove/movie/{movie}', 'App\\Http\\Controllers\\FavouritesController@removeFavourite');
    Route::get('favourites/search/all', 'App\\Http\\Controllers\\FavouritesController@getFavourites');
    Route::get('favourites/search/movie/{movie}', 'App\\Http\\Controllers\\FavouritesController@movieSearch');
    Route::get('favourites/check/movie/{movie}', 'App\\Http\\Controllers\\FavouritesController@movieCheck');

    Route::get('logout', 'App\\Http\\Controllers\\LoginController@logout')->name('logout');

?>