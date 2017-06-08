@extends('layouts.template')

@section('template_css')
<link href="{{ URL::asset('/css/base.css') }}" rel="stylesheet">
<!--<link href="{{ URL::asset('/css/fonts/font-awesome.min.css') }}" rel="stylesheet">-->
<!--<link href="{{ URL::asset('/css/fontello/css/fontello.css') }}" rel="stylesheet">-->
<link href="{{ URL::asset('/css/custom/manage.css') }}" rel="stylesheet">
@yield('custom_css')
@endsection

@section('subheader')
<!-- SubHeader =============================================== -->
<section class="parallax-window" id="short" data-parallax="scroll" data-image-src="{{ URL::asset('/image/subheader5.png') }}" data-natural-width="1400" data-natural-height="350">
    <div id="subheader">
        <div id="sub_content">
            @yield('subheader_content')
        </div><!-- End sub_content -->
    </div><!-- End subheader -->
</section><!-- End section -->
<!-- End SubHeader ============================================ -->  
@endsection

@section('template_js')
<!-- Scripts -->
<!--<script src="/js/app.js"></script>-->

<!-- Modernizr -->
<!--<script src="{{ URL::asset('/js/modernizr.js') }}"></script>-->

<!--[if lt IE 9]>
    <script src="{{ URL::asset("/js/html5shiv.min.js") }}"></script>
    <script src="{{ URL::asset("/js/respond.min.js") }}"></script>
<![endif]-->

<!-- COMMON SCRIPTS -->
<script src="{{ URL::asset('/js/jquery-1.11.2.min.js') }}"></script>

<!--<script src="{{ URL::asset('/js/jquery-3.1.1.min.js') }}"></script>-->
<script src="{{ URL::asset('/js/common_scripts_min.js') }}"></script>
<script src="{{ URL::asset('/js/functions.js') }}"></script>
<script src="{{ URL::asset('/js/validate.js') }}"></script>
<script src="{{ URL::asset('/js/icon_star.js') }}"></script>

@yield('custom_js')
@endsection
