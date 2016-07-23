@extends('admin.adminLayout')
@section('title')
    Минус
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Минус</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                Минус
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Количество EL</th>
                            <th>Редактировать</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($minuses as $minus)
                            <tr>
                                <td>{{ $minus->amount }}</td>

                                <td>
                                    <a href="{{route('admin.minus.edit',['id'=>$minus->id])}}" style=" float: right" data-toggle="tooltip" data-original-title="Редактировать"
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
