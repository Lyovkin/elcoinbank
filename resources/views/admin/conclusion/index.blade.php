@extends('admin.adminLayout')
@section('title')
    Вывод
@stop
@section('js')

@stop
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Заявки на вывод</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                ЗАявки на вывод
                <div class="pull-right">
                </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Имя</th>
                            <th>Email</th>
                            <th>Телефон</th>
                            <th>Сумма</th>
                            <th>Дней</th>
                            <th>Кошелек 1</th>
                            <th>Кошелек 2</th>
                            <th>Кошелек 3</th>
                            <th>Процент</th>
                            <th>Курс</th>
                            <th>Сумма на выходе <i class="fa fa-ruble"></i> </th>
                            <th>Дата создания</th>
                            <th>Выполнена</th>
                           {{-- <th>Одобрена</th>--}}
                            <th>&nbsp;</th>
                        </tr>

                        </thead>
                        <tbody>
                        @foreach($conclusion as $con)
                            <tr>
                                <td>{{$con->id}}</td>
                                <td>{{$con->name}}</td>
                                <td>{{$con->email}}</td>
                                <td>{{$con->tel}}</td>
                                <td>{{$con->amount}} elcoins</td>
                                <td>{{$con->days}}</td>
                                <td>{{$con->wallet1}}</td>
                                <td>{{$con->wallet2}}</td>
                                <td>{{$con->wallet3}}</td>
                                <td>{{$con->percent}} <i class="fa fa-percent"></i> </td>
                                <td>{{$con->course}} руб.</td>
                                <td>{{$con->total}} руб.</td>
                                <td>{{$con->created_at->format('d.m.Y')}}</td>
                                <td>
                                    @if (1 == $con->status)
                                      <span style="color: red">Нет</span>
                                    @else
                                        Да
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" style="float: right;" role="group" aria-label="...">
                                        {!! Form::open(['route'=>['admin.conclusion.destroy',$con->id], 'class'=>'form-horizontal confirm',
                                        'role'=>'form', 'method' => 'DELETE']) !!}
                                        <button type="submit" class="btn btn-danger confirm-btn" data-toggle="tooltip" data-original-title="Удалить"><i class="fa fa-trash-o"></i></button>
                                        {!! Form::close() !!}

                                        {!! Form::open(['route'=>['admin.conclusion.success',$con->id], 'class'=>'form-horizontal confirm',
                                        'role'=>'form', 'method' => 'POST']) !!}
                                        @if ($con->status == 1)
                                            {!! Form::hidden('status', 0) !!}
                                            <button type="submit" style="margin-top: 3px;" class="btn btn-success confirm-unblock" data-toggle="tooltip" data-original-title="Подтвердить"><i class="fa fa-thumbs-up"></i></button>
                                        @else
                                            {!! Form::hidden('status', 1) !!}
                                            <button type="submit" style="margin-top: 3px;" class="btn btn-danger confirm-block" data-toggle="tooltip" data-original-title="Аннулировать"><i class="fa fa-thumbs-down"></i></button>
                                        @endif
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
                <div class="text-center">{!! $conclusion->render() !!}</div>
            </div>
        </div>
        <!-- /.panel -->
        <!-- /.panel -->
    </div>
@stop
