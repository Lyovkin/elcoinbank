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
                                    {!! Form::model($purchase,['route'=>['purchase.store'], 'method' => 'POST', 'class'=>'form-horizontal', 'role'=>'form']) !!}
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
                                        <div class="form-group col-md-6">
                                            <label for="currency_id" class="control-label">Отдаете</label>
                                            <select id="currency_id" class="form-control" name="currency_id" required>
                                                <option value="">Выберете валюту</option>
                                                @foreach($currencies as $currency)
                                                    <option value="{{ $currency->id }}">{{ $currency->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="amount" class="control-label">Сумма</label>
                                            <input type="text" class="form-control" id="amount" name="amount" required  disabled />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for="payment" class="control-label">Со счета</label>
                                            <input type="text" class="form-control" id="payment" name="payment" required />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="to_currency" class="control-label">Получаете</label>
                                            <select id="to_currency" class="form-control" disabled>
                                                    <option value="">Elcoin</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="total" class="control-label">Сумма</label>
                                            <input type="text" class="form-control" id="total" name="total" readonly="readonly" required />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <input type="checkbox" id="status_trust" name="status_trust" value="true" style="zoom: 130%" />
                                            <label for="status_trust" class="control-label">В доверительное управление (при покупке EL вы можете их вложить в ElBank под % по завышенному курсу)</label>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <textarea class="form-control"  id="message" name="message" placeholder="Примечание" maxlength="140" rows="2"></textarea>
                                        </div>
                                    </div>

                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />



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
        $(document).ready(function() {
            var currency = {};

            $('#currency_id').change(function () {
                var option = $(this).val();
                console.log(option);
                $.post('/get_currency', {
                    "currency": option, "_token": "{{ csrf_token() }}"
                }, function (data, status) {
                    currency = JSON.parse(data);
                });
                $("#amount").removeAttr("disabled");
            });

            $('#amount').change(function () {
                var amount = $(this).val();
                var total = amount * currency.course_purchase;
                $('#total').val(total);
            });

//            $('#status_trust').change(function() {
//                if ($(this).is(':checked')) {
//                    $('#wallet').hide();
//                    return;
//                }
//                $('#wallet').show();
//            });
        });
    </script>
@endsection
