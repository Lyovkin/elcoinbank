@extends('admin.adminLayout')
@section('title')
    Создать новость
@stop
@section('js')
@stop
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Создать новость</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Новость
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12   ">

                            {!! Form::model($news,['route'=>['admin.news.store'],
                            'method' => 'POST',
                            'class'=>'form-horizontal', 'role'=>'form']) !!}
                                @include('admin.news._form-create')
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
@stop
