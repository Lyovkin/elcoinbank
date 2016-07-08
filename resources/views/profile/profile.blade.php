@extends('layouts.profile_layout')
@section('title')
    Профиль
@endsection
@section('css')
<link href="/css/profile.css" rel="stylesheet" type="text/css" />
    <style>
        .shadow {
            -webkit-box-shadow: -2px 2px 42px 0px rgba(0,0,0,0.75);
            -moz-box-shadow: -2px 2px 42px 0px rgba(0,0,0,0.75);
            box-shadow: -2px 2px 42px 0px rgba(0,0,0,0.75);
            background-color: white;
        }
    </style>
@endsection

@section('content')
    <div class="container" style="padding-top: 80px;">

        @if (Session::has('message'))
            <div class="alert alert-danger">{{ Session::get('message') }}</div>
        @endif

        {{--@include('partials.head_profile')--}}

        <div class="row">
            <div class="col-xs-12 col-lg-12" style="padding-top: 50px;">
                <div class="col-md-6">
                    <div class="table table-hover shadow">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Валюта</th>
                                <th>Продажа</th>
                                <th>Покупка</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($courses as $course)
                            <tr>
                                <td>Elcoin / {{ $course->currency->name }}</td>
                                <td>{{ $course->course_purchase }}</td>
                                <td>{{ $course->course_sell }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="well shadow">
                        <h3 class="page-title">
                            <em>
                                <p class="h4">Добро пожаловать: {{ $data->name }} {{ $data->last_name }}</p>
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
                          <span style="float:right" >{{$data->user->balance}} elcoins
                              </span>
                                            Ваш баланс
                                        </li>
                                        <li class="list-group-item">
                                            <span style="float:right" >{{ $data->user->created_at}}</span>
                                            Дата регистрации
                                        </li>

                                        <li class="list-group-item">
                                            <span style="float:right" >{{ $data->about}}</span>
                                            Обо мне
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

