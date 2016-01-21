<div class="form-group">
    {!! Form::label('percent', 'Процент', ["class"=>"col-sm-3 control-label"]) !!}
    <div class="col-sm-6">
        {!! Form::text('percent', $percent->percent, ["class"=>"form-control",
        "placeholder"=>"Процент",'required' => 'required' ]) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-3 col-sm-3">
        {!! Form::button('<i class="fa fa-btn fa-save"></i> Обновить процент', ['type'=>'submit',
        'class' =>
        'btn btn-primary']) !!}
    </div>
</div>