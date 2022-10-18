@include('layouts.dev.head')
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="{{ asset('css/infodisk.css') }}">
@include('layouts.dev.header')

@yield('content')

@include('layouts.dev.end')
