@extends('layouts.template-manage')

@section('custom_css')
<!-- Radio and check inputs -->
<link href="{{ URL::asset('/css/skins/square/grey.css')}}" rel="stylesheet">
@endsection

@section('t1_content')
<!-- Content ================================================== -->
<div class="container margin_60_35">
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            <div class="box_style_2">
                <h2 class="inner text-center">Confirm your phone number</h2>
                <div id="confirm">
                    <h4 class="col-md-offset-1 col-md-10">
                        This is a number your seller can contact you during your purchase, <br><br>and so Lovefoodies' seller knows how to reach you.
                    </h4><br><br><br><br><br><br>
                    <i class="icon_mobile"></i><br><br><br>

                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <div class="input-group-addon">+1</div>
                            <input class="form-control" id="phoneNum" placeholder="Enter your Phone Number" required>
                        </div>
                    </div><br><br><br><br>

                    <div class="form-group col-sm-4"></div>
                    <div class="form-group col-sm-4">
                        <button class="btn btn-primary" type="reset">Confirm Phone Number</button>
                    </div><br><br>

                </div>
            </div>
        </div>
    </div><!-- End row -->
</div><!-- End container -->
<!-- End Content =============================================== -->
@endsection