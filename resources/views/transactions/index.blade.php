@extends('layouts.profile_layout')

@section('title')
    Мои операции
@endsection

@section('css')
    <style>
        .head > th {
            background-color: #1dccff;
        }
    </style>
    <link href="/css/profile.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12" >
                <h2 class="header">Покупка EL / Перевод EL</h2>
                <div class="table-responsive">
                    <table class="table table-bordered" style="margin-top: 30px;">
                        <thead>
                        <tr class="head">
                            <th>Тип операции</th>
                            <th>Валюта</th>
                            <th>Со счета</th>
                            <th>По курсу</th>
                            <th>Сумма</th>
                            <th>Сумма EL</th>
                            <th>Примечание</th>
                            <th>В дов.управление</th>
                            <th>Одобрена</th>
                            <th>Создана</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($purchases) > 0)
                            @foreach($purchases as $purchase)
                                <tr>
                                    <td class="success">{{ $purchase->type->name }}</td>
                                    <td class="success">{{ $purchase->type_id != 3 ? $purchase->currency->name : '-' }}</td>
                                    <td class="success">{{ $purchase->payment ? $purchase->payment : '-' }}</td>
                                    <td class="success">{{ $purchase->type_id != 3 ? $purchase->course : '-'}}</td>
                                    <td class="success">{{ $purchase->amount }}</td>
                                    <td class="success">{{ $purchase->total }}</td>
                                    <td class="success">{{ $purchase->message ? $purchase->message : '-' }}</td>
                                    <td class="success">{{ $purchase->status_trust ? 'Дa' : 'Нет' }}</td>
                                    <td class="success">{{ $purchase->status_admin ? 'Да' : 'Нет' }}</td>
                                    <td class="success">{{ $purchase->created_at->diffForHumans() }}</td>
                                </tr>
                            @endforeach
                        @else
                            <p class="h3 text-center">Нет покупок</p>
                        @endif
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h2 class="header">Мои вклады</h2>
                <div class="table-responsive">
                    <table class="table table-bordered" style="margin-top: 30px;">
                        <thead>
                        <tr class="head">
                            <th>Тип вклада</th>
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
                        @if(count($deposits) > 0)
                            @foreach($deposits as $deposit)
                                <tr>
                                    <td class="success">{{ $deposit->plan->type->name }}</td>
                                    <td class="success">{{ $deposit->days }}</td>
                                    <td class="success">{{ $deposit->percent }} %</td>
                                    <td class="success">{{ $deposit->amount }}</td>
                                    <td class="success">{{ $deposit->total }}</td>
                                    @if($deposit->status == 0)
                                        <td class="success">Ожидайте...</td>
                                    @else
                                        <td class="success">Выполнена</td>
                                    @endif
                                    <td class="success">{{ $deposit->conclusion->format('d.m.Y H:i:s') }}</td>
                                    <td class="success">{{ $deposit->created_at->diffForHumans() }}</td>
                                </tr>
                            @endforeach
                        @else
                            <p class="h3 text-center">Нет вкладов</p>
                        @endif
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h2 class="header">Мои заявки на вывод</h2>
                <table class="table table-bordered table-responsive" style="margin-top: 30px;">
                    <thead>
                    <tr class="head">
                        <th>Сумма вывода EL</th>
                        <th>Статус</th>
                        <th>Созданa</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($pulloffmoneys) > 0)
                        @foreach($pulloffmoneys as $pulloffmoney)
                            <tr>
                                <td class="success">{{ $pulloffmoney->amount }}</td>
                                @if($pulloffmoney->status == 0)
                                    <td class="success">Ожидайте...</td>
                                @else
                                    <td class="success">Выполнена</td>
                                @endif
                                <td class="success">{{ $pulloffmoney->created_at->diffForHumans() }}</td>
                            </tr>
                        @endforeach
                    @else
                        <p class="h3 text-center">Нет заявок на вывод</p>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection