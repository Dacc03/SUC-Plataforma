<?php

namespace App\Services;

use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;
use Illuminate\Support\Facades\File;

class GoogleCalendarService
{
    protected $client;
    protected $calendarService;

    public function __construct()
    {
        $this->client = new Google_Client();
         // Deshabilita la verificación SSL en entornos locales para evitar
                // errores "cURL error 60" cuando el sistema no cuenta con los
                // certificados de autoridad instalados. No debe usarse en producción.
                if (config('app.env') !== 'production') {
                    $this->client->setHttpClient(new \GuzzleHttp\Client(['verify' => false]));
                }
        $credentialsPath = storage_path('app/google-calendar/credentials.json');
        $tokenPath = storage_path('app/google-calendar/token.json');

        $this->client->setAuthConfig($credentialsPath);
        $this->client->addScope(Google_Service_Calendar::CALENDAR);
        $this->client->setAccessType('offline');
        $this->client->setPrompt('select_account consent');

        // Verifica si el token existe
        if (!file_exists($tokenPath)) {
            throw new \Exception('Token de acceso no encontrado. Autenticar primero.');
        }

        $accessToken = json_decode(file_get_contents($tokenPath), true);
        $this->client->setAccessToken($accessToken);

        // Si el token expiró pero tiene refresh_token, intenta renovarlo
        if ($this->client->isAccessTokenExpired()) {
            if ($this->client->getRefreshToken()) {
                $this->client->fetchAccessTokenWithRefreshToken($this->client->getRefreshToken());

                // Guarda el nuevo token actualizado
                File::put($tokenPath, json_encode($this->client->getAccessToken()));
            } else {
                throw new \Exception('Token expirado y sin refresh token disponible. Reautenticación requerida.');
            }
        }

        $this->calendarService = new Google_Service_Calendar($this->client);
    }

    public function crearEvento($datos)
    {
        $evento = new Google_Service_Calendar_Event([
            'summary'     => $datos['titulo'],
            'description' => $datos['descripcion'],
            'start'       => [
                'dateTime' => $datos['inicio'],
                'timeZone' => 'America/Lima',
            ],
            'end'         => [
                'dateTime' => $datos['fin'],
                'timeZone' => 'America/Lima',
            ],
            'attendees'   => $datos['asistentes'],
        ]);

        return $this->calendarService->events->insert('primary', $evento);
    }
}
