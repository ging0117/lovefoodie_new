@extends('layouts.template-manage')

@section('custom_css')
<link href="{{ URL::asset('/css/custom/errors.css') }}" rel="stylesheet">
@endsection

@section('t1_content')

<div class="container margin_60_35">
    <div class="center">
        <h1> The page you are looking for does not exist!! </h1>
        
        <img alt="" class='centerImg' src="{{ URL::asset('/image/404.jpg')}}">
    </div>
</div>

@endsection