@extends('layouts.main')
@section('title', 'My Documents')
@section('content')
    <script src="//mozilla.github.io/pdf.js/build/pdf.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/libs/uikit/uikit.css') }}">
    {{--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">--}}
    <div id="app">
        <documents session-data="{{json_encode($session_data)}}"></documents>
    </div>
@stop
@section('scripts')
    <script src="{{asset('assets/libs/uikit/uikit.min.js')}}"></script>
@stop
