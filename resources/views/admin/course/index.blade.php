@extends('admin.adminLayout')
@section('title')
    Курс
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Курс</h1>

        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                Все курсы
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Курс</th>
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($course as $cr)
                            <tr>
                                <td>{{$cr->id}}</td>
                                <td>{{$cr->course}} <i class="fa fa-ruble"></i> </td>
                                <td>
                                    <a href="{{route('admin.course.edit',['id'=>$cr->id])}}" style=" float: right" data-toggle="tooltip" data-original-title="Редактировать"
                                       class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                    <div class="btn-group" style="float: right;" role="group" aria-label="...">


                                    </div>
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
