<div class="form-group">
    {!! Form::label('currency', 'Валюта', ["class"=>"col-sm-3 control-label"]) !!}
    <div class="col-sm-6">
        {!! Form::text('name', '', ["class"=>"form-control",
        "placeholder"=>"Название валюты",'required' => 'required' ]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('course_purchase', 'Покупка', ["class"=>"col-sm-3 control-label"]) !!}
    <div class="col-sm-6">
        {!! Form::text('course_purchase', '', ["class"=>"form-control",
        "placeholder"=>"Число через точку, например: 0.5",'required' => 'required']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('wallet', 'Номер счета', ["class"=>"col-sm-3 control-label"]) !!}
    <div class="col-sm-6">
        {!! Form::text('wallet', '', ["class"=>"form-control",
        "placeholder"=>"Номер счета",'required' => 'required']) !!}
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-3 col-sm-3">
        {!! Form::button('<i class="fa fa-btn fa-save"></i> Сохранить', ['type'=>'submit',
        'class' =>
        'btn btn-primary']) !!}
    </div>
</div>