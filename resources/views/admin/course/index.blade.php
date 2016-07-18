@extends('admin.adminLayout')

@section('title')
    Валюта
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Валюта</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                Валюта
                <div class="pull-right">
                    <div class="btn-toolbar  btn-group-xs" role="toolbar" aria-label="...">
                        <a href="{{route('admin.course.create')}}"
                           data-toggle="tooltip"
                           data-original-title="Добавить валюту"
                           class="btn btn-default btn-mini"><i class="fa fa-plus"></i> Добавить валюту</a>
                    </div>
                </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Название валюты</th>
                            <th>Продажа</th>
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($courses as $course)
                            <tr>
                                <td>Elcoin / {{ $course->currency->name }}</td>
                                <td>{{ $course->course_purchase }}</td>
                                <td>
                                    <div class="btn-group" style="float: right;" role="group" aria-label="...">
                                        {!! Form::open(['route'=>['admin.course.destroy',$course->id], 'class'=>'form-horizontal confirm',
                                        'role'=>'form', 'method' => 'DELETE']) !!}
                                        <button type="submit" style="margin-left: 10px;" class="btn btn-danger confirm-btn" data-toggle="tooltip"
                                                data-original-title="Удалить"><i class="fa fa-trash-o"></i></button>
                                        {!! Form::close() !!}
                                    </div>

                                    <a href="{{route('admin.course.edit',['id'=>$course->id])}}" style=" float: right"
                                       data-toggle="tooltip" data-original-title="Редактировать"
                                       class="btn btn-primary"><i class="fa fa-pencil"></i>
                                    </a>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
        <!-- /.panel -->
    </div>
@endsection