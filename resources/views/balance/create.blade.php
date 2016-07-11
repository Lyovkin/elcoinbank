@extends('layouts.profile_layout')

@section('title')
    Купить элькоины
@stop

@section('css')
    <link href="/css/profile.css" rel="stylesheet" type="text/css" />
    <style>
        .form-horizontal .form-group {
            margin-left: 0;
            margin-right: 0;
        }
    </style>
@endsection
@section('content')
    <div class="container" style="padding-top: 80px;">
        @if (Session::has('message'))
            <div class="alert alert-danger">{{ Session::get('message') }}</div>
        @endif
                    <!-- /.row -->
            <div class="row">
                <div class="col-lg-12" style="margin-top: 20px">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Купить элькоины
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    {!! Form::model($purchase,['route'=>['buy.store'], 'method' => 'POST', 'class'=>'form-horizontal', 'role'=>'form']) !!}
                                    <div class="row" >
                                        <div class="form-group col-md-6">
                                            <label for="name" class="control-label">Имя</label>
                                            <input type="text" class="form-control" id="name" name="name" required value="{{ $user->name }}" disabled>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="mail" class="control-label">Почта</label>
                                            <input type="text" class="form-control" id="mail" name="mail" required value="{{ $user->email }}" disabled>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="from_currency" class="control-label">Отдаете</label>
                                            <select id="from_currency" class="form-control" name="from_currency">
                                                @foreach($currencies as $currency)
                                                    <option value="{{ $currency->id }}">{{ $currency->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="from_amount" class="control-label">Сумма</label>
                                            <input type="text" class="form-control" id="from_amount" name="from_amount" required />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for="from_payment" class="control-label">Со счета</label>
                                            <input type="text" class="form-control" id="from_payment" name="from_payment" required />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="to_currency" class="control-label">Получаете</label>
                                            <select id="to_currency" class="form-control" name="to_currency">
                                                    <option value="">Elcoin</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="amount" class="control-label">Сумма</label>
                                            <input type="text" class="form-control" id="amount" name="amount" required disabled />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for="to_payment" class="control-label">На счет</label>
                                            <input type="text" class="form-control" id="to_payment" name="to_payment" required />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <input type="checkbox" id="trust" name="trust" style="zoom: 130%" required />
                                            <label for="trust" class="control-label">В доверительное управление</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <textarea class="form-control"  id="message" name="message" placeholder="Примечание" maxlength="140" rows="1"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <button type='submit' id="submit" name="submit" class="btn btn-primary pull-right">Отправить заявку</button>
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
    </div>
@stop

@section('js')
    <script>
        $(document).ready(function(){
            var currency = undefined;

            $('#from_currency').change(function() {
                var option = $(this).val();
                $.post('/get_currency', {"currency": option, "_token": "{{ csrf_token() }}"
                }, function(data, status) {
                    currency = JSON.parse(data);
                });
            });

            $('#from_amount').change(function(){
                var amount = $(this).val();
                var total = amount * currency.course_purchase;
                $('#amount').val(total);

            })

        });
    </script>
@endsection
