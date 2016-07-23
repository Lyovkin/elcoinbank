@extends('layouts.profile_layout')
@section('title')
    Создать заявку на перевод
@stop

@section('css')
<style>
    .icon {
        width: 32px;
        height: 32px;
        text-align: center;
        padding: 7px 8px;
        border: 2px solid;
        border-radius: 50%;
    }

    .header {
        padding-top: 50px;
        background-color: #eee;
        overflow: hidden;
    }
    .footer {
        color: #887;
        background-color: #eee;
        padding-top: 30px;
        padding-bottom: 30px;
    }

    .content {
        position: relative;
        display: table;
        width: 100%;
        min-height: 100vh;
    }
    .pull-middle {
        display: table-cell;
        vertical-align: middle;
    }

    .btn {
        padding-left: 25px;
        padding-right: 25px;
    }
    .btn-circle {
        border-radius: 20px;
    }


    .phone {
        position: relative;
        max-width: 263px;
        margin: 0 auto;
        padding: 65px 15px 55px;
        border: 2px solid #ddd;
        border-radius: 20px;
        background-color: #222;
        box-shadow: 20px 20px 40px #887;
    }
</style>
<link href="/css/profile.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')

    <div class="" style="padding-top: 80px; margin-left: 50px;">
        @if (Session::has('message'))
            <div class="alert alert-danger">{{ Session::get('message') }}</div>
        @endif
        {{--@include('partials.head_profile')--}}
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-8" style="margin-top: 20px">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Сделать вклад
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12 ">
                                {!! Form::model($deposit,['route'=>['money.store'], 'method' => 'POST',
                                'class'=>'form-horizontal', 'role'=>'form']) !!}
                                <div class="row" >
                                    <div class="form-group col-md-6">
                                        <label for="name" class="control-label">Имя</label>
                                        <input type="text" class="form-control" id="name" name="name" required value="{{ $user->name }}" disabled>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email" class="control-label">Почта</label>
                                        <input type="text" class="form-control" id="email" name="email" required value="{{ $user->email }}" disabled>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="currency_id" class="control-label">Отдаете</label>
                                        <select id="currency_id" class="form-control" name="currency_id" required>
                                            <option value="">Выберете план</option>
                                            @foreach($currencies as $currency)
                                                <option value="{{ $currency->id }}">{{ $currency->type->name }} {{ $currency->days }} дней / под
                                                {{ $currency->percent }} %</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="amount" class="control-label">Сумма вклада EL /<strong> Ваш баланс {{ $user->balance }} EL</strong></label>
                                        <input type="number" class="form-control" id="amount" name="amount" min="1" required  disabled/>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="total" class="control-label">Сумма на выходе EL</label>
                                        <input type="text" class="form-control" id="total" name="total" required  readonly="readonly" />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <textarea class="form-control"  id="message" name="message" placeholder="Примечание" maxlength="140" rows="2"></textarea>
                                    </div>
                                </div>

                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />

                                <input type="hidden" id=days name="days"  />

                                <input type="hidden" id=percent name="percent" />

                                <div class="form-group col-lg-12">
                                    <button type='submit' id="submit" name="submit" class="btn btn-primary pull-right">Сделать вклад</button>
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
            <div class="col-lg-3">
                <div class="">
                    <img class="img-responsive img-rounded" src="/img/iphone.jpg" style="width: 78%; margin-left: 60px; margin-top: 20px;">
                </div>
            </div>
        </div>
    </div>


@stop
@section('js')
    <script>
        $(document).ready(function() {

            var plan = '';

            $('#currency_id').change(function () {
                var option = $(this).val();
                $.post('/get_plan', {
                    "plan": option, "_token": "{{ csrf_token() }}"
                }, function (data, status) {
                    plan = data;
                });

                $("#amount").removeAttr("disabled");
            });

            $('#amount').change(function () {
                var amount = parseInt($(this).val());
                var total = (amount * ((plan.percent / plan.days) / 100)) * plan.days + parseInt(amount);
                $('#total').val(total);
                $('#days').val(plan.days);
                $('#percent').val(plan.percent);
            });

        });
    </script>
@endsection
