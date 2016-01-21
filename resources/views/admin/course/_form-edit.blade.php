<div class="form-group">
    {!! Form::label('course', "Курс", ["class"=>"col-sm-3 control-label"]) !!}
    <div class="col-sm-6">
        {!! Form::text('course', $course->course, ["class"=>"form-control",
        "placeholder"=>"Курс",'required' => 'required' ]) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-3 col-sm-3">
        {!! Form::button('<i class="fa fa-btn fa-save"></i> Обновить курс', ['type'=>'submit',
        'class' =>
        'btn btn-primary']) !!}
    </div>
</div>