@extends('admin.adminLayout')
@section('title')
    План
@stop
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Редактировать план</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    План
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            {!! Form::model($plan,['route'=>['admin.plans.update','id' => $plan->id],
                            'method' => 'PATCH',
                            'class'=>'form-horizontal', 'role'=>'form']) !!}
                            <div class="form-group">
                                {!! Form::label('type_id', 'Тип плана', ["class"=>"col-sm-3 control-label"]) !!}
                                <div class="col-sm-6">
                                   {!! Form::select('type_id', [$plan->type_id => $plan->type->name],'',["class"=>"form-control"]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('days', 'Количество дней', ["class"=>"col-sm-3 control-label"]) !!}
                                <div class="col-sm-6">
                                    {!! Form::text('days', $plan->days, ["class"=>"form-control",
                                   'required' => 'required', 'pattern' => '[0-9]+' ]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('percent', 'Процент', ["class"=>"col-sm-3 control-label"]) !!}
                                <div class="col-sm-6">
                                    {!! Form::text('percent', $plan->percent, ["class"=>"form-control",
                                    'required' => 'required','pattern' => '[0-9]+' ]) !!}
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
