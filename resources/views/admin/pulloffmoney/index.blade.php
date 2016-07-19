@extends('admin.adminLayout')

@section('title')
    Заявки на вывод
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"> Заявки на вывод</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                Заявки на вывод
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Пользователь</th>
                            <th>Сумма</th>
                            <th>Кошелек</th>
                            <th>Подтверждена</th>
                            <th>Создана</th>
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pulls as $pull)
                            <tr>
                                <td>{{ $pull->user->name }}</td>
                                <td>{{ $pull->amount}}</td>
                                <td>{{ $pull->user->profile->wallet }}</td>
                                <td>{{ $pull->status ? 'Да' : 'Нет' }}</td>
                                <td>{{ $pull->created_at->diffForHumans() }}</td>
                                <td>
                                    {!! Form::open(['route'=>['admin.pulloffmoney.status',$pull->id], 'class'=>'form-horizontal confirm',
                                           'role'=>'form', 'method' => 'POST']) !!}
                                    @if ($pull->status == 0)
                                        {!! Form::hidden('status', 1) !!}
                                        <button type="submit" style="margin-bottom: 5px;" class="btn btn-success confirm-unblock" data-toggle="tooltip" data-original-title="Подтвердить"><i class="fa fa-check"></i></button>
                                    @else
                                        {!! Form::hidden('status', 0) !!}
                                        <button type="submit" style="margin-bottom: 5px;" class="btn btn-danger confirm-block" data-toggle="tooltip" data-original-title="Заблокировать"><i class="fa fa-times"></i></button>
                                    @endif

                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
        <!-- /.panel -->
    </div>
@stop
