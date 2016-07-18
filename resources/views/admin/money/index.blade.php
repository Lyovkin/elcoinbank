@extends('admin.adminLayout')
@section('title')
    Вклады
@stop
@section('js')

@stop
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Вклады</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                Все заявки
                <div class="pull-right">
                </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Имя</th>
                            <th>Email</th>
                            <th>Телефон</th>
                            <th>Сумма</th>
                            <th>Дней</th>
                            <th>Кошелек</th>
                            <th>Процент</th>
                            <th>Курс</th>
                            <th>Сумма на выходе <i class="fa fa-ruble"></i> </th>
                            <th>Дата создания</th>
                            <th>Дата вывода</th>
                           {{-- <th>Одобрена</th>--}}
                            <th>&nbsp;</th>
                        </tr>

                        </thead>
                        <tbody>
                        @foreach($requests as $req)
                            <tr>
                                <td>{{$req->id}}</td>
                                <td>{{$req->name}}</td>
                                <td>{{$req->email}}</td>
                                <td>{{$req->tel}}</td>
                                <td>{{$req->amount}} elcoins</td>
                                <td>{{$req->days}}</td>
                                <td>{{$req->wallet}}</td>
                                <td>{{$req->percent}} <i class="fa fa-percent"></i> </td>
                                <td>{{$req->course}} руб.</td>
                                <td>{{$req->course * ($req->amount + ($req->percent * $req->days))}} руб.</td>
                                <td>{{$req->created_at->format('d.m.Y')}}</td>
                                <td>{{ \Carbon\Carbon::parse($req->conclusion)->format('d.m.Y') }}</td>
                                {{--<td>
                                    @if (0 == $req->approve)
                                        Нет
                                    @else
                                        Да
                                    @endif
                                </td>--}}
                                <td>
                                    <div class="btn-group" style="float: right;" role="group" aria-label="...">
                                        {!! Form::open(['route'=>['admin.history.destroy',$req->id], 'class'=>'form-horizontal confirm',
                                        'role'=>'form', 'method' => 'DELETE']) !!}
                                        <button type="submit" class="btn btn-danger confirm-btn" data-toggle="tooltip" data-original-title="Удалить"><i class="fa fa-trash-o"></i></button>
                                        {!! Form::close() !!}

                                        {{--{!! Form::open(['route'=>['admin.money.block',$req->id], 'class'=>'form-horizontal confirm',
                                        'role'=>'form', 'method' => 'POST']) !!}
                                        @if ($req->approve == 0)
                                            {!! Form::hidden('approve', 1) !!}
                                            <button type="submit" style="margin-top: 3px;" class="btn btn-success confirm-unblock" data-toggle="tooltip" data-original-title="Подтвердить"><i class="fa fa-thumbs-up"></i></button>
                                        @else
                                            {!! Form::hidden('approve', 0) !!}
                                            <button type="submit" style="margin-top: 3px;" class="btn btn-danger confirm-block" data-toggle="tooltip" data-original-title="Аннулировать"><i class="fa fa-thumbs-down"></i></button>
                                        @endif
                                        {!! Form::close() !!}--}}


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
