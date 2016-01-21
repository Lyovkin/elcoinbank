@extends('layouts.app')
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
@endsection
@section('content')

    <div class="container" style="padding-top: 130px;">
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Заявка на перевод
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12 ">

                                {!! Form::model($request,['route'=>['request.store'],
                                'method' => 'POST',
                                'class'=>'form-horizontal', 'role'=>'form']) !!}
                                @include('request._form-create')
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
