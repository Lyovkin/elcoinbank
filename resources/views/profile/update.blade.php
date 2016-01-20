@extends('layouts.app')
@section('title')
    Профиль
@endsection
@section('js')

@endsection
@section('content')
    <div class="container" style="padding-top: 130px;">
        <div class="row">
            <div class="well">
                <div class="single-agent">
                    <div class="counts pull-right"> <strong>Дата регистрации</strong> <span class="h3">{{ Auth::user()->created_at->format('d.m.Y') }}</span></div>
                    <h3 class="page-title">{{ Auth::user()->name }}</h3>
                </div>
                @if (Session::has('message'))
                    <div class="alert alert-danger">{{ Session::get('message') }}</div>
                @endif
                <div class="block-heading" id="details">
                    <h4><span class="heading-icon"><i class="fa fa-user"></i></span> Профиль ( {{ Auth::user()->name }} )</h4>
                </div>
                <div class="">
                    <div class="">

                        {!! Form::model($profile, ['route'=> ['profiles.update', 'id'=>$profile->user->id]]) !!}
                        <div class="form-group">

                            <label>Имя</label>
                            {!! Form::text('name', $profile->user->name, ['class'=>'form-control first_name',
                                                                                          'placeholder'=>'Имя',
                                                                                          'required'=>'']) !!}
                        </div>
                        <div class="form-group">
                            <label>Фамилия</label>
                            {!! Form::text('last_name', $profile->user->last_name, ['class'=>'form-control last_name_name',
                                                                                          'placeholder'=>'Фамилия',
                                                                                          'required'=>'']) !!}
                        </div>
                        <div class="form-group">
                            <label>Телефон</label>
                            {!! Form::text('phone', $profile->user->phone, ['class'=>'form-control phone',
                                                                                          'placeholder'=>'Телефон',]) !!}
                        </div>
                        <div class="form-group">
                            <label>Elcoin - кошелек</label>
                            {!! Form::text('wallet', $profile->user->wallet, ['class'=>'form-control phone',
                                                                                          'placeholder'=>'Кошелек',]) !!}
                        </div>
                        <label>Обо мне</label>
                        <div class='form-group'>
                            {!! Form::textarea('about', $profile->user->about, ['class'=>'form-control', 'placeholder'=>'Обо мне']) !!}
                        </div>
                        <input name="id" type="hidden" value="{{ $profile->user->id }}">
                        {!! Form::submit('Сохранить', ['class'=>'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop