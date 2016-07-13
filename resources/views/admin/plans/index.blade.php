@extends('admin.adminLayout')
@section('title')
    Планы
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Планы</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                Планы
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Название</th>
                            <th>Дни</th>
                            <th>Проценты</th>
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($plans as $plan)
                            <tr>
                                <td>{{ $plan->type->name }}</td>
                                <td>{{ $plan->days }}</td>
                                <td>{{ $plan->percent }} %  </td>
                                <td>
                                    <a href="{{route('admin.plans.edit',['id'=>$plan->id])}}" style=" float: right" data-toggle="tooltip" data-original-title="Редактировать"
                                       class="btn btn-primary"><i class="fa fa-pencil"></i></a>
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
        </div>
        <!-- /.panel -->
        <!-- /.panel -->
    </div>
@stop
