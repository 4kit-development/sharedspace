@extends('spark::layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        @include('spark::components.page-title', array('title' => 'Dashboard'))
        <dashboard :listings="{{$listings}}"></dashboard>
    </div>
@endsection()
