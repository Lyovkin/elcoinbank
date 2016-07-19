@extends('layouts.profile_layout')

@section('title')
    Вывести EL
@stop

@section('css')
    <link href="/css/profile.css" rel="stylesheet" type="text/css" />
    <style>
        .form-horizontal .form-group {
            margin-left: 0;
            margin-right: 0;
        }
    </style>
@endsection
@section('content')

    <div class="container" style="margin-top: 50px;">
        @if (Session::has('message'))
            <div class="alert alert-danger">{{ Session::get('message') }}</div>
        @endif
                    <!-- /.row -->
            <div class="row" style="margin: 0 0 0 0">
                <div class="col-lg-12" style="margin-top: 20px">
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Вывести EL
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                {!! Form::model($pulloffmoney,['route'=>['profile.pulloffmoney.store'], 'method' => 'POST', 'class'=>'form-horizontal', 'role'=>'form']) !!}

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="amount" class="control-label">Сумма для вывода</label>
                                        <input type="text" class="form-control" id="amount" name="amount" required />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="payment" class="control-label">На счет</label>
                                        <input type="text" class="form-control" id="payment" value="{{ $user->profile->wallet }}" readonly required />
                                    </div>
                                </div>

                                <input type="hidden" name="user_id" value="{{ $user->id }}" />

                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                                <div class="form-group col-lg-12">
                                    <button type='submit' id="submit" name="submit" class="btn btn-primary pull-right">Отправить заявку</button>
                                </div>

                                {!! Form::close() !!}
                            </div>
                            <!-- /.col-lg-6 (nested) -->
                        </div>
                        <!-- /.row (nested) -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
    </div>
    </div>
@stop

