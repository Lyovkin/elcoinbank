@extends('layouts.app')

@section('title')
        Главная
@endsection

@section('css')
    <link href="/css/banner.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        #messages{
            border: 1px solid #e0dbdb;
            height: 300px;
            margin-bottom: 8px;
            overflow-y: scroll;
            padding: 5px;
            font-style: italic;
            color: #2d2020;
        }
        .pricing-table {
            max-width: 368px;
            margin: 0 auto;
            transition: all .3s ease;
            -o-transition: all .3s ease;
            -moz-transition: all .3s ease;
            -webkit-transition: all .3s ease;
            border-radius: 0px;
        }
        .pricing-table:hover {
            box-shadow: 0px 0px 30px rgba(0,0,0, .2);
        }
        .pricing-table:hover>.panel-footer-landing {
            box-shadow: 0px 0px 30px rgba(0,0,0, .05) inset;
            -webkit-transition:  all .3s ease;
        }
        .pricing-table:hover>.panel>.panel-body-landing {
            background: #5CB85C;
            -webkit-transition:  all .3s ease;
        }
        .pricing-table:hover>.panel>.panel-heading-landing-box {
            background: #f0f0f0 !important;
            color: #333 !important;
            -webkit-transition:  all .3s ease;
        }
        .pricing-table:hover>.panel>.controle-header {
            background: #5CB85C !important;
            /*    border: solid 2px #5CB85C !important;*/
            -webkit-transition:  all .3s ease;
        }
        .pricing-table:hover>.panel>.panel-footer {
            background: #5CB85C !important;
            /*    border: solid 2px #5CB85C !important;*/
            -webkit-transition:  all .3s ease;
        }
        .pricing-table:hover>.panel>.panel-footer>.btn {
            border: solid 1px #fff !important;
            -webkit-transition:  all .3s ease;
        }
        .btn-price:hover {
            background: #fff !important;
            color: #5CB85C !important;
            -webkit-transition:  all .3s ease;
        }
        .pricing-table:hover>.panel>.controle-header>.panel-title-landing {
            color: #fff !important;
            -webkit-transition:  all .3s ease;
        }
        .pricing-table:hover>.panel>.panel-body-landing>.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
            color: #fff !important;
            -webkit-transition:  all .3s ease;
        }
        .panel-heading-landing {
            background: #f7f7f7 !important;
            padding: 20px !important;
            border-top-left-radius: 10px !important;
            border-top-right-radius: 10px !important;
            border: solid 2px #5CB85C !important;
            border-bottom: none !important;
            text-align: center;
        }
        .panel-heading-landing-box {
            background: #5CB85C !important;
            color: #fff !important;
            font-size: 16px !important;
            padding: 3px !important;
            border: solid 2px #5CB85C !important;
            border-top: none !important;
        }
        .panel-title-landing {
            color: #626367 !important;
            font-size: 25px;
            font-weight: bold;
        }
        .panel-body-landing {
            border: solid 2px #ccc !important;
            border-top: none !important;
            border-bottom: none !important;
        }
        .panel-footer-landing {
            border: solid 2px #ccc !important;
            border-bottom-left-radius: 10px !important;
            border-bottom-right-radius: 10px !important;
            border-top: none !important;
        }
        .font-bold {
            font-size: 17px;
        }
    </style>
@endsection

@section('header')
    @include('partials.header')
    @if (Session::has('message_app'))
        <div class="alert alert-info">{{ Session::get('message_app') }}</div>
    @endif
@endsection

@section('content')
        <!-- Services Section -->
<section id="services" style="padding: 70px 0;font-size: 17px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-5">
                    <h2>Elcoin Bank</h2>
                    <p class="font-bold">Мы платим проценты, за счет прибыли полученной на торговых площадках.
                        Биржи ММВБ и биржи крипто валют. Ваши вклады - приносят Вам прибыль.
                    </p>
                    <p class="font-bold">
                        Интернет-трейдинг – это самый простой и удобный способ покупать и продавать ценные бумаги на
                        бирже с помощью торговой системы. Мы можем в режиме реального времени управлять общими
                        активами и совершать торговые операции путем выставления заявок через Интернет на следующие торговые площадки:
                    </p>
                    <ul>
                        <li>Cектор «Основной рынок» фондового рынка Группы «Московской Биржи» (акции, государственные,
                            корпоративные, муниципальные и субфедеральные облигации)</li>
                        <li>Cрочный рынок (фьючерсные контракты)</li>
                        <li>Рынок криптовалют</li>
                    </ul>
                </div>
                <div class="col-md-7">
                    <div class="container spark-screen">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-1">
                                <div class="panel panel-default">
                                    <div class="panel-heading">ElCoinBank Чат <i class="fa fa-comments-o" style="float: right;"></i></div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div id="messages">
                                                    @if(isset($messages))
                                                        @foreach($messages as $message)
                                                            <span class="label label-info"><strong>{{ $message->user->name }}</strong></span>
                                                        @if(Auth::check())
                                                            @if(Auth::user()->hasRole('admin'))
                                                                <form id="del" action="deletemessage" method="POST">
                                                                    <input type="hidden" name="id" value="{{ $message->id}}">
                                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" >
                                                                    <input id="del_msg" style="float: right;
                                                    color: #0a0c0e; background-color: #fff; border: none;
                                                    margin-left: 5px;" type="submit" value="&cross;">
                                                                </form>
                                                            @endif
                                                         @endif
                                                            <span id="time" class="badge" style="float: right">
                                                <i class="fa fa-clock-o" aria-hidden="true"></i> {{ $message->createdAt }}
                                            </span>
                                                            <p>{{ $message->message }}</p>
                                                        @endforeach
                                                        @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <form action="sendmessage" method="POST">
                                                    @if(Auth::check())
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" >
                                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                        <input type="hidden" name="user" value="{{ Auth::user()->name }}">
                                                    @endif
                                                    <textarea class="form-control msg"
                                                              @if(! Auth::check()) disabled @endif></textarea>
                                                    <br/>
                                                    <button type="button" class="btn btn-success send-msg "
                                                    @if(! Auth::check()) disabled @endif><i class="fa fa-send-o"></i>
                                                       Отправить </button>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br />
        <div class="row text-center">
            <div class="col-md-12">
                <img src="/img/steps.png" style="width: 100%"/>
            </div>
        </div>
        <br />
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <p class="text-center h3">Инвест-планы для вкладчиков</p>
                </div>
                <div class="row">
                    <div class="col-md-4" style="margin-top: 20px;">
                        <div class="pricing-table">
                            <div class="panel panel-primary" style="border: none;">
                                <div class="controle-header panel-heading panel-heading-landing">
                                    <h1 class="panel-title panel-title-landing">
                                        Легкий 4%
                                    </h1>
                                </div>
                                <div class="panel-body panel-body-landing">
                                    <table class="table">
                                        <tr>
                                            <td width="50px"><i class="fa fa-check"></i></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td width="50px"><i class="fa fa-check"></i></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td width="50px"><i class="fa fa-check"></i></td>
                                            <td></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" style="margin-top: 20px;">
                        <div class="pricing-table">
                            <div class="panel panel-primary" style="border: none;">
                                <div class="controle-header panel-heading panel-heading-landing">
                                    <h1 class="panel-title panel-title-landing">
                                        Средний 10%
                                    </h1>
                                </div>
                                <div class="panel-body panel-body-landing">
                                    <table class="table">
                                        <tr>
                                            <td width="50px"><i class="fa fa-check"></i></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td width="50px"><i class="fa fa-check"></i></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td width="50px"><i class="fa fa-check"></i></td>
                                            <td></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" style="margin-top: 20px;">
                        <div class="pricing-table">
                            <div class="panel panel-primary" style="border: none;">
                                <div class="controle-header panel-heading panel-heading-landing">
                                    <h1 class="panel-title panel-title-landing">
                                        Премиум 35%
                                    </h1>
                                </div>
                                <div class="panel-body panel-body-landing">
                                    <table class="table">
                                        <tr>
                                            <td width="50px"><i class="fa fa-check"></i></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td width="50px"><i class="fa fa-check"></i></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td width="50px"><i class="fa fa-check"></i></td>
                                            <td></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br />
                <div class="col-md-12">
                    <p class="text-center h3">Инвест-планы для покупателей</p>
                </div>
                <div class="row">
                    <div class="col-md-4" style="margin-top: 20px;">
                        <div class="pricing-table">
                            <div class="panel panel-primary" style="border: none;">
                                <div class="controle-header panel-heading panel-heading-landing">
                                    <h1 class="panel-title panel-title-landing">
                                        Легкий 4%
                                    </h1>
                                </div>
                                <div class="panel-body panel-body-landing">
                                    <table class="table">
                                        <tr>
                                            <td width="50px"><i class="fa fa-check"></i></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td width="50px"><i class="fa fa-check"></i></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td width="50px"><i class="fa fa-check"></i></td>
                                            <td></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" style="margin-top: 20px;">
                        <div class="pricing-table">
                            <div class="panel panel-primary" style="border: none;">
                                <div class="controle-header panel-heading panel-heading-landing">
                                    <h1 class="panel-title panel-title-landing">
                                        Средний 10%
                                    </h1>
                                </div>
                                <div class="panel-body panel-body-landing">
                                    <table class="table">
                                        <tr>
                                            <td width="50px"><i class="fa fa-check"></i></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td width="50px"><i class="fa fa-check"></i></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td width="50px"><i class="fa fa-check"></i></td>
                                            <td></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" style="margin-top: 20px;">
                        <div class="pricing-table">
                            <div class="panel panel-primary" style="border: none;">
                                <div class="controle-header panel-heading panel-heading-landing">
                                    <h1 class="panel-title panel-title-landing">
                                        Премиум 35%
                                    </h1>
                                </div>
                                <div class="panel-body panel-body-landing">
                                    <table class="table">
                                        <tr>
                                            <td width="50px"><i class="fa fa-check"></i></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td width="50px"><i class="fa fa-check"></i></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td width="50px"><i class="fa fa-check"></i></td>
                                            <td></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br />
        <div class="row text-center" style="margin-top: 70px;">
            <p class="h3 text-center">Торговля на бирже криптовалют позволяет приносить хорошую и значительную прибыль.</p>

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
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.0.0/jquery-migrate.min.js"></script>
    <script src="https://cdn.socket.io/socket.io-1.3.4.js"></script>
    <script>
        var socket = io.connect('{{ env('URL') }}:8890');
        //var socket = io.connect('http://localhost:8890')
        socket.on('message', function (data) {
            data = jQuery.parseJSON(data);
            //console.log(data.user);
            $( "#messages" ).append( "<strong>"+data.user+":</strong><p>"+data.message+"</p>" );
        });

        function sendMessage() {
            var token = $("input[name='_token']").val();
            var id = $("input[name='user_id']").val();
            var user = $("input[name='user']").val();
            var msg = $(".msg").val();
            if(msg != ''){
                $.ajax({
                    type: "POST",
                    url: '{!! URL::to("sendmessage") !!}',
                    dataType: "json",
                    data: {'_token':token,'message':msg,'user':user, 'id': id},
                    success:function(data){
                        console.log(data);
                        $(".msg").val('');
                    }
                });
            }else{
                alert("Пожалуйста, введите сообщение!");
            }
        }

        $("#del_msg").click(function(e) {
            e.preventDefault();
            var id = $("input[name='id']").val();
            $.ajax({
                type: "POST",
                url: '{!! URL::to("deletemessage") !!}',
                data: {'_token':token, 'id': id}
            })
        });

        $(".send-msg").click(function(e){
            e.preventDefault();
            sendMessage();
        });

        $('html').keydown(function(e){
            if (event.keyCode == 13) {
                e.preventDefault();
                sendMessage();
            }
        });
    </script>
@endsection