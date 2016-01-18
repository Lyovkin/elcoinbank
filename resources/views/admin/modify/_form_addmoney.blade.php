<div class="form-group">
{!! Form::label('sum', 'Введите сумму') !!}

{!! Form::text('sum','', ['class'=>'form-control', 'placeholder'=>'Сумма', 'pattern' => '[0-9]+']) !!}
</div>
<input type="hidden" name="user_id" value="{{ $user->id }}">

<div class="form-group">
    {!! Form::submit('Обновить баланс', ['class'=>'btn btn-success']) !!}
</div>