@extends('admin.adminLayout')

@section('title')
    Валюта
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Редактировать название валюты</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Валюта
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            {!! Form::model($course,['route'=>['admin.course.update','id' => $course->id],
                            'method' => 'PATCH',
                            'class'=>'form-horizontal', 'role'=>'form']) !!}
                            @include('admin.course.form-edit')
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
