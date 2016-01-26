@extends('layouts.profile_layout')
@section('title')
    Создать заявку на перевод
@stop

@section('css')
<style>
    .icon {
        width: 32px;
        height: 32px;
        text-align: center;
        padding: 7px 8px;
        border: 2px solid;
        border-radius: 50%;
    }

    .header {
        padding-top: 50px;
        background-color: #eee;
        overflow: hidden;
    }
    .footer {
        color: #887;
        background-color: #eee;
        padding-top: 30px;
        padding-bottom: 30px;
    }

    .content {
        position: relative;
        display: table;
        width: 100%;
        min-height: 100vh;
    }
    .pull-middle {
        display: table-cell;
        vertical-align: middle;
    }

    .btn {
        padding-left: 25px;
        padding-right: 25px;
    }
    .btn-circle {
        border-radius: 20px;
    }


    .phone {
        position: relative;
        max-width: 263px;
        margin: 0 auto;
        padding: 65px 15px 55px;
        border: 2px solid #ddd;
        border-radius: 20px;
        background-color: #222;
        box-shadow: 20px 20px 40px #887;
    }
</style>
<link href="/css/profile.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')

    <div class="container" style="padding-top: 80px;">
        @include('partials.head_profile')
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-8" style="margin-top: 20px">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Сделать вклад
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12 ">

                                {!! Form::model($money,['route'=>['money.store'],
                                'method' => 'POST',
                                'class'=>'form-horizontal', 'role'=>'form']) !!}
                                @include('request.money_form-create')
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
            <div class="col-lg-4" style="margin-top: 50px">
                <div class="phone">
                    <img class="img-responsive img-rounded" src="/img/phone.jpeg">
                </div>
            </div>
        </div>
    </div>


@stop
