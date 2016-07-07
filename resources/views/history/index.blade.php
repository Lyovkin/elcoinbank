@extends('layouts.profile_layout')

@section('title')
    Заявки
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
    <div class="container" style="padding-top: 80px; ">

        @if (Session::has('message'))
            <div class="alert alert-danger">{{ Session::get('message') }}</div>
        @endif

        @include('partials.head_profile')
        <table class="table table-bordered table-responsive" style="margin-top: 30px;">
            <thead>
            <tr class="head">
                <th>#</th>
                <th>Имя</th>
                <th>Email</th>
                <th>Телефон</th>
                <th>Сумма</th>
                <th>Дней</th>
                <th>Кошелек Elcoin</th>
                <th>Процент</th>
                <th>Курс</th>
                <th>Сумма на выходе <i class="fa fa-ruble"></i> </th>
                <th>Дата создания</th>
                <th>Дата вывода</th>
                <th>Статус</th>
               {{-- <th>Одобрена</th>--}}
            </tr>
            </thead>
            <tbody>
            @foreach($requests as $req)
                <tr>
                    {{--@if($req->approve == 0)
                    <td class="danger">{{ $req->id }}</td>
                    <td class="danger">{{ $req->name }}</td>
                    <td class="danger">{{ $req->email }}</td>
                    <td class="danger">{{ $req->tel }}</td>
                    <td class="danger">{{ $req->amount }}</td>
                    <td class="danger">{{ $req->days }}</td>
                    <td class="danger">{{ $req->wallet }}</td>
                    <td class="danger">{{ $req->percent }} <i class="fa fa-percent"></i> </td>
                    <td class="danger">{{ $req->course }} руб.</td>
                    <td class="danger">{{ $req->course * ($req->amount + ($req->percent * $req->days))}} руб.</td>
                    <td class="danger">{{ $req->created_at->format('d.m.Y H:m:s') }}</td>
                    @if($req->approve == 0)
                    <td class="danger">Нет</td>
                    @else
                    <td class="danger">Да</td>
                    @endif
                        @else--}}
                        <td class="success">{{ $req->id }}</td>
                        <td class="success">{{ $req->name }}</td>
                        <td class="success">{{ $req->email }}</td>
                        <td class="success">{{ $req->tel }}</td>
                        <td class="success">{{ $req->amount }}</td>
                        <td class="success">{{ $req->days }}</td>
                        <td class="success">{{ $req->wallet }}</td>
                        <td class="success">{{ $req->percent }} <i class="fa fa-percent"></i> </td>
                        <td class="success">{{ $req->course }} руб.</td>
                        <td class="success">{{ $req->course * ($req->amount + ($req->percent * $req->days))}} руб.</td>
                        <td class="success">{{ $req->created_at->format('d.m.Y') }}</td>
                        <td class="success">{{ \Carbon\Carbon::parse($req->conclusion)->format('d.m.Y') }}</td>
                        @if(\Carbon\Carbon::now() < \Carbon\Carbon::parse($req->conclusion))
                        <td class="success"><a href="#" class="btn btn-primary" disabled>Ожидание...</a> </td>
                        @elseif($req->status == 0)
                        <td class="success"><a href="#" class="btn btn-primary" disabled>Выведена</a> </td>
                        @else
                        <td class="success"><a href="/conclusion/{{ $req->id }}" class="btn btn-primary">Вывести</a> </td>
                        @endif
                        {{--@if($req->approve == 0)
                            <td class="success">Нет</td>
                        @else
                            <td class="success">Да</td>
                     @endif
                        @endif--}}
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection