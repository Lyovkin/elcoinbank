@extends('layouts.profile_layout')

@section('title')
    Калькулятор
@endsection

@section('css')
    <link href="/css/profile.css" rel="stylesheet" type="text/css" />
    <link href="/css/custom.css" rel="stylesheet">

@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-xs-12" style="padding-top: 130px;">
                <div class="row text-center">
                    <h3>Планы вкладов</h3>
                </div>
                <div class="row db-padding-btm db-attached">
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <div class="db-wrapper">
                            <div class="db-pricing-eleven db-bk-color-one">
                                <div class="price">
                                    <sup></sup>#
                                    <small>элькоинов</small>
                                </div>
                                <div class="type">
                                    SMALL
                                </div>
                                <ul>

                                    <li><i class="fa fa-percent"></i># процентов</li>
                                    <li><i class="fa fa-calendar-times-o"></i>Легкий старт</li>
                                    <li><i class="fa fa-money"></i>Небольшой заработок</li>
                                </ul>
                                <div class="pricing-footer">

                                    <a href="#" class="btn db-button-color-square btn-lg">Заказать</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <div class="db-wrapper">
                            <div class="db-pricing-eleven db-bk-color-two popular">
                                <div class="price">
                                    <sup></sup>#
                                    <small>элькоинов</small>
                                </div>
                                <div class="type">
                                    MEDIUM
                                </div>
                                <ul>

                                    <li><i class="fa fa-percent"></i># процентов</li>
                                    <li><i class="fa fa-calendar-times-o"></i>Отличный старт</li>
                                    <li><i class="fa fa-money"></i>Хороший заработок</li>
                                </ul>
                                <div class="pricing-footer">

                                    <a href="#" class="btn db-button-color-square btn-lg">Заказать</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <div class="db-wrapper">
                            <div class="db-pricing-eleven db-bk-color-three">
                                <div class="price">
                                    <sup></sup>#
                                    <small>элькоинов</small>
                                </div>
                                <div class="type">
                                    ADVANCE
                                </div>
                                <ul>

                                    <li><i class="fa fa-percent"></i># процентов</li>
                                    <li><i class="fa fa-calendar-times-o"></i>Великолепный старт</li>
                                    <li><i class="fa fa-money"></i>Большой заработок</li>
                                </ul>
                                <div class="pricing-footer">

                                    <a href="#" class="btn db-button-color-square btn-lg">Заказать</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



@endsection

