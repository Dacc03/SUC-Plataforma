<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Google\Client as GoogleClient;

class GoogleController extends Controller
{
    public function redirect()
    {
        $client = new GoogleClient();
        $client->setAuthConfig(storage_path('app/google-calendar/credentials.json'));
        $client->addScope('https://www.googleapis.com/auth/calendar');
        $client->setRedirectUri(route('google.callback'));
        $client->setAccessType('offline');
        $client->setPrompt('consent');

        $authUrl = $client->createAuthUrl();
        return redirect()->away($authUrl);
    }

    public function callback(Request $request)
    {
        $client = new GoogleClient();
        $client->setAuthConfig(storage_path('app/google-calendar/credentials.json'));
        $client->setRedirectUri(route('google.callback'));

        $token = $client->fetchAccessTokenWithAuthCode($request->get('code'));

        if (isset($token['access_token'])) {
            Storage::put('google-calendar/token.json', json_encode($token));
            return redirect('/')->with('success', 'Autenticado con Google Calendar');
        }

        return redirect('/')->with('error', 'Error al autenticar con Google');
    }
}
