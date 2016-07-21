@extends('admin.adminLayout')

@section('title')
    Транзакции
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Транзакции</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                Транзакции
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
                            @if($request->status_admin != 1)
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
                                <td>{{ $request->message }}</td>
                                <td>{{ $request->status_moderation == 1 ? 'Да' : 'Нет' }}</td>
                                <td>{{ $request->status_admin == 1 ? 'Да' : 'Нет' }}</td>
                                <td>{{ $request->created_at->format('d.m.Y H:i:s') }}</td>
                                <td>{{ $request->updated_at->format('d.m.Y H:i:s') }}</td>
                                <td>

                                    @if(Auth::user()->hasRole('supervisor'))
                                        {!! Form::open(['route'=>['admin.requests.moderation',$request->id], 'class'=>'form-horizontal confirm',
                                            'role'=>'form', 'method' => 'POST']) !!}
                                        @if ($request->status_moderation == 0)
                                            {!! Form::hidden('status_moderation', 1) !!}
                                            <button type="submit" style="margin-bottom: 5px;" class="btn btn-success confirm-unblock" data-toggle="tooltip" data-original-title="Подтвердить"><i class="fa fa-check"></i></button>
                                        @else
                                            {!! Form::hidden('status_moderation', 0) !!}
                                            <button type="submit" style="margin-bottom: 5px;" class="btn btn-danger confirm-block" data-toggle="tooltip" data-original-title="Заблокировать"><i class="fa fa-times"></i></button>
                                        @endif
                                        {!! Form::close() !!}
                                    @elseif(Auth::user()->hasRole('admin'))
                                        {!! Form::open(['route'=>['admin.requests.moderation',$request->id], 'class'=>'form-horizontal confirm',
                                           'role'=>'form', 'method' => 'POST']) !!}
                                        @if ($request->status_admin == 0)
                                            {!! Form::hidden('status_admin', 1) !!}
                                            <button type="submit" style="margin-bottom: 5px;" class="btn btn-success confirm-unblock" data-toggle="tooltip" data-original-title="Подтвердить"><i class="fa fa-check"></i></button>
                                        @else
                                            {!! Form::hidden('status_admin', 0) !!}
                                            <button type="submit" style="margin-bottom: 5px;" class="btn btn-danger confirm-block" data-toggle="tooltip" data-original-title="Заблокировать"><i class="fa fa-times"></i></button>
                                        @endif
                                        {!! Form::close() !!}
                                        <div class="btn-group" style="float: right;" role="group" aria-label="...">
                                            {!! Form::open(['route'=>['admin.requests.delete',$request->id], 'class'=>'form-horizontal confirm',
                                            'role'=>'form', 'method' => 'DELETE']) !!}
                                            <button type="submit" class="btn btn-danger confirm-btn" data-toggle="tooltip" data-original-title="Удалить"><i class="fa fa-trash-o"></i></button>
                                            {!! Form::close() !!}
                                        </div>
                                    @endif
                                </td>
                            </tr>
                            @endif
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
