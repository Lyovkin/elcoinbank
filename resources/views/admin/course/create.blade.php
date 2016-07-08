@extends('admin.adminLayout')

@section('title')
    Создать валюту
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Создать валюту</h1>
        </div>
        <!-- /.col-lg-12 -->

    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-7 col-lg-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Валюта
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            @if (count($errors->first) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            {!! Form::model($course,['route'=>['admin.course.store'],
                            'method' => 'POST',
                            'class'=>'form-horizontal', 'role'=>'form']) !!}
                            @include('admin.course.form-create')
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
