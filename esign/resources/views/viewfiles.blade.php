@extends('layouts.main')
@section('title', 'Sign Documents')
@section('content')

    <script src="//mozilla.github.io/pdf.js/build/pdf.js"></script>
    <link href="{{asset('assets/libs/jquery-ui/jquery-ui.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/libs/sweetalert/sweetalert.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/style_view.css') }}">
    <div id="app">
        <documents-view file-data="{{json_encode($data)}}"></documents-view>
    </div>
@stop
@section('scripts')

    <script src="{{asset('assets/libs/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{asset('assets/libs/sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{asset('assets/libs/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('js/libs/dom-to-image.min.js')}}"></script>
    <script>// draggable elements
        $(".draggable").draggable();</script>
@stop