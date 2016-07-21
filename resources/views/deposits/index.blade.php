@extends('layouts.profile_layout')

@section('title')
    Вывод вкладов
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
                            <th>Вывести</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($deposits))
                            @foreach($deposits as $deposit)
                                <tr>
                                    <td class="success">{{ $deposit->plan->type->name }}</td>
                                    <td class="success">{{ $deposit->days }}</td>
                                    <td class="success">{{ $deposit->percent }} %</td>
                                    <td class="success">{{ $deposit->amount }}</td>
                                    <td class="success">{{ $deposit->total }}</td>
                                    @if($deposit->conclusion > new DateTime() )
                                        <td class="success">Ожидайте...</td>
                                    @else
                                        <td class="success">Готов к выводу</td>
                                    @endif
                                    <td class="success">{{ $deposit->status == 0 ? $deposit->conclusion->format('d.m.Y H:i:s') :
                            "Выведен в ".$deposit->conclusion->format('d.m.Y H:i:s')}}</td>
                                    <td class="success">{{ $deposit->created_at->diffForHumans() }}</td>
                                    <td class="success">
                                        <form action="/profile/deposits/{{ $deposit->id }}" method="post">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                            <input type="hidden" name="status" value="1" />

                                            @if($deposit->conclusion <= new DateTime() && $deposit->status == 0)
                                                <button type="submit" class="btn btn-default">Вывести на баланс</button>
                                            @elseif($deposit->status == 1)
                                                <button type="button" class="btn btn-default" disabled>Выведен</button>
                                            @else
                                                <button type="submit" class="btn btn-default" disabled>Вывести на баланс</button>
                                            @endif
                                        </form>
                                    </td>
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
    </div>
@endsection