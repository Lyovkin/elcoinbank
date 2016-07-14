@extends('layouts.profile_layout')
@section('title')
    Редактировать профиль
@endsection
@section('js')

@endsection
@section('content')
    <div class="container" style="padding-top: 100px;">
        <div class="row">
            @if (Session::has('message'))
                <div class="alert alert-danger">{{ Session::get('message') }}</div>
            @endif
            <div class="well">
                <div class="single-agent">
                    <h3 class="page-title">Редактировать профиль</h3>
                </div>
                <div class="block-heading" id="details">
                    <h4><span class="heading-icon"><i class="fa fa-user"></i></span> Профиль ( {{ Auth::user()->name }} )</h4>
                </div>
                <div class="">
                    <div class="">

                        {!! Form::model($profile,['route'=> ['profile.update', 'id'=>$profile->user->id]]) !!}
                        <div class="form-group">
                            <label>Имя</label>
                            {!! Form::text('name', $profile->user->name, ['class'=>'form-control',
                                                                                          'placeholder'=>'Имя',
                                                                                          'required'=>'']) !!}
                        </div>
                        <div class="form-group">
                            <label>Телефон</label>
                            {!! Form::text('phone', $profile->user->phone, ['class'=>'form-control phone',
                                                                                          'placeholder'=>'Телефон',]) !!}
                        </div>
                        <div class="form-group">
                            <label>Elcoin - кошелек</label>
                            {!! Form::text('wallet', $profile->wallet, ['class'=>'form-control phone',
                                                                                          'placeholder'=>'Кошелек',]) !!}
                        </div>
                        <label>Обо мне</label>
                        <div class='form-group'>
                            {!! Form::textarea('about', $profile->user->about, ['class'=>'form-control', 'placeholder'=>'Обо мне', 'rows' => 1]) !!}
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