<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google_Client;
use Google_Service_Calendar;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;


class GoogleCalendarAuthController extends Controller
{
    /**
     * Redirige al usuario a la pantalla de autorización de Google.
     */
    public function redirect()
    {
        $client = new \Google_Client();
        $client->setAuthConfig(storage_path('app/google-calendar/credentials.json'));
        $client->addScope(\Google_Service_Calendar::CALENDAR);
        $client->setAccessType('offline');
        $client->setPrompt('select_account consent');
        $client->setRedirectUri(route('google.callback'));

        // Solo para entorno local, desactiva validación SSL (⚠️ no usar en producción)
        $client->setHttpClient(new \GuzzleHttp\Client(['verify' => false]));

        return redirect($client->createAuthUrl());
    }


    /**
     * Maneja el callback de Google y guarda el token de acceso.
     */
    public function callback()
    {
        $client = new Google_Client();
        $client->setAuthConfig(storage_path('app/google-calendar/credentials.json'));
        $client->addScope(Google_Service_Calendar::CALENDAR);
        $client->setAccessType('offline');
        $client->setPrompt('select_account consent');
        $client->setRedirectUri(route('google.callback'));

        // Solo para pruebas locales
        $client->setHttpClient(new \GuzzleHttp\Client(['verify' => false]));

        if (request()->has('code')) {
            $token = $client->fetchAccessTokenWithAuthCode(request('code'));

            if (!isset($token['error'])) {
                $tokenPath = storage_path('app/google-calendar/token.json');
                \Illuminate\Support\Facades\File::put($tokenPath, json_encode($token));
                return redirect('/')->with('success', 'Token generado correctamente.');
            }

            return redirect('/')->with('error', 'Error al obtener token: ' . $token['error_description']);
        }

        return redirect('/')->with('error', 'No se proporcionó código de autorización.');
    }

}
