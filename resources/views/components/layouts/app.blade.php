<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ $title ?? 'SEA Catering' }}</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @livewireStyles

</head>

<body class="bg-slate-200 dark:bg-slate-700">
  @livewire('partials.navbar')
  
  <main>
    {{ $slot }}
  </main>
  
  @livewire('partials.footer')
  
  @livewireScripts

</body>

</html>