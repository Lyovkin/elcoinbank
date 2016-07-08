<div class="form-group">
    {!! Form::label('currency', 'Валюта', ["class"=>"col-sm-3 control-label"]) !!}
    <div class="col-sm-6">
        {!! Form::text('name', $currency->name, ["class"=>"form-control",
        "placeholder"=>"Название валюты",'required' => 'required', 'pattern' => '[a-Z]+' ]) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-3 col-sm-3">
        {!! Form::button('<i class="fa fa-btn fa-refresh"></i> Обновить', ['type'=>'submit',
        'class' =>
        'btn btn-primary']) !!}
    </div>
</div>