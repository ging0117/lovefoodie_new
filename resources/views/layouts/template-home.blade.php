@extends('layouts.template')

@section('template_css')
<!-- BASE CSS -->
<link href="{{ URL::asset('/css/base.css') }}" rel="stylesheet">

<!--<link href="{{ URL::asset('/css/bootstrap.min.css') }}" rel="stylesheet">-->
<link href="{{ URL::asset('/css/ie10-viewport-bug-workaround.css') }}" rel="stylesheet">
<link href="{{ URL::asset('/css/carousel.css') }}" rel="stylesheet">
<link href="{{ URL::asset('/css/animate.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('/css/custom/homepagestyle.css') }}" rel="stylesheet">
<link href="{{ URL::asset('/css/bootstrap-social.css') }}" rel="stylesheet">
<link href="{{ URL::asset('/css/style.css') }}" rel="stylesheet">
<link href="{{ URL::asset('/css/w3.css') }}" rel="stylesheet">

<link href="{{ URL::asset('/css/custom/style.css') }}" rel="stylesheet">
<link href="{{ URL::asset('/css/fonts/font-awesome.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('/css/custom/home.css') }}" rel="stylesheet">
<link href="{{ URL::asset('/css/fonts/font-awesome.css') }}" rel="stylesheet">

@yield('custom_css')
@endsection

@section('subheader')
<section class="header-video">
    <div id="hero_video">
        <div id="sub_content">
            <h1>LoveFoodies Takeaway or Delivery Food</h1>
            <div id="row">
                <span style="font-size:0;"></span>
            </div>
            <!--<div id="search-bar-home"></div>-->
        </div><!-- End sub_content -->
    </div>

    <img src="{{ URL::asset('/image/video_fix.png') }}" alt="" class="header-video--media" data-video-src="video/intro" data-teaser-source="video/intro" data-provider="Vimeo" data-video-width="1920" data-video-height="960">

</section><!-- End Header video -->

<div class="home_background">
    <div class="container margin_60 margin_left_position">

        <!-- Three columns of text below the carousel -->
        <div class="marketing_container">

            <div class="w3-container">
                <ul class="w3-navbar" id="updatecolor" align="center">
                    <li><a href="javascript:void(0)" class="tablink changecolor" onclick="openCategory(event, '/dishes/newest');">Newest Dishes</a></li>
                    <li><a href="javascript:void(0)" class="tablink" onclick="openCategory(event, '/dishes/rating');">Best Dishes</a></li>
                    <li><a href="javascript:void(0)" class="tablink" onclick="openCategory(event, '/sellers/rating');">Best Sellers</a></li>
                    <li><a href="javascript:void(0)" class="tablink" onclick="openCategory(event, '/sellers/nearby');">Nearby Sellers</a></li>
                    <li><a href="javascript:void(0)" class="tablink" onclick="openCategory(event, '/wishes');">Wish List</a></li>
                </ul>
                <style>
                    #data-dishes-container {
                        display: flex;
                        flex-wrap: wrap;
                        margin-left: -10px;
                        margin-top: -10px;
                    }
                    .card.card-r {
                        text-align: center;
                        flex: 1 0 257px;
                        box-sizing: border-box;
                        padding: 10px;
                        margin-left: 10px;
                        margin-top: 10px;
                        max-width: 257px;
                        display: inline-block;
                        margin-left: auto;
                        margin-right: auto;
                    }
                    .pageDiv {
                        padding: 10px 0;
                        text-align: center;
                    }
                </style>
                @include('public.home-data')

            </div>
        </div>
        <div style="text-align: center">
<style>
    .left_img, .right_img {
        max-width: 500px;
        padding-right: 10px;
    }
    .left_div, .right_div {
        display: inline-block;
        max-width: 500px;
        vertical-align: top;
        padding-left: 10px;
    }
    @media screen and (max-width: 1200px) {
    .left_div, .right_div {
        max-width: 100%;
        padding: 0;
    }
    .right_div {
        margin-top: 10px;
    }
    .left_img, .right_img {
        max-width: 100%;
    }
</style>
            <div class="left_div">
                <img class="left_img" src="/image/android_qr.png">
            </div>
            <div class="right_div">
                <img class="right_img" src="/image/ios.jpg">
            </div>
        </div>
        <div class="main_title">
            <h2 class="nomargin_top" style="padding-top:0;font-size: 46px;letter-spacing: -1px;font-weight: 300;margin-bottom: 0;color:#333">How it works</h2>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="box_home" id="one" style="background:#fff url(/image/icon_home_1.svg) no-repeat center 40px;">
                    <span>1</span>
                    <h3 style="padding-top:10px">Search by address</h3>
                    <p>
                        Find all restaurants available in your zone.
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box_home" id="two" style="background:#fff url(/image/icon_home_2.svg) no-repeat center 40px;">
                    <span>2</span>
                    <h3 style="padding-top:10px">Choose a seller</h3>
                    <p>
                        We have more than 1000s of menus online.
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box_home" id="three" style="background:#fff url(/image/icon_home_3.svg) no-repeat center 40px;">
                    <span>3</span>
                    <h3 style="padding-top:10px">Pay by card or cash</h3>
                    <p>
                        It's quick, easy and totally secure.
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box_home" id="four" style="background:#fff url(/image/icon_home_4.svg) no-repeat center 40px;">
                    <span>4</span>
                    <h3 style="padding-top:10px">Delivery or takeaway</h3>
                    <p>
                        You are lazy? Are you backing home?
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@include('buyer.location-add-modal')

@endsection


@section('template_js')
<!-- COMMON SCRIPTS -->
<script src="{{ URL::asset('/js/jquery-1.11.2.min.js') }}"></script>
<script src="{{ URL::asset('/js/common_scripts_min.js') }}"></script>
<script src="{{ URL::asset('/js/functions.js') }}"></script>

<!-- Modernizr -->
<script src="{{ URL::asset('/js/modernizr.js') }}"></script>

<!-- SPECIFIC SCRIPTS -->
<script src="{{ URL::asset('/js/video_header.js') }}"></script>
<script src="{{ URL::asset('/js/icon_star.js') }}"></script>

<!-- Seller Add bid modal -->
<script src="{{ URL::asset('/js/custom/seller.bid-add.js') }}"></script>

<script>
$(document).ready(function () {
    'use strict';
    HeaderVideo.init({
        container: $('.header-video'),
        header: $('.header-video--media'),
        videoTrigger: $("#video-trigger"),
        autoPlayVideo: true
    });

    // If no data, get newest dishes
    @if (empty($sellers) && empty($dishes) && empty($wishes))
        //getData('/dishes/newest');
    @endif

    $("#search-input-div").detach().appendTo('#search-bar-home');
});

// Pagination with Ajax
$('body').on('click', '.pagination a', function (e) {
    e.preventDefault();
    $('#load a').css('color', '#dfecf6');
    $('#load').append('<img style="position: absolute; left: 0; top: 0; z-index: 100000;" src="/images/loading.gif" />');

    var url = $(this).attr('href');
    getData(url);
    window.history.pushState("", "", url);
});

var mySpan = $('#row')[0];
console.log(mySpan);
$(window).scroll(function () {
    var docViewTop = $(window).scrollTop();
    var mySpanBottom = $(mySpan).offset().top;
    //console.log(docViewTop);
    //console.log(mySpanBottom);
    if (mySpanBottom < docViewTop) {
        $("#search-input-div").detach().appendTo('#search-bar-top');
    } else {
        $("#search-input-div").detach().appendTo('#search-bar-home');
    }
});
</script>

<script>
function openCategory(evt, URL) {
    var tablinks = document.getElementsByClassName("tablink");
    //console.log(tablinks);
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" changecolor", "");
    }
    evt.currentTarget.className += " changecolor";
    getData(URL);
}

function getData(URL) {
    $.ajax({
        type: 'GET',
        url: URL.startsWith("http")? URL : "{{url('/')}}" + URL,
        data: {_token: "{{ csrf_token() }}", view: 'public.home-data'},
        success: function (data) {
            $('#data-container').hide().html(data).fadeIn();
        },
        error: function(e){
            console.dir(e);
        }
    });
}
</script>
@yield('custom_js')
@endsection
