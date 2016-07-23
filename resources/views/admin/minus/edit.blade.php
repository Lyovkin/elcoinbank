@extends('admin.adminLayout')

@section('title')
    Минус
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Редактировать</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Минус
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            {!! Form::model($minus,['route'=>['admin.minus.update','id' => $minus->id],
                            'method' => 'PATCH',
                            'class'=>'form-horizontal', 'role'=>'form']) !!}
                            <div class="form-group">
                                {!! Form::label('title', 'Количество элькоинов', ["class"=>"col-sm-3 control-label"]) !!}
                                <div class="col-sm-6">
                                    {!! Form::number('amount', $minus->amount, ["class"=>"form-control",
                                    "placeholder"=>"Количество",'required' => 'required' ]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-3">
                                    {!! Form::button('<i class="fa fa-btn fa-save"></i> Обновить', ['type'=>'submit',
                                    'class' =>
                                    'btn btn-primary']) !!}
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>
@stop
