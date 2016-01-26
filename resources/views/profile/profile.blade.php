@extends('layouts.profile_layout')
@section('title')
    Профиль
@endsection
@section('css')
<link href="/css/profile.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="container" style="padding-top: 80px;">


        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        @include('partials.head_profile')

        <div class="row">
            <div class="col-xs-12 col-lg-12" style="padding-top: 50px;">
                <div class="well">
                    <h3 class="page-title">
                        <em>
                            <h4>Добро пожаловать: {{ $data->name }} {{ $data->last_name }}</h4>
                        </em>
                        <hr>
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
                                            <span style="float:right" >{{ $data->user->created_at->format('d.m.Y')}}</span>
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
            </div >

            </div>
        </div>

    </div>
@endsection

