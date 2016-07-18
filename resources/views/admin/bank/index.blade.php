@extends('admin.adminLayout')
@section('title')
    Банки
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Банки</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                Банки
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Тип</th>
                            <th>Количество элькоинов</th>
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($banks as $bank)
                            <tr>
                                <td>{{$bank->profile->type}}</td>
                                <td>{{$bank->amount}}</td>

                                <td>
                                    <a href="{{route('admin.bank.edit',['id'=>$bank->id])}}" style=" float: right" data-toggle="tooltip" data-original-title="Редактировать"
                                       class="btn btn-primary"><i class="fa fa-pencil"></i></a>
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
