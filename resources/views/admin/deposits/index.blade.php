@extends('admin.adminLayout')

@section('title')
    Вклады
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
                Вклады
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table class="table table-bordered table-responsive" style="margin-top: 30px;">
                    <thead>
                    <tr class="head">
                        <th>Тип вклада</th>
                        <th>Пользователь</th>
                        <th>Дней</th>
                        <th>Процент</th>
                        <th>Сумма вклада EL</th>
                        <th>Сумма для вывода EL</th>
                        <th>Статус</th>
                        <th>Истечение времени вклада</th>
                        <th>Создан</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($deposits as $deposit)
                        <tr>
                            <td>{{ $deposit->plan->type->name }}</td>
                            <td>{{ $deposit->user->name }}</td>
                            <td>{{ $deposit->days }}</td>
                            <td>{{ $deposit->percent }} %</td>
                            <td>{{ $deposit->amount }}</td>
                            <td>{{ $deposit->total }}</td>
                            @if($deposit->status == 1 )
                                <td>Выведен</td>
                            @else
                                <td>В процессе...</td>
                            @endif
                            <td>{{ $deposit->status == 0 ? $deposit->conclusion->format('d.m.Y H:i:s') :
                            "Выведен в ".$deposit->conclusion->format('d.m.Y H:i:s')}}</td>
                            <td>{{ $deposit->created_at->diffForHumans() }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.panel-body -->

            {{--<div class="panel-footer">--}}
            {{--<div class="text-center">{!! $requests->render() !!}</div>--}}
            {{--</div>--}}
        </div>
        <!-- /.panel -->
        <!-- /.panel -->
    </div>
@stop
