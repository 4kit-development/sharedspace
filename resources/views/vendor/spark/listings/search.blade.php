@extends('spark::layouts.app')

@section('content')
    <search-listings></search-listings>
    <script src="https://cdn.jsdelivr.net/npm/scriptjs@2.5.9/dist/script.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/algoliasearch@3.32.0"></script>
    <script src="https://cdn.jsdelivr.net/npm/instantsearch.js@4.0.0/dist/instantsearch.production.min.js"></script>
    <script src="/js/search.js" type="module"></script>
@endsection
