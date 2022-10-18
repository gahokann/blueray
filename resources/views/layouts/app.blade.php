@include('layouts.dev.head')
@include('layouts.dev.header')

<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="{{ asset('css/infodisk.css') }}">

<main class="container">
    @yield('content')
</main>

@include('layouts.dev.end')
