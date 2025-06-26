<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'SUCommunity') }}</title>

  <!-- Fuente institucional -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700;900&display=swap" rel="stylesheet">
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <style>
    body {
      font-family: 'Nunito', sans-serif;
      position: relative;
      background-color: #ffffff;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='140' height='140'%3E%3Ctext x='70' y='100' font-size='120' font-weight='900' fill='%23051B3F' text-anchor='middle'%3E+%3C/text%3E%3C/svg%3E");
      background-repeat: repeat;
    }

    .wave {
      position: absolute;
      width: 400px;
      height: 400px;
      z-index: 0;
      overflow: hidden;
    }

    .bottom-left {
      bottom: 0;
      left: 0;
    }

    .top-right {
      top: 0;
      right: 0;
      transform: rotate(180deg);
    }

    .form-container {
      position: relative;
      z-index: 10;
    }

    .wave svg {
      width: 100%;
      height: 100%;
    }
  </style>
</head>
<body class="min-h-screen flex items-center justify-center px-4 py-12">

  <!-- Esquina inferior izquierda -->
  <div class="wave bottom-left">
    <svg viewBox="0 0 400 400" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,0 C150,100 300,300 400,400 L0,400 Z" fill="#051B3F"/>
      <g stroke="#ffffff" stroke-width="12" opacity="0.4">
        <line x1="60" y1="80" x2="60" y2="160"/>
        <line x1="20" y1="120" x2="100" y2="120"/>
        <line x1="180" y1="40" x2="180" y2="120"/>
        <line x1="140" y1="80" x2="220" y2="80"/>
        <line x1="280" y1="160" x2="280" y2="240"/>
        <line x1="240" y1="200" x2="320" y2="200"/>
        <!-- Nuevas cruces -->
        <line x1="80" y1="240" x2="80" y2="320"/>
        <line x1="40" y1="280" x2="120" y2="280"/>
        <line x1="200" y1="220" x2="200" y2="300"/>
        <line x1="160" y1="260" x2="240" y2="260"/>
        <line x1="320" y1="240" x2="320" y2="320"/>
        <line x1="280" y1="280" x2="360" y2="280"/>
      </g>
    </svg>
  </div>

  <!-- Esquina superior derecha -->
  <div class="wave top-right">
    <svg viewBox="0 0 400 400" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,0 C150,100 300,300 400,400 L0,400 Z" fill="#051B3F"/>
      <g stroke="#ffffff" stroke-width="12" opacity="0.4">
        <line x1="60" y1="80" x2="60" y2="160"/>
        <line x1="20" y1="120" x2="100" y2="120"/>
        <line x1="180" y1="40" x2="180" y2="120"/>
        <line x1="140" y1="80" x2="220" y2="80"/>
        <line x1="280" y1="160" x2="280" y2="240"/>
        <line x1="240" y1="200" x2="320" y2="200"/>
        <!-- Nuevas cruces -->
        <line x1="80" y1="240" x2="80" y2="320"/>
        <line x1="40" y1="280" x2="120" y2="280"/>
        <line x1="200" y1="220" x2="200" y2="300"/>
        <line x1="160" y1="260" x2="240" y2="260"/>
        <line x1="320" y1="240" x2="320" y2="320"/>
        <line x1="280" y1="280" x2="360" y2="280"/>
      </g>
    </svg>
  </div>

  <!-- Formulario -->
  <div class="w-full max-w-md bg-white rounded-lg shadow-md px-6 py-8 form-container">
    {{ $slot }}
  </div>

</body>
</html>
