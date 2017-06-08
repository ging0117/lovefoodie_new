@extends('layouts.template-manage')

@section('custom_css')
<!-- Radio and check inputs -->
<link href="{{ URL::asset('/css/skins/square/grey.css')}}" rel="stylesheet">
@endsection

@section('t1_content')
<div id="position">
        <div class="container">
            <ul>
                <li><a href="#0">Home</a></li>
                <li><a href="#0">Category</a></li>
                <li>Page active</li>
            </ul>
        </div>
    </div><!-- Position -->
<!-- Content ================================================== -->
<div class="container margin_60_35">
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            <div class="box_style_2">
                <h2 class="inner text-center">Confirm your Email</h2>
                <div id="confirm">
                    <h4 class="col-md-offset-1 col-md-10">
                        Top the link the email we sent you <br><br>confirming your email address helps us send your dishes' info.
                    </h4><br>
                    <i class="icon-mail"></i><br>

                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                        <input class="form-control" id="name" placeholder="Enter the Verification Code" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div><br><br><br><br>
                    <div class="form-group col-sm-4"></div>
                    <div class="form-group col-sm-4">
                        <button class="btn btn-primary" type="reset">Resend Email</button>
                    </div>                    
                    <div class="col-md-offset-4 col-md-4"><span><a href="#0" style="text-decoration: underline; height: 4em; line-height: 4em; overflow: hidden;">Change Email Address</a></span></div><br><br><br><br>

                </div>
            </div>
        </div>
    </div><!-- End row -->
</div><!-- End container -->
<!-- End Content =============================================== -->
@endsection