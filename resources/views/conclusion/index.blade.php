@extends('layouts.profile_layout')

@section('title')
    Заявки на вывод
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
    <div class="col-lg-10 col-md-10 col-md-offset-1 col-xs-10" style="padding-top: 80px; ">
        @include('partials.head_profile')
        <table class="table table-bordered table-responsive" style="margin-top: 30px;">
            <thead>
            <tr class="head">
                <th>#</th>
                <th>Имя</th>
                <th>Email</th>
                <th>Телефон</th>
                <th>Дней</th>
                <th>Процент</th>
                <th>Курс</th>
                <th>Кошелек 1</th>
                <th>Кошелек 2</th>
                <th>Кошелек 3</th>
                <th>Сумма</th>
                <th>Сумма на выходе <i class="fa fa-ruble"></i> </th>
                <th>Примечание</th>
                <th>Дата создания</th>
                <th>Статус</th>
            </tr>
            </thead>
            <tbody>
            @foreach($conclusions as $con)
                <tr>
                    <td class="success">{{ $con->id }}</td>
                    <td class="success">{{ $con->name }}</td>
                    <td class="success">{{ $con->email }}</td>
                    <td class="success">{{ $con->tel }}</td>
                    <td class="success">{{ $con->days }}</td>
                    <td class="success">{{ $con->percent }} <i class="fa fa-percent"></i> </td>
                    <td class="success">{{ $con->course }} руб.</td>
                    <td class="success">{{ $con->wallet1 }}</td>
                    <td class="success">{{ $con->wallet2 }}</td>
                    <td class="success">{{ $con->wallet3 }}</td>
                    <td class="success">{{ $con->amount }}</td>
                    <td class="success">{{ $con->total }} руб.</td>
                    <td class="success">{{ $con->message }}</td>
                    <td class="success">{{ $con->created_at->format('d.m.Y') }}</td>
                    @if($con->status == 1)
                        <td class="success">Ожидайте...</td>
                    @else
                        <td class="success">Выполнена</td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection