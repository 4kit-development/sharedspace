@extends('spark::layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <account :user="user" :listings="{{$listings}}"></account>
    </div>
@endsection()
