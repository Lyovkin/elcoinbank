@extends('layouts.app')
@section('title')
    Профиль
@endsection
@section('css')
<style>
    .shape{
        border-style: solid; border-width: 0 70px 40px 0; float:right; height: 0px; width: 0px;
        -ms-transform:rotate(360deg); /* IE 9 */
        -o-transform: rotate(360deg);  /* Opera 10.5 */
        -webkit-transform:rotate(360deg); /* Safari and Chrome */
        transform:rotate(360deg);
    }
    .offer{
        background:#fff; border:1px solid #ddd; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2); margin: 15px 0; overflow:hidden;
    }
    .offer:hover {
        -webkit-transform: scale(1.1);
        -moz-transform: scale(1.1);
        -ms-transform: scale(1.1);
        -o-transform: scale(1.1);
        transform:rotate scale(1.1);
        -webkit-transition: all 0.4s ease-in-out;
        -moz-transition: all 0.4s ease-in-out;
        -o-transition: all 0.4s ease-in-out;
        transition: all 0.4s ease-in-out;
    }
    .shape {
        border-color: rgba(255,255,255,0) #d9534f rgba(255,255,255,0) rgba(255,255,255,0);
    }
    .offer-radius{
        border-radius:7px;
    }
    .offer-danger {	border-color: #d9534f; }
    .offer-danger .shape{
        border-color: transparent #d9534f transparent transparent;
    }
    .offer-success {	border-color: #5cb85c; }
    .offer-success .shape{
        border-color: transparent #5cb85c transparent transparent;
    }
    .offer-default {	border-color: #999999; }
    .offer-default .shape{
        border-color: transparent #999999 transparent transparent;
    }
    .offer-primary {	border-color: #428bca; }
    .offer-primary .shape{
        border-color: transparent #428bca transparent transparent;
    }
    .offer-info {	border-color: #5bc0de; }
    .offer-info .shape{
        border-color: transparent #5bc0de transparent transparent;
    }
    .offer-warning {	border-color: #f0ad4e; }
    .offer-warning .shape{
        border-color: transparent #f0ad4e transparent transparent;
    }

    .shape-text{
        color:#fff; font-size:12px; font-weight:bold; position:relative; right:-40px; top:2px; white-space: nowrap;
        -ms-transform:rotate(30deg); /* IE 9 */
        -o-transform: rotate(360deg);  /* Opera 10.5 */
        -webkit-transform:rotate(30deg); /* Safari and Chrome */
        transform:rotate(30deg);
    }
    .offer-content{
        padding:0 20px 10px;
    }
    @media (min-width: 487px) {
        .container {
            max-width: 750px;
        }
        .col-sm-6 {
            width: 50%;
        }
    }
    @media (min-width: 900px) {
        .container {
            max-width: 970px;
        }
        .col-md-4 {
            width: 33.33333333333333%;
        }
    }

    @media (min-width: 1200px) {
        .container {
            max-width: 1170px;
        }
        .col-lg-3 {
            width: 25%;
        }
    }
    }
    body {
        padding-top: 50px;
        padding-bottom: 50px;
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

    .ui-slider .ui-slider-handle {
        position: absolute;
        z-index: 2;
        width: 5.2em;
        height: 2.2em;
        cursor: default;
        margin: 0 -40px auto !important;
        text-align: center;
        line-height: 30px;
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
</style>
@endsection

@section('content')
    <div class="container" style="padding-top: 130px;">
        <h3 class="text-center text-primary">Личный кабинет</h3>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
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
                            {{ $data->user->balance }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
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
                            0
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="offer offer-radius offer-primary">
                    <div class="shape">
                        <div class="shape-text">
                            <i class="fa fa-percent"></i>
                        </div>
                    </div>
                    <div class="offer-content">
                        <h3 class="lead">
                            <i class="fa fa-percent"></i> прибыли
                        </h3>
                        <p>
                            0
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="single-agent col-xs-12 col-lg-6" style="padding-top: 50px;">
                <div class="well">
                    <h3 class="page-title">
                        <em>
                            <h4>{{ $data->name }} {{ $data->last_name }}</h4>
                        </em>
                    </h3>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="agent-contact-details">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        @if($data->wallet)
                                            <span style="float:right" >{{ $data->wallet}}</span>
                                        @else
                                            <span style="float:right; "> <a href="/profile/{{$data->user->id}}/edit" style="color:red;">Укажите кошелек</a></span>
                                        @endif
                                        Elcoin - кошелек
                                    </li>
                                    <li class="list-group-item">
                                        @if($data->phone)
                                            <span style="float:right" >{{ $data->phone}}</span>
                                        @else
                                            <span style="float:right"> <a href="/profile/{{$data->user->id}}/edit" style="color:red;">Укажите телефон</a></span>
                                        @endif
                                        Телефон
                                    </li>
                                    <li class="list-group-item">

                                        <span style="float:right" >{{ $data->user->email}}</span>
                                        Почта
                                    </li>
                                    <li class="list-group-item">
                          <span style="float:right" >{{$data->user->balance}} <i class="fa fa-btc">
                              </i></span>
                                        Ваш баланс
                                    </li>
                                    <li class="list-group-item">
                                            <span style="float:right" >{{ $data->user->created_at->format('d.m.Y')}}</span>
                                        Дата регистрации
                                    </li>

                                    <li class="list-group-item">
                                        <span style="float:right" >{{ $data->about}}</span>
                                        Обо мне
                                    </li>
                                    <li class="list-group-item">
                  <span>
                          <a style="color: #000;" href="{{--{{route('profiles.payments')}}--}}">История платежей</a>
                      <i class="fa fa-cc-mastercard" style="float: right;"></i> </span>

                                    </li>
                                    <li class="list-group-item">
                                        <a href=" /profile/{{$data->user->id}}/edit " style="color: #000;">  Редактировать профиль</a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div >
            <div class="col-lg-6 col-md-6 col-xs-12" style="padding-top: 50px;">
                <div class="price-box">

                    <form class="form-horizontal form-pricing" role="form">

                        <div class="price-slider">
                            <h4 class="great">Amount</h4>
                            <span>Minimum $30 is required</span>
                            <div class="col-sm-12">
                                <div id="slider"></div>
                            </div>
                        </div>
                        <div class="price-slider">
                            <h4 class="great">Duration</h4>
                            <span>Minimum 1 week is required</span>
                            <div class="col-sm-12">
                                <div id="slider2"></div>
                            </div>
                        </div>

                        <div class="price-form">

                            <div class="form-group">
                                <label for="amount" class="col-sm-6 control-label">Amount ($): </label>
                                <span class="help-text">Please choose your amount</span>
                                <div class="col-sm-6">
                                    <input type="hidden" id="amount" class="form-control">
                                    <p class="price lead" id="amount-label"></p>
                                    <span class="price">.00</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="duration" class="col-sm-6 control-label">Duration: </label>
                                <span class="help-text">Choose your timeline</span>
                                <div class="col-sm-6">
                                    <input type="hidden" id="duration" class="form-control">
                                    <p class="price lead" id="duration-label"></p>
                                    <span class="price">week(s)</span>
                                </div>
                            </div>
                            <hr class="style">
                            <div class="form-group total">
                                <label for="total" class="col-sm-6 control-label"><strong>Estimated Total: </strong></label>
                                <span class="help-text">(Amount * Weeks)</span>
                                <div class="col-sm-6">
                                    <input type="hidden" id="total" class="form-control">
                                    <p class="price lead" id="total-label"></p>
                                    <span class="price">.00</span>
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Proceed <span class="glyphicon glyphicon-chevron-right pull-right" style="padding-right: 10px;"></span></button>
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
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#slider").slider({
                animate: true,
                value:1,
                min: 30,
                max: 1500,
                step: 30,
                slide: function(event, ui) {
                    update(1,ui.value); //changed
                }
            });

            $("#slider2").slider({
                animate: true,
                value:0,
                min: 1,
                max: 7,
                step: 1,
                slide: function(event, ui) {
                    update(2,ui.value); //changed
                }
            });

            //Added, set initial value.
            $("#amount").val(30);
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

            /* commented
             $amount = $( "#slider" ).slider( "value" );
             $duration = $( "#slider2" ).slider( "value" );
             */

            $total = "$" + ($amount * $duration);
            $( "#amount" ).val($amount);
            $( "#amount-label" ).text($amount);
            $( "#duration" ).val($duration);
            $( "#duration-label" ).text($duration);
            $( "#total" ).val($total);
            $( "#total-label" ).text($total);

            $('#slider a').html('<label><span class="glyphicon glyphicon-chevron-left"></span> '+$amount+' <span class="glyphicon glyphicon-chevron-right"></span></label>');
            $('#slider2 a').html('<label><span class="glyphicon glyphicon-chevron-left"></span> '+$duration+' <span class="glyphicon glyphicon-chevron-right"></span></label>');
        }
    </script>
@endsection