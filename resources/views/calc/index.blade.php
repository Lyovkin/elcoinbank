@extends('layouts.profile_layout')

@section('title')
    Калькулятор
@endsection

@section('css')
    <link href="/css/profile.css" rel="stylesheet" type="text/css" />
    <style>
        body {

        }

        .price-box {
            margin: 0 auto;
            background: #E9E9E9;
            border-radius: 10px;
            padding: 40px 15px;
            width: 500px;
        }

        .ui-widget-content {
            border: 1px solid #bdc3c7;
            background: #e1e1e1;
            color: #222222;
            margin-top: 4px;
        }

        .ui-state-default, .ui-widget-content .ui-state-default{
            background:transparent !important;
            border:none !important;
        }
        .ui-slider .ui-slider-handle label{
            background: #428bca;
            border-radius: 20px;
            width:5.2em;
        }

        .ui-slider .ui-slider-handle {
            position: absolute;
            z-index: 2;
            width: 5.2em;
            height: 100px;
            cursor: default;
            margin: 0 -40px auto !important;
            text-align: center;
            line-height: 35px;
            color: #FFFFFF;
            font-size: 15px;

        }

        .ui-slider .ui-slider-handle .glyphicon {
            color: #FFFFFF;
            margin: 0 3px;
            font-size: 11px;
            opacity: 0.5;
        }

        .ui-corner-all {
            border-radius: 20px;
        }

        .ui-slider-horizontal .ui-slider-handle {
            top: -.9em;
        }

        .ui-state-default,
        .ui-widget-content .ui-state-default {
            border: 1px solid #f9f9f9;
            background: #3498db;
        }

        .ui-slider-horizontal .ui-slider-handle {
            margin-left: -0.5em;
        }

        .ui-slider .ui-slider-handle {
            cursor: pointer;
        }

        .ui-slider a,
        .ui-slider a:focus {
            cursor: pointer;
            outline: none;
        }

        .price, .lead p {
            font-weight: 600;
            font-size: 32px;
            display: inline-block;
            line-height: 60px;
        }

        h4.great {
            background: #00ac98;
            margin: 0 0 25px -60px;
            padding: 7px 15px;
            color: #ffffff;
            font-size: 18px;
            font-weight: 600;
            border-radius: 5px;
            display: inline-block;
            -moz-box-shadow:    2px 4px 5px 0 #ccc;
            -webkit-box-shadow: 2px 4px 5px 0 #ccc;
            box-shadow:         2px 4px 5px 0 #ccc;
        }

        .total {
            border-bottom: 1px solid #7f8c8d;
            /*display: inline;
            padding: 10px 5px;*/
            position: relative;
            padding-bottom: 20px;
        }

        .total:before {
            content: "";
            display: inline;
            position: absolute;
            left: 0;
            bottom: 5px;
            width: 100%;
            height: 3px;
            background: #7f8c8d;
            opacity: 0.5;
        }

        .price-slider {
            margin-bottom: 70px;
        }

        .price-slider span {
            font-weight: 200;
            display: inline-block;
            color: #7f8c8d;
            font-size: 13px;
        }

        .form-pricing {
            background: #ffffff;
            padding: 20px;
            border-radius: 4px;
        }

        .price-form {
            background: #ffffff;
            margin-bottom: 10px;
            padding: 20px;
            border: 1px solid #eeeeee;
            border-radius: 4px;
            /*-moz-box-shadow:    0 5px 5px 0 #ccc;
              -webkit-box-shadow: 0 5px 5px 0 #ccc;
              box-shadow:         0 5px 5px 0 #ccc;*/
        }

        .form-group {
            margin-bottom: 0;
        }

        .form-group span.price {
            font-weight: 200;
            display: inline-block;
            color: #7f8c8d;
            font-size: 14px;
        }

        .help-text {
            display: block;
            margin-top: 32px;
            margin-bottom: 10px;
            color: #737373;
            position: absolute;
            /*margin-left: 20px;*/
            font-weight: 200;
            text-align: right;
            width: 188px;
        }

        .price-form label {
            font-weight: 200;
            font-size: 21px;
        }

        img.payment {
            display: block;
            margin-left: auto;
            margin-right: auto
        }

        .ui-slider-range-min {
            background: #2980b9;
        }

        /* HR */

        hr.style {
            margin-top: 0;
            border: 0;
            border-bottom: 1px dashed #ccc;
            background: #999;
        }
        }
    </style>

@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-xs-12" style="padding-top: 80px;">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="offer offer-default">
                            <div class="shape">
                                <div class="shape-text">
                                    <i class="fa fa-money"></i>
                                </div>
                            </div>
                            <div class="offer-content">
                                <h3 class="lead">
                                    Ваш баланс
                                </h3>
                                <p>
                                    {{ Auth::user()->balance }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="offer offer-success">
                            <div class="shape">
                                <div class="shape-text">
                                    <i class="fa fa-users"></i>
                                </div>
                            </div>
                            <div class="offer-content">
                                <h3 class="lead">
                                    Участников
                                </h3>
                                <p>
                                    {{ $user_count }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="offer offer-primary">
                            <div class="shape">
                                <div class="shape-text">
                                    <i class="fa fa-percent"></i>
                                </div>
                            </div>
                            <div class="offer-content">
                                <h3 class="lead">
                                    <i class="fa fa-percent"></i> прибыли
                                </h3>
                                <p id="percent" data-percent="{{ $percent['percent'] }}">
                                    {{ $percent['percent'] }} <i class="fa fa-percent"></i>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="offer offer-success">
                            <div class="shape">
                                <div class="shape-text">
                                    <i class="fa fa-diamond"></i>
                                </div>
                            </div>
                            <div class="offer-content">
                                <h3 class="lead">
                                    Курс 1 elcoin
                                </h3>
                                <p id="course" data-course="{{ $course['course'] }}">
                                    {{ $course['course'] }} <i class="fa fa-ruble"></i>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-10 col-lg-offset-3" style="padding-top: 20px;">
                    <div class="price-box">

                        <form class="form-horizontal form-pricing" role="form">

                            <div class="price-slider">
                                <h4 class="great">Сумма взноса</h4>
                                <span>Минимум </i> 1 elcoin</span>
                                <div class="col-sm-12">
                                    <div id="slider"></div>
                                </div>
                            </div>
                            <div class="price-slider">
                                <h4 class="great">Дней </h4>
                                <span></span>
                                <div class="col-sm-12">
                                    <div id="slider2"></div>
                                </div>
                            </div>

                            <div class="price-form">

                                <div class="form-group">
                                    <label for="amount" class="col-sm-6 control-label">Взнос ( elcoin ): </label>
                                    <span class="help-text">Общая сумма взноса</span>
                                    <div class="col-sm-6">
                                        <input type="hidden" id="amount" class="form-control">
                                        <p class="price lead" id="amount-label"></p>
                                    <span class="price">.00 <span> = </span><span id="convert" style="font-size: 23px;"></span>
                                        <i class="fa fa-ruble"></i> </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="duration" class="col-sm-6 control-label">Дней: </label>
                                    <span class="help-text">Количество дней</span>
                                    <div class="col-sm-6">
                                        <input type="hidden" id="duration" class="form-control">
                                        <p class="price lead" id="duration-label"></p>
                                        <span class="price"> день</span>
                                    </div>
                                </div>
                                <hr class="style">
                                <div class="form-group total">
                                    <label for="total" class="col-sm-6 control-label"><strong>Зароботок: </strong></label>
                                    <span class="help-text">(Взнос + (<i class="fa fa-percent"></i> * дней ))</span>
                                    <div class="col-sm-6">
                                        <input type="hidden" id="total" class="form-control">
                                        <p class="price lead" id="total-label"></p>
                                        <span class="price">.00 <i class="fa fa-ruble"></i> </span>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

@section('js')
    <script src="http://code.jquery.com/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#slider").slider({
                animate: true,
                value:1,
                min: 1,
                max: 1500,
                step: 1,
                slide: function(event, ui) {
                    update(1,ui.value); //changed
                }
            });

            $("#slider2").slider({
                animate: true,
                value:1,
                min: 1,
                max: 100,
                step: 1,
                slide: function(event, ui) {
                    update(2,ui.value); //changed
                }
            });

            //Added, set initial value.
            $("#amount").val(1);
            $("#duration").val(1);
            $("#amount-label").text(0);
            $("#duration-label").text(0);

            update();
        });

        //changed. now with parameter
        function update(slider,val) {
            //changed. Now, directly take value from ui.value. if not set (initial, will use current value.)
            var $amount = slider == 1?val:$("#amount").val();
            var $duration = slider == 2?val:$("#duration").val();
            var percent = $('#percent').data('percent');
            var course = $('#course').data('course');

            $convert = course * parseInt($amount);

            /* commented
             $amount = $( "#slider" ).slider( "value" );
             $duration = $( "#slider2" ).slider( "value" );
             */

            $total =  (parseInt(course) * (parseInt($amount) +  (parseInt($duration) * percent)));
            $( "#convert" ).text($convert);
            $( "#amount" ).val($amount);
            $( "#amount-label" ).text($amount);
            $( "#duration" ).val($duration);
            $( "#duration-label" ).text($duration);
            $( "#total" ).val($total);
            $( "#total-label" ).text($total.toFixed(2));

            $('#slider a').html('<label><span class="glyphicon glyphicon-chevron-left"></span> '+$amount+' <span class="glyphicon glyphicon-chevron-right"></span></label>');
            $('#slider2 a').html('<label><span class="glyphicon glyphicon-chevron-left"></span> '+$duration+' <span class="glyphicon glyphicon-chevron-right"></span></label>');
        }
    </script>
@endsection