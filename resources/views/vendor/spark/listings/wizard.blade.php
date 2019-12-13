@extends('spark::layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <form-wizard :listing="{{$listing}}" :addons="{{$addons}}" :amenities="{{$amenities}}" :images="{{$images}}" :plans="{{$plans}}" :tags="{{$tags}}"/>
    </div>
    @push('script')
        <script src="https://checkout.stripe.com/checkout.js"></script>
    @endpush
@endsection
