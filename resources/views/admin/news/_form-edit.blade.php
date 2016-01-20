<div class="form-group">
    {!! Form::label('title', 'Заголовок', ["class"=>"col-sm-3 control-label"]) !!}
    <div class="col-sm-6">
        {!! Form::text('title', $news->title, ["class"=>"form-control",
        "placeholder"=>"Заголовок",'required' => 'required' ]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('text', 'Содержание', ["class"=>"col-sm-3 control-label"]) !!}
    <div class="col-sm-6">
        {!! Form::textarea('text', $news->text, ["class"=>"form-control", "placeholder"=>"Содержание"]) !!}
    </div>
</div>


<div class="form-group">
    <div class="col-sm-offset-3 col-sm-3">
        {!! Form::button('<i class="fa fa-btn fa-save"></i> Сохранить', ['type'=>'submit',
        'class' =>
        'btn btn-primary']) !!}
    </div>
</div>