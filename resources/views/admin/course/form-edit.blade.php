<div class="form-group">
    {!! Form::label('currency', 'Валюта', ["class"=>"col-sm-3 control-label"]) !!}
    <div class="col-sm-6">
        {!! Form::text('name', $course->currency    ->name, ["class"=>"form-control",
        "placeholder"=>"Название валюты",'required' => 'required', 'pattern' => '[a-Z]+' ]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('course_purchase', 'Продажа', ["class"=>"col-sm-3 control-label"]) !!}
    <div class="col-sm-6">
        {!! Form::text('course_purchase', $course->course_purchase, ["class"=>"form-control",
        "placeholder"=>"Цена через точку 2.1",'required' => 'required' ]) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-3 col-sm-3">
        {!! Form::button('<i class="fa fa-btn fa-refresh"></i> Обновить', ['type'=>'submit',
        'class' =>
        'btn btn-primary']) !!}
    </div>
</div>