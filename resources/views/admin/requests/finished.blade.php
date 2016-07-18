@extends('admin.adminLayout')

@section('title')
    Успешные транзакции
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Успешные транзакции</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                Успешные транзакции
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Тип</th>
                            <th>Имя</th>
                            <th>Email</th>
                            <th>Покупка за</th>
                            <th>№ счета</th>
                            <th>По курсу</th>
                            <th>Сумма</th>
                            <th>К зачислению элькоинов</th>
                            <th>Доверительное управление</th>
                            <th>Кошелек</th>
                            <th>Сообщение</th>
                            <th>Статус модерации</th>
                            <th>Статус админа</th>
                            <th>Дата создания</th>
                            <th>Дата изменения</th>
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($requests as $request)
                            <tr>
                                <td>{{ $request->type->name }}</td>
                                <td>{{ $request->user->name }}</td>
                                <td>{{ $request->user->email }}</td>
                                <td>{{ $request->payment ? $request->currency->name : '-' }}</td>
                                <td>{{ $request->payment ? $request->payment : '-' }}</td>
                                <td>{{ $request->payment ? $request->course : '-' }}</td>
                                <td>{{ $request->amount }}</td>
                                <td>{{ $request->total }} EL</td>
                                <td>{{ $request->status_trust == 1 ? 'Да' : 'Нет' }}</td>
                                <td>{{ $request->status_trust == 0 ? $request->user->profile->wallet : '-' }}</td>
                                <td>{{ $request->message ? $request->message : '-' }}</td>
                                <td>{{ $request->status_moderation == 1 ? 'Да' : 'Нет' }}</td>
                                <td>{{ $request->status_admin == 1 ? 'Да' : 'Нет' }}</td>
                                <td>{{ $request->created_at->format('d.m.Y H:m:s') }}</td>
                                <td>{{ $request->updated_at->format('d.m.Y H:m:s') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
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
