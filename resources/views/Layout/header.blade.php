<!DOCTYPE html>
<!-- <html lang="en" dir="ltr">  -->
    {{-- {{ app()->getLocale() }}" dir="{{ session('body_direction')['direction'] }} --}}
<html lang="{{ app()->getLocale() }}" dir="{{ session('body_direction')['direction'] }}">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link  rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@300..700&
    family=IBM+Plex+Sans+Arabic:wght@100;200;300;400;500;600;700&family=Roboto:ital,
    wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Rubik:ital,
    wght@0,300..900;1,300..900&family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap">

    <link rel="shortcut icon" href="{{ url('storage/icons/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css'])
    <title>@yield('title')</title>
  </head>
  {{-- <body class="{{ session('body_direction')['body_class'] }}"> --}}
    <body class="{{ app()->getLocale() =='en' ? 'ltr':'rtl' }}">
    <div style="background-image: {{ url('public/storage/assets/bgMkany.png') }}; background-size: cover; background-position: center; width: 100%; height: 100%;">
