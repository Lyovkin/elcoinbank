@extends('layouts.app')

@section('title')
    Вопросы
@endsection

@section('css')
    <link href="/css/faq.css" rel="stylesheet" type="text/css">
@endsection
@section('content')
    <div class="container" style="padding-top: 170px">
        <div class="row">

            <div class="timeline-centered">

                <article class="timeline-entry">

                    <div class="timeline-entry-inner">

                        <div class="timeline-icon bg-success">
                            <i class="entypo-feather"></i>
                        </div>

                        <div class="timeline-label">
                            <h2><a href="#">Чем мы занимаемся</a>
                            <p>Инвестируем в криптовалюту.</p>
                                <img src="/img/elcoin.png" class="img-responsive img-rounded full-width">
                        </div>
                    </div>

                </article>


                <article class="timeline-entry">

                    <div class="timeline-entry-inner">

                        <div class="timeline-icon bg-secondary">
                            <i class="entypo-suitcase"></i>
                        </div>

                        <div class="timeline-label">
                            <h2><a href="#">Как начать зарабатывать?</a></h2>
                            <p>Нужно зарегистрировать свой личный кабинет и пополнить свой баланс.</p>
                        </div>
                    </div>

                </article>


                <article class="timeline-entry">

                    <div class="timeline-entry-inner">

                        <div class="timeline-icon bg-info">
                            <i class="entypo-location"></i>
                        </div>

                        <div class="timeline-label">
                            <h2><a href="#"> Как внести средства на личный счет в проекте?</a></h2>
                            <p>В личном кабинете Вам будет доступен раздел "Пополнить баланс".</p>
                        </div>
                    </div>

                </article>


                <article class="timeline-entry">

                    <div class="timeline-entry-inner">

                        <div class="timeline-icon bg-warning">
                            <i class="entypo-camera"></i>
                        </div>

                        <div class="timeline-label">
                            <h2><a href="#">Когда я смогу вывести полученную прибыль?</a></h2>
                            <p>Заявки на вывод средств обрабатываются не более 24 часов с момента подачи.</p>


                        </div>
                    </div>

                </article>
                <article class="timeline-entry">

                    <div class="timeline-entry-inner">

                        <div class="timeline-icon bg-warning">
                            <i class="entypo-camera"></i>
                        </div>

                        <div class="timeline-label">
                            <h2><a href="#">Я забыл пароль от личного кабинета, что мне делать?</a></h2>
                            <p>Воспользуйтесь формой <a href="/password/reset" style="color: red;"> восстановления пароля.</a></p>
                        </div>
                    </div>

                </article>
                <article class="timeline-entry">

                    <div class="timeline-entry-inner">

                        <div class="timeline-icon bg-warning">
                            <i class="entypo-camera"></i>
                        </div>

                        <div class="timeline-label">
                            <h2><a href="#">Как связаться с тех. поддержкой?</a></h2>
                            <p>Связаться с нами всегда можно на сайте отправив заявку или в скайпе.</p>

                        </div>
                    </div>

                </article>
                <article class="timeline-entry begin">

                    <div class="timeline-entry-inner">

                        <div class="timeline-icon" style="-webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg);">
                            <i class="entypo-flight"></i> +
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
@endsection