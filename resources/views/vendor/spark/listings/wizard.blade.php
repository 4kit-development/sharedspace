@extends('spark::layouts.app')

@section('content')
    <div class="container mx-auto px-4 sm:px-0">
        <form-wizard :listing="{{$listing}}" :addons="{{$addons}}" :amenities="{{$amenities}}" :images="{{$images}}" :tags="{{$tags}}"/>
    </div>
    @push('beforeScripts')
        <script src="https://checkout.stripe.com/checkout.js"></script>
    @endpush
@endsection
