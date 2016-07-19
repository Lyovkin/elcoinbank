@extends('layouts.profile_layout')

@section('title')
    Перевести элькоины
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
                            Перевести элькоины на баланс
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
                                            <label for="amount" class="control-label">Сумма</label>
                                            <input type="text" class="form-control" id="amount" name="amount" required />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="payment" class="control-label">Со счета</label>
                                            <input type="text" class="form-control" id="payment" name="payment" value="{{ $user->profile->wallet }}" disabled required />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <textarea class="form-control"  id="message" name="message" placeholder="Примечание" maxlength="140" rows="2"></textarea>
                                        </div>
                                    </div>

                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />

                                    <input type="hidden" name="currency_id" value=1 />

                                    <div class="form-group col-lg-12">
                                        <button type='submit' id="submit" name="submit" class="btn btn-primary pull-right">Отправить заявку</button>
                                    </div>

                                    <div class="form-group col-md-12" id="pay">
                                        <p><strong>Номер для перевода:<span id="name_check"></span> </strong></p>
                                        <input type="text" class="form-control" id="check" readonly />
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

            $.post('/get_currency_elcoin', {
                "_token": "{{ csrf_token() }}"
            }, function (data) {
                currency = JSON.parse(data);
                $('#check').val(currency.wallet);
                $('#name_check').text(currency.currency.name);
            });
        });

        $('#amount').change(function () {
            var amount = $(this).val();
            var total = amount * currency.course_purchase;
            $('#total').val(total);
        });

    </script>
@endsection
