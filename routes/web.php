<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\SpotifyController;

Route::get('/login', [SpotifyController::class, 'login'])->name('spotify.login');
Route::get('/callback', [SpotifyController::class, 'callback']);
Route::get('/spotify-widget', [SpotifyController::class, 'widget'])->name('spotify.widget');

Route::get('/auth/spotify', function () {
    return Socialite::driver('spotify')
        ->scopes(['user-read-email', 'user-read-private', 'streaming'])
        ->redirect();
})->name('spotify.login');

Route::get('/auth/spotify/callback', function () {
    $spotifyUser = Socialite::driver('spotify')->user();

    session(['spotify_access_token' => $spotifyUser->token]);

    return redirect('/home'); 
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/passcode', function () {
    return view('passcode');
});

Route::get('/home', function () {
    return view('home');
});