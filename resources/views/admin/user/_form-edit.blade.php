<div class="form-group">
    {!! Form::label('name', 'Имя пользователя', ["class"=>"col-sm-3 control-label"]) !!}
    <div class="col-sm-6">
        {!! Form::text('name', $user->name, ["class"=>"form-control",
        "placeholder"=>"Логин",'required' => 'required', 'pattern' => '[a-Z]+' ]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('email', 'Email', ["class"=>"col-sm-3 control-label"]) !!}
    <div class="col-sm-6">
        {!! Form::text('email', $user->email, ["class"=>"form-control",
        "placeholder"=>"Email",'required' => 'required', 'pattern' => '[a-Z]+' ]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('role', 'Роли', ["class"=>"col-sm-3 control-label"]) !!}
    <div class="col-sm-6">
        @foreach($roles as $role)
            <p>
                {!! Form::checkbox('roleCheck[]', $role->id, $user->hasRole($role->name), ['id'=> 'role'.$role->id]) !!}
                {!! Form::label('role'.$role->id, $role->name) !!}
            </p>
        @endforeach
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-3 col-sm-3">
        {!! Form::button('<i class="fa fa-btn fa-save"></i> Сохранить', ['type'=>'submit',
        'class' =>
        'btn btn-primary']) !!}
    </div>
</div>