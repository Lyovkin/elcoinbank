@extends('admin.adminLayout')
@section('title')
    Процент
@stop
@section('js')
@stop
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Редактировать процент</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Процент
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            {!! Form::model($percent,['route'=>['admin.percent.update','id' => $percent->id],
                            'method' => 'PATCH',
                            'class'=>'form-horizontal', 'role'=>'form']) !!}
                            @include('admin.percent._form-edit')
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
