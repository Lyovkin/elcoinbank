@extends('admin.adminLayout')
@section('title')
    Новости
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Новости</h1>
            <div class="pull-left">
                <div class="btn-toolbar  btn-group-xs" role="toolbar" aria-label="..." style="margin-bottom: 10px">
                    <a href="{{route('admin.news.create')}}"
                        data-toggle="tooltip"
                        data-original-title="Добавить новость"
                        class="btn btn-default btn-mini"><i class="fa fa-plus"></i> Добавить новость</a>
                </div>
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                Все новости
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Заголовок</th>
                            <th>Содержание</th>
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($news as $new)
                            <tr>
                                <td>{{$new->id}}</td>
                                <td>{{$new->title}}</td>
                                <td>{{$new->text}}</td>
                                <td>
                                    <a href="{{route('admin.news.edit',['id'=>$new->id])}}" style=" float: right" data-toggle="tooltip" data-original-title="Редактировать"
                                       class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                    <div class="btn-group" style="float: right;" role="group" aria-label="...">
                                        {!! Form::open(['route'=>['admin.news.destroy',$new->id], 'class'=>'form-horizontal confirm',
                                        'role'=>'form', 'method' => 'DELETE']) !!}
                                        <button type="submit" class="btn btn-danger confirm-btn" data-toggle="tooltip" data-original-title="Удалить"><i class="fa fa-trash-o"></i></button>
                                        {!! Form::close() !!}

                                    </div>
                                </td>
                                <td>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->

            <div class="panel-footer">
                <div class="text-center">{!! $news->render() !!}</div>
            </div>
        </div>
        <!-- /.panel -->
        <!-- /.panel -->
    </div>
@stop
