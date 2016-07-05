@extends('layouts.app')

@section('title')
        Главная
@endsection

@section('css')
    <link href="/css/banner.css" rel="stylesheet" type="text/css" />
@endsection

@section('header')
    @include('partials.header')
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
@endsection

@section('content')
        <!-- Services Section -->
<section id="services" style="padding: 70px 0;font-size: 17px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-5">
                    <h2>Что такое elCoin?</h2>
                    <p style="font-size: 17px;">Elephant – это мультифункциональная экономическая платформа,
                        которая дает возможность создавать и вести бизнес по-новому. В основе проекта лежит
                        блокчейн криптомонета elCoin. elCoin является децентрализованной криптовалютой, базирующейся
                        на сети Ethereum.
                        ElCoin - цифровой токен контракта Elephant в
                        сети Ethereum. Это расчетная единица, действующая в рамках своего контракта. ElCoin -
                        Криптовалюта с следующими характеристиками:
                    </p>
                    <ul>
                        <li>Скорость подтверждения транзакции от 12 секунд</li>
                        <li>PoS вознаграждение до 50% в год на минимальный баланс кошелька за 10 дн.</li>
                        <li>Низкие комиссии за транзакцию</li>
                    </ul>
                </div>
                <div class="col-md-offset-7" style="margin-top: 20px;" id="c_video">
                    <iframe width="550" height="350" src="https://www.youtube.com/embed/vRNWfmrZQx8"
                            frameborder="0" allowfullscreen class="video"></iframe>
                </div>
            </div>
        </div>
        <div class="row text-center" style="margin-top: 70px;">
            <p class="h3 text-center">Торговля на бирже криптовалют позволяет приносить хорошую и значительную прибыль.</p>
            <br />
            <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-money fa-stack-1x fa-inverse"></i>
                    </span>
                <h4 class="service-heading">Прибыль</h4>
                <p class="text-muted" style="font-size: 17px;">Прибыль поступает из биржи криптовалюты + ММВБ акции.</p>
            </div>
            <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-laptop fa-stack-1x fa-inverse"></i>
                    </span>
                <h4 class="service-heading">Автоматизированный источник дохода</h4>
                <p class="text-muted">Вам лишь достаточно пополнить баланс и уже с первых дней Вы начнете получать прибыль.</p>
            </div>
            <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
                    </span>
                <h4 class="service-heading">Различные акции проекта</h4>
                <p class="text-muted">На протяжении работы проекты мы будем проводить различные конкурсы и акции для наших участников.</p>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" style="padding: 10px 10px;">
    <div class="col-md-12" id="banner">
        <p class="h3 text-center steps">4 простых шага для участия</p>
        <div class="sixteen columns">
            <div id="applicationStatus">
                <ul class="applicationStatus">
                    <li class="applicationStatus">Укажите валюту для покупки<i class="fa fa-money"></i></li>
                    <li class="applicationStatusGood">Укахжите валюту для оплаты<i class="fa fa-money"></i></li>
                    <li class="applicationStatusNoGood">Укажите реквизиты<i class="fa fa-cc-mastercard"></i></li>
                    <li class="applicationStatus" style="background-color:#3B7C1F;">Оплатите удобным для Вас способом
                        <i class="fa fa-check-square-o" aria-hidden="true"></i></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-offset-3 col-md-6" style="margin-top: 100px; font-size: 17px;">
        <div class="list-group">
            <a class="list-group-item list-group-item-success" >Возможность использования различных биржевых инструментов
             и простой выпуск новых уникальных в 2 клика.</a>
            <a class="list-group-item list-group-item-success" >Возможность привлечения инвестиций под свою бизнес-идею.</a>
            <a class="list-group-item list-group-item-success">Легкое инвестирование даже одного цента в надежные и доходные инвестиционные фонды.</a>
            <a class="list-group-item list-group-item-success">Новые уникальные иструменты для ведения частного бизнеса.</a>
            <a class="list-group-item list-group-item-success">Безрисковые контракты без привлечения третьей стороны.</a>
            <a class="list-group-item list-group-item-success">Множество способов получить доход в проекте.</a>
            <a class="list-group-item list-group-item-success">Уникальная бизнес-площадка для реализации идей.</a>
        </div>
    </div>
</section>

<!-- Clients Aside -->
<aside class="clients">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <a href="#">
                    <img src="img/logos/envato.jpg" class="img-responsive img-centered" alt="">
                </a>
            </div>
            <div class="col-md-3 col-sm-6">
                <a href="#">
                    <img src="img/logos/designmodo.jpg" class="img-responsive img-centered" alt="">
                </a>
            </div>
            <div class="col-md-3 col-sm-6">
                <a href="#">
                    <img src="img/logos/themeforest.jpg" class="img-responsive img-centered" alt="">
                </a>
            </div>
            <div class="col-md-3 col-sm-6">
                <a href="#">
                    <img src="img/logos/creative-market.jpg" class="img-responsive img-centered" alt="">
                </a>
            </div>
        </div>
    </div>
</aside>

<!-- Contact Section -->
<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Связаться с нами</h2>
                <h3 class="section-subheading text-muted">Мы всегда Вам ответим</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form method="post" action="{{ route('request.store') }}">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Ваше имя *" id="name" required data-validation-required-message="Please enter your name.">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Ваш email *" id="email" required data-validation-required-message="Please enter your email address.">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input type="tel" name="tel" class="form-control" placeholder="Ваш телефон *" id="phone" required data-validation-required-message="Please enter your phone number.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <textarea class="form-control" name="message" placeholder="Сообщение *" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="clearfix"></div>
                        <div class="col-lg-12 text-center">
                            <div id="success"></div>
                            <button type="submit" class="btn btn-xl">Отправить <i class="fa fa-paper-plane"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@include('partials.footer')

@endsection
@section('js')
    <script>

        $(document).ready(function() {
            //Docs at http://www.chartjs.org
            var pie_data = [
                {
                    value: 300,
                    color:"#4DAF7C",
                    highlight: "#55BC75",
                    label: "Вложили"
                },
                {
                    value: 50,
                    color: "#EAC85D",
                    highlight: "#f9d463",
                    label: "Вывели"
                },
                {
                    value: 100,
                    color: "#E25331",
                    highlight: "#f45e3d",
                    label: "Участников"
                },
                {
                    value: 35,
                    color: "#F4EDE7",
                    highlight: "#e0dcd9",
                    label: "Ожидают"
                }
            ]

            var line_data = {
                labels: ["10", "05", "12", "15", "20", "25", "30", "31", "1", "2", "4", "7", "8", "7"],
                datasets: [
                    {
                        label: "",
                        fillColor: "rgba(77, 175, 124,1)",
                        strokeColor: "rgba(255,255,255,1)",
                        pointColor: "rgba(255,255,255,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(151,187,205,1)",
                        data: [107.18, 107.13, 107.00, 106.89, 106.91, 107.12, 107.06, 107.04, 107.10, 107.14, 107.16, 107.20, 107.21, 107.26]
                    }
                ]
            };


            var bar_data = {
                labels: ["Monday", "Tuesday", "Wednesday", "Thrusday", "May", "June", "July"],
                datasets: [
                    {
                        fillColor: "rgba(226,83,49,1)",
                        strokeColor: "rgba(226,83,49,1)",
                        highlightFill: "rgba(226,83,49,0.5)",
                        highlightStroke: "rgba(226,83,49,0.5)",
                        data: [65, 59, 80, 81, 56, 55, 40]
                    }
                ]
            };


            // PIE CHART WIDGET
            var ctx = document.getElementById("myPieChart").getContext("2d");
            var myDoughnutChart = new Chart(ctx).Doughnut(pie_data,
                    {
                        responsive:true,
                        tooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %> "
                    });


            // LINE CHART WIDGET
            var ctx2 = document.getElementById("myLineChart").getContext("2d");
            var myLineChart = new Chart(ctx2).Line(line_data,
                    {
                        responsive:true,
                        scaleShowGridLines : false,
                        scaleShowLabels: false,
                        showScale: false,
                        pointDot : true,
                        bezierCurveTension : 0.2,
                        pointDotStrokeWidth : 1,
                        pointHitDetectionRadius : 5,
                        datasetStroke : false,
                        tooltipTemplate: "<%= value %><%if (label){%> - <%=label%><%}%>"
                    });

            // BAR CHART ON LINE WIDGET
            var ctx3 = document.getElementById("myBarChart").getContext("2d");
            var myBarChart = new Chart(ctx3).Bar(bar_data,
                    {
                        responsive:true,
                        scaleShowGridLines : false,
                        scaleShowLabels: false,
                        showScale: false,
                        pointDot : true,
                        datasetStroke : false,
                        tooltipTemplate: "<%= value %><%if (label){%> - <%=label%><%}%>"
                    });

        });
    </script>
@endsection