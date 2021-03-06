@extends('layouts.profile_layout')
@section('title')
    Профиль
@endsection
@section('css')
    <link href="/css/profile.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div style="padding-top: 50px;margin-left: 20px; margin-right: 20px;" >
        <div class="container">
            <div class="row">
                @if (Session::has('message'))
                    <div class="alert alert-danger">{{ Session::get('message') }}</div>
                @endif
                <div class="col-xs-12 col-lg-12">
                    <div class="col-md-12">
                        <p class="h3" style="margin-bottom: 20px;"><i class="fa fa-list-ul"></i> Профиль {{ $profile->user->name }} </p>
                        <div class="well shadow">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="agent-contact-details">
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                @if($profile->wallet)
                                                    <span style="float:right" >{{ $profile->wallet}}</span>
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
                                            <li class="list-group-item"><span style="float:right" >{{$profile->user->balance}} EL
                                                    @if($profile->user->balance > 0)
                                                <a href="{{ route('profile.pulloffmoney.create') }}" class="btn btn-default" style="margin-top: -5px;">
                                                    Вывести
                                                </a>
                                                    @endif
                                                </span>
                                                Ваш баланс
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

    </div>
@endsection
