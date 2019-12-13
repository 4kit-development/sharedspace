<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Information -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <title>@yield('title', config('app.name'))</title>

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet' type='text/css'>

    <!-- CSS -->
    <link href="{{ '/css/app.css' }}" rel="stylesheet">

    <!-- Scripts -->
    @yield('scripts', '')

    <!-- Global Spark Object -->
    <script>
        window.Spark = <?php echo json_encode(array_merge(
            Spark::scriptVariables(), [
                'root' => Request::is('/') ? true : false
            ]
        )); ?>;
    </script>
</head>
<body class="bg-white text-gray-800 font-sans leading-none">
    <div id="spark-app" class="antialiased home" v-cloak>
        <!-- Navigation -->
        @include('spark::navigation.header')

        <!-- Main Content -->
        <main>
            @yield('content')
        </main>

        <!-- Application Level Modals -->
        @if (Auth::check())
            @include('spark::modals.notifications')
            @include('spark::modals.support')
            @include('spark::modals.session-expired')
            @include('spark::modals.add-listing')
        @else
            @include('spark::modals.login')
        @endif


    </div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCGF5uXihz50ftS7EF63uKPoznLBhP5PQo&libraries=places"></script>
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="/js/sweetalert.min.js"></script>
    {{--<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5ce8d8a5edb48510"></script>--}}
    {{--@stack('scripts')--}}
</body>
</html>
