@extends('layouts.app')
@section('title')
    Профиль
@endsection
@section('css')
<link href="/css/profile.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="container" style="padding-top: 130px;">
        <h3 class="text-center text-primary">Личный кабинет</h3>
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
                            {{ $data->user->balance }}
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
                        <p id="percent" data-percent="{{ $percent['percent'] }}">
                            {{ $percent['percent'] }} <i class="fa fa-percent"></i>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <div class="offer offer-radius offer-primary">
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
        <div class="row">
            <div class="single-agent col-xs-12 col-lg-6" style="padding-top: 50px;">
                <div class="well">
                    <h3 class="page-title">
                        <em>
                            <h4>{{ $data->name }} {{ $data->last_name }}</h4>
                        </em>
                        <br>
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
                          <span style="float:right" >{{$data->user->balance}} <i class="fa fa-ruble">
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
                          <a style="color: red;" href="{{--{{route('profiles.payments')}}--}}">История платежей</a>
                      <i class="fa fa-cc-mastercard" style="float: right;"></i> </span>

                                    </li>
                                    <li class="list-group-item">
                                        <a href=" /profile/{{$data->user->id}}/edit " style="color: red;">  Редактировать профиль</a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="{{ route('request.create') }}" style="color: red;"> Отставить заявку для первода</a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div >
            <div class="col-lg-6 col-md-6 col-xs-10" style="padding-top: 50px;">
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
            $( "#total-label" ).text($total);

            $('#slider a').html('<label><span class="glyphicon glyphicon-chevron-left"></span> '+$amount+' <span class="glyphicon glyphicon-chevron-right"></span></label>');
            $('#slider2 a').html('<label><span class="glyphicon glyphicon-chevron-left"></span> '+$duration+' <span class="glyphicon glyphicon-chevron-right"></span></label>');
        }
    </script>
@endsection