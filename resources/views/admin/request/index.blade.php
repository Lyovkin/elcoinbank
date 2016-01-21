@extends('admin.adminLayout')
@section('title')
    Заявки
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Заявки</h1>

        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                Все заявки
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Имя</th>
                            <th>Email</th>
                            <th>Телефон</th>
                            <th>Кошелек</th>
                            <th>Сумма</th>
                            <th>Сообщение</th>
                            <th>Дата создания</th>
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($requests as $request)
                            <tr>
                                <td>{{$request->id}}</td>
                                <td>{{$request->name}}</td>
                                <td>{{$request->email}}</td>
                                <td>{{$request->tel}}</td>
                                <td>{{$request->wallet}}</td>
                                <td>{{$request->amount}}</td>
                                <td>{{$request->message}}</td>
                                <td>{{$request->created_at->format('d.m.Y H:m:s')}}</td>
                                <td>
                                    <div class="btn-group" style="float: right;" role="group" aria-label="...">
                                        {!! Form::open(['route'=>['admin.request.delete',$request->id], 'class'=>'form-horizontal confirm',
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
                <div class="text-center">{!! $requests->render() !!}</div>
            </div>
        </div>
        <!-- /.panel -->
        <!-- /.panel -->
    </div>
@stop
