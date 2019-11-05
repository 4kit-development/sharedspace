@extends('spark::layouts.app')

@section('content')
    <show-listing :listing="{{ $listing }}"></show-listing>
    <similar :similar="{{ $similar  }}"></similar>
@endsection
