@extends('layouts.app')

@section('title')
    Условия
@endsection

@section('css')
    <link href="/css/conditions.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="container" style="padding-top: 170px;">
        <p class="h2"><strong>ElCoinBank</strong></p>
        <p class="h3">Мы платим проценты, за счет прибыли полученной на торговых площадках. Биржи ММВБ и биржи крипто валют.
            Ваши вклады - приносят Вам прибыль.</p>
        <hr />
        <p class="h3"><strong>Интернет-трейдинг</strong> – это самый простой и удобный способ покупать и продавать ценные бумаги на бирже
            с помощью торговой системы. Мы можем в режиме реального времени управлять общими активами и совершать торговые
            операции путем выставления заявок через Интернет на следующие торговые площадки: </p>
        <ul style="font-size: 18px;">
            <li>сектор «Основной рынок» фондового рынка Группы «Московской Биржи» (акции, государственные, корпоративные,
                муниципальные и субфедеральные облигации)
            </li>
            <li>срочный рынок (фьючерсные контракты)</li>
            <li>рынок криптовалют</li>
        </ul>
       <br />
        <p class="h3">Мы заботимся о Ваших вкладах. </p>
        <hr />
        <p class="h3">С уважением, команда <strong>ElCoinBank.</strong></p>
        <div class="col-md-5 col-md-offset-3">
            <img src="/img/conditions.jpg" id="cond" alt="Как мы работаем..." class="img-responsive"/>
        </div>
        <!-- The Modal -->
        <div id="myModal" class="modal">

            <!-- The Close Button -->
            <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>

            <!-- Modal Content (The Image) -->
            <img class="modal-content" id="img01">

            <!-- Modal Caption (Image Text) -->
            <div id="caption"></div>
        </div>
    </div>
@endsection

@section('js')
    <script src="/js/conditions.js"></script>
@endsection