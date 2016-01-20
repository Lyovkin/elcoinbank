@extends('layouts.app')

@section('title')
        Главная
@endsection

@section('header')
    @include('partials.header')
@endsection

@section('content')
        <!-- Services Section -->
<section id="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">О нас</h2>
                <h3 class="section-subheading text-muted">Время - деньги. Не упусти шанс.</h3>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-money fa-stack-1x fa-inverse"></i>
                    </span>
                <h4 class="service-heading">Ежедневная прибыль</h4>
                <p class="text-muted">Торговля на бирже криптовалют позволяет приносить хорошую и значительную прибыль.</p>
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

<!-- Portfolio Grid Section -->
<section id="portfolio" class="bg-light-gray">
    <div class="container">
        <div class="row text-center">
            <h3>Планы вкладов</h3>
        </div>
        <div class="row db-padding-btm db-attached">
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="db-wrapper">
                    <div class="db-pricing-eleven db-bk-color-one">
                        <div class="price">
                            <sup></sup>#
                            <small>элькоинов</small>
                        </div>
                        <div class="type">
                            SMALL
                        </div>
                        <ul>

                            <li><i class="fa fa-percent"></i># процентов</li>
                            <li><i class="fa fa-calendar-times-o"></i>Легкий старт</li>
                            <li><i class="fa fa-money"></i>Небольшой заработок</li>
                        </ul>
                        <div class="pricing-footer">

                            <a href="#" class="btn db-button-color-square btn-lg">Заказать</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="db-wrapper">
                    <div class="db-pricing-eleven db-bk-color-two popular">
                        <div class="price">
                            <sup></sup>#
                            <small>элькоинов</small>
                        </div>
                        <div class="type">
                            MEDIUM
                        </div>
                        <ul>

                            <li><i class="fa fa-percent"></i># процентов</li>
                            <li><i class="fa fa-calendar-times-o"></i>Отличный старт</li>
                            <li><i class="fa fa-money"></i>Хороший заработок</li>
                        </ul>
                        <div class="pricing-footer">

                            <a href="#" class="btn db-button-color-square btn-lg">Заказать</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="db-wrapper">
                    <div class="db-pricing-eleven db-bk-color-three">
                        <div class="price">
                            <sup></sup>#
                            <small>элькоинов</small>
                        </div>
                        <div class="type">
                            ADVANCE
                        </div>
                        <ul>

                            <li><i class="fa fa-percent"></i># процентов</li>
                            <li><i class="fa fa-calendar-times-o"></i>Великолепный старт</li>
                            <li><i class="fa fa-money"></i>Большой заработок</li>
                        </ul>
                        <div class="pricing-footer">

                            <a href="#" class="btn db-button-color-square btn-lg">Заказать</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    </div>

</section>

<!-- About Section -->
<section id="about">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Docs at http://www.chartjs.org -->
    <script src="//www.chartjs.org/assets/Chart.min.js"></script>
    <div class="container">
        <div class="row">
            <!-- COLUMN ONE -->
            <div class="col-sm-6 col-md-4">
                <!--
                   ****** LINE CHART WIDGET *******
                   -->
                <div id="line-chart-widget" class="panel">
                    <div class="panel-heading">
                        <h4 class="text-uppercase"><strong>Elcoin Bank</strong><span class="label pull-right">107.26 <i class="fa fa-plus"></i>0.23(0.10%)</span><br><small>ElBank: Elcoin</small></h4>
                    </div>
                    <div class="panel-body">
                        <canvas id="myLineChart"></canvas>
                    </div>
                    <div class="panel-footer">
                        <div class="list-block">
                            <ul class="text-center legend">
                                <li>
                                    <h3>13.5 M</h3>
                                    Биржа
                                </li>
                                <li>
                                    <h3>28.44 B</h3>
                                    Криптовалюта
                                </li>
                            </ul>
                        </div>
                        <div class="chart-block clearfix">
                            <div class="pull-left">
                                Месячное скачок
                                <canvas id="myBarChart"></canvas>
                            </div>
                            <div class="pull-right">
                                Годовой скачок<br>
                                <div class="change text-center"><i class="fa fa-plus"></i> 86.01</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-sm-3 col-md-4">

            </div>

            <!-- COLUMN TWO -->
            <div class="col-sm-6 col-md-4">
                <!--
                   ****** CHART WIDGET *******
                   -->
                <div id="pie-chart-widget" class="panel">
                    <div class="panel-heading text-center">
                        <h5 class="text-uppercase"><strong>Статистика</strong></h5>
                    </div>
                    <div class="panel-body">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="panel-footer">
                        <div class="list-block">
                            <ul class="text-center legend">
                                <li class="video" style="margin-right: 1px;">
                                    Вложили
                                    <h2>62</h2>
                                </li>
                                <li class="photo">
                                    Вывели
                                    <h2>21</h2>
                                </li>
                                <li class="audio" style="margin-left: 1px;">
                                    Участников
                                    <h2>10</h2>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
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
                <form name="sentMessage" id="contactForm" novalidate>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Ваше имя *" id="name" required data-validation-required-message="Please enter your name.">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Ваш email *" id="email" required data-validation-required-message="Please enter your email address.">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input type="tel" class="form-control" placeholder="Ваш телефон *" id="phone" required data-validation-required-message="Please enter your phone number.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Сообщение *" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
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