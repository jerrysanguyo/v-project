<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SpotifyWebAPI\Session;
use SpotifyWebAPI\SpotifyWebAPI;

class SpotifyController extends Controller
{
    public function login()
    {
        $session = new Session(
            env('SPOTIFY_CLIENT_ID'),
            env('SPOTIFY_CLIENT_SECRET'),
            env('SPOTIFY_REDIRECT_URI')
        );

        $options = [
            'scope' => [
                'user-read-email',
                'user-read-playback-state',
                'user-modify-playback-state',
                'streaming', // ✅ REQUIRED FOR PLAYBACK
                'user-read-currently-playing',
            ],
        ];

        return redirect($session->getAuthorizeUrl($options));
    }

    public function callback(Request $request)
    {
        $session = new Session(
            env('SPOTIFY_CLIENT_ID'),
            env('SPOTIFY_CLIENT_SECRET'),
            env('SPOTIFY_REDIRECT_URI')
        );

        $session->requestAccessToken($request->input('code'));

        // Store tokens in the session
        session([
            'spotify_access_token' => $session->getAccessToken(),
            'spotify_refresh_token' => $session->getRefreshToken(),
        ]);

        return redirect()->route('spotify.widget');
    }

    public function widget()
    {
        return view('home');
    }
}
