@extends('layouts.template-manage')

@section('custom_css')
<link href="{{ URL::asset('/css/custom/errors.css') }}" rel="stylesheet">
@endsection

@section('t1_content')

<div class="container margin_60_35">
    <div class="center">
        <h1> Opps! Error Occurred</h1>
             
        @if (!empty($exception))
        <div class="alert alert-danger">
        {{ $exception->getMessage() }}
        </div>
        @endif
        
        <img alt="" class='centerImg' src="{{ URL::asset('/image/406.jpg')}}">
    </div>
</div>

@endsection