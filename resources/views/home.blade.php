@extends('spark::layouts.app')

@section('content')

    <header class="flex flex-col h-screen justify-center items-center relative text-center">
        <h1 class="mb-2 z-10 mt-8 mb-2 pt-8 sm:mt-32 sm:pt-20 sm:w-3/4">Connect with spaces to <b class="font-bold">work</b>, <b class="font-bold">meet</b> or <b class="font-bold">play</b></h1>
        @include('spark::components.advanced-listing-search')
        <img src="/img/sharedspace-home-screen.png"
             srcset="/img/sharedspace-home-screen.png 2000w,
             /img/sharedspace-home-screen.png?w=1800 1800w,
             /img/sharedspace-home-screen.png?w=1600 1600w,
             /img/sharedspace-home-screen.png?w=1400 1400w,
             /img/sharedspace-home-screen.png?w=1200 1200w,
             /img/sharedspace-home-screen.png?w=1000 1000w,
             /img/sharedspace-home-screen.png?w=800 800w,
             /img/sharedspace-home-screen.png?w=600 600w,
             /img/sharedspace-home-screen.png?w=400 400w,
             /img/sharedspace-home-screen.png?w=200 200w"
             class="absolute block h-full w-full fit-cover z-0">
    </header>
    <section class="relative flex flex-col items-center pt-16 pb-32">

    </section>

@endsection
