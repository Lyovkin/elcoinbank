@extends('layouts.profile_layout')
@section('title')
    Профиль
@endsection
@section('css')
<link href="/css/profile.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div style="padding-top: 80px;margin-left: 20px; margin-right: 20px;" >
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
                                <th>Валюта <i class="fa fa-btc"></i> </th>
                                <th>Продажа <i class="fa fa-minus"></i> </th>
                                <th>Покупка <i class="fa fa-plus"></i> </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($courses as $course)
                            <tr>
                                <td>Elcoin / {{ $course->currency->name }}</td>
                                @if($course->currency->name != 'Bitcoin BTC')
                                    <td>{{ substr($course->course_purchase, 0, 4) }}</td>
                                    <td>{{ substr($course->course_sell, 0, 4) }}</td>
                                @else
                                    <td>{{ $course->course_purchase }}</td>
                                    <td>{{ $course->course_sell }}</td>
                                @endif
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <p class="h3" style="margin-bottom: 20px;"><i class="fa fa-list-ul"></i> Профиль {{ $profile->user->name }} </p>
                    <div class="well shadow">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="agent-contact-details">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            @if($profile->wallet->wallet)
                                                <span style="float:right" >{{ $profile->wallet->wallet}}</span>
                                            @else
                                                <span style="float:right; "> <a href="/profile/{{$profile->user->id}}/edit" style="color:red;">Укажите кошелек</a></span>
                                            @endif
                                            Elcoin - кошелек <i class="fa fa-credit-card-alt"></i>
                                        </li>
                                        <li class="list-group-item">
                                            @if($profile->phone)
                                                <span style="float:right" >{{ $profile->phone}}</span>
                                            @else
                                                <span style="float:right"> <a href="/profile/{{$profile->user->id}}/edit" style="color:red;">Укажите телефон</a></span>
                                            @endif
                                            Телефон <i class="fa fa-phone"></i>
                                        </li>
                                        <li class="list-group-item">

                                            <span style="float:right" >{{ $profile->user->email}}</span>
                                            Почта <i class="fa fa-envelope-o"></i>
                                        </li>
                                        <li class="list-group-item"><span style="float:right" >{{$profile->user->balance}} элькоинов </span>
                                            Ваш баланс <i class="fa fa-btc"></i>
                                        </li>
                                        <li class="list-group-item">
                                            <span style="float:right" >{{ $profile->user->created_at}}</span>
                                            Дата регистрации <i class="fa fa-calendar"></i>
                                        </li>

                                        <li class="list-group-item">
                                            <span style="float:right" >{{ $profile->about}}</span>
                                            Обо мне <i class="fa fa-user"></i>
                                        </li>

                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

