@extends('layouts.profile_layout')
@section('title')
    Профиль
@endsection
@section('css')
<link href="/css/profile.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    <div style="margin-left: 20px; margin-right: 20px;" >
        @if (Session::has('message'))
            <div class="alert alert-danger">{{ Session::get('message') }}</div>
        @endif
        <div class="row">
            <div class="col-xs-12 col-lg-12">
                <div class="col-md-6">
                    <p class="h3" style="margin-bottom: 20px;"> <i class="fa fa-money"> </i> Курсы валют  </p>
                    <div class="table table-hover shadow">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Валюта</th>
                                <th>Продажа</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($courses as $course)
                            <tr>
                                <td>Elcoin / {{ $course->currency->name }}</td>
                                <td>{{ $course->course_purchase + 0}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <p class="h3" style="margin-bottom: 20px;"> <i class="fa fa-bar-chart"> </i> Рассчет прибыли при вкладе  </p>
                    <div class="form-calc" style="margin-top: 60px;">
                        <label for="form-calc">Для рассчета вклада введите количество элькоинов</label>
                        <input type="text" id="form-calc" style="width: 255px;">
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="text-center h3">Инвест-план: "Пополнение баланса Elcoin"</p>
                            </div>
                            <div class="row">
                                @foreach($plans1 as $plan)
                                    <div class="col-md-4" style="margin-top: 8px;">
                                        <div class="pricing-table">
                                            <div class="panel panel-primary" style="border: none;">
                                                <div class="controle-header panel-heading panel-heading-landing">
                                                    <h1 class="panel-title panel-title-landing">
                                                        Процент вклада: <span class="percent">{{ $plan->percent }}</span> %
                                                        Количество дней: <span class="days">{{ $plan->days }}</span>
                                                    </h1>
                                                </div>
                                                <div class="panel-body panel-body-landing" style="padding-top: 0; display: none;
                                                padding-bottom: 3px;">
                                                    <table class="table" style="margin-bottom: 0">
                                                        <tr>
                                                            <td width="50px"><i class="fa fa-money"></i> </td>
                                                            <td class="all"></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <br />
                            <div class="col-md-12">
                                <p class="text-center h3">Инвест-план: "Покупка Elcoin"</p>
                            </div>
                            <div class="row">
                                @foreach($plans2 as $plan)
                                    <div class="col-md-4">
                                        <div class="pricing-table">
                                            <div class="panel panel-primary" style="border: none;">
                                                <div class="controle-header panel-heading panel-heading-landing">
                                                    <h1 class="panel-title panel-title-landing">
                                                        Процент вклада: <span class="percent">{{ $plan->percent }}</span> %
                                                        Количество дней: <span class="days">{{ $plan->days }}</span>
                                                    </h1>
                                                </div>
                                                <div class="panel-body panel-body-landing" style="padding-top: 0; display: none;
                                                padding-bottom: 3px;">
                                                    <table class="table" style="margin-bottom: 0">
                                                        <tr>
                                                            <td width="50px"><i class="fa fa-money"></i></td>
                                                            <td class="all"></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(function(){
            $('#form-calc').change(function() {

                var total = [];
                var amount = $(this).val();
                var percents = $(".percent").map(function(){
                    return $.trim($(this).text());
                }).get();
                var days = $(".days").map(function(){
                    return $.trim($(this).text());
                }).get();

                for (var i = 0; i < percents.length; i++) {
                    total.push(((amount * ((percents[i] / days[i])) / 100) * days[i]) + parseInt(amount));
                }

                $('.all').each(function(i) {
                    $('.panel-body-landing').css({'display':'block'});
                    $(this).text('Общая прибыль: ' + total[i].toFixed(20).slice(0,-18) + ' EL');
                })

            });
        });
    </script>
@endsection


