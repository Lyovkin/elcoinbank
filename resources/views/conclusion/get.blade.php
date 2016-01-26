@extends('layouts.profile_layout')

@section('title')
    Вывести
@endsection

@section('content')

    <div class="container" style="padding-top: 80px;">
        <div class="row">

                @if (Session::has('message'))
                    <div class="alert alert-danger">{{ Session::get('message') }}</div>
                @endif

                <div class="">
                    <div class=" well">

                        {!! Form::model($conclusion,['route'=> ['conclusion.store', 'id'=>$conclusion->id]]) !!}
                        <div class="form-group">

                            <label>Имя</label>
                            {!! Form::text('name', $deposit->name, ['class'=>'form-control first_name',
                                                                                          'placeholder'=>'Имя',
                                                                                          'required'=>'']) !!}
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            {!! Form::text('email', $deposit->email, ['class'=>'form-control last_name_name',
                                                                                          'placeholder'=>'Email',
                                                                                          'required'=>'']) !!}
                        </div>
                        <div class="form-group">
                            <label>Телефон</label>
                            {!! Form::text('tel', $deposit->tel, ['class'=>'form-control phone',
                                                                                          'placeholder'=>'Телефон',]) !!}
                        </div>

                        <div class="form-group">
                            <label>Дней</label>
                            {!! Form::text('days', $deposit->days, ['class'=>'form-control phone',
                                                                                          'placeholder'=>'Дней',
                                                                                          'required'=> '',
                                                                                          'readonly'=>'readonly']) !!}
                        </div>
                        <div class="form-group">
                            <label>Процент</label>
                            {!! Form::text('percent', $deposit->percent, ['class'=>'form-control phone',
                                                                                          'placeholder'=>'Процент',
                                                                                          'required'=> '',
                                                                                          'readonly'=>'readonly']) !!}
                        </div>
                        <div class="form-group">
                            <label>Курс</label>
                            {!! Form::text('course', $deposit->course, ['class'=>'form-control phone',
                                                                                          'placeholder'=>'Телефон',
                                                                                          'required'=> '',
                                                                                          'readonly'=>'readonly']) !!}
                        </div>

                        <div class="form-group">
                            <label>Кошелек для вывода 1</label>
                            {!! Form::text('wallet1', '', ['class'=>'form-control phone',
                                                                                          'placeholder'=>'Кошелек 1',
                                                                                          'required'=> '',]) !!}
                        </div>
                        <div class="form-group">
                            <label>Кошелек для вывода 2</label>
                            {!! Form::text('wallet2', '', ['class'=>'form-control phone',
                                                                                          'placeholder'=>'Кошелек 2',
                                                                                         ]) !!}
                        </div>
                        <div class="form-group">
                            <label>Кошелек для вывода 3</label>
                            {!! Form::text('wallet3', '', ['class'=>'form-control phone',
                                                                                          'placeholder'=>'Кошелек 3',
                                                                                          ]) !!}
                        </div>
                        <div class="form-group">
                            <label>Сумма</label>
                            {!! Form::text('amount', $deposit->amount, ['class'=>'form-control phone',
                                                                                          'placeholder'=>'Сумма',
                                                                                           'required'=> '',
                                                                                          'readonly'=>'readonly']) !!}
                        </div>
                        <div class="form-group">
                            <label>Сумма для вывода</label>
                            {!! Form::text('total', ($deposit->course * ($deposit->amount + ($deposit->days * $deposit->percent))), ['class'=>'form-control phone',
                                                                                          'placeholder'=>'Сумма для вывода',
                                                                                           'required'=> '',
                                                                                          'readonly'=>'readonly']) !!}
                        </div>

                        <label>Примечания</label>
                        <div class='form-group'>
                            {!! Form::textarea('message', '', ['class'=>'form-control', 'placeholder'=>'Примечания', 'rows' => 2]) !!}
                        </div>
                        <input name="id" type="hidden" value="{{ Auth::user()->id }}">
                        <input name="dep_id" type="hidden" value="{{ $deposit->id }}">
                        {!! Form::submit('Вывести', ['class'=>'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop