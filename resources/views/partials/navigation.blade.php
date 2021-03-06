<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top" @if(Request::url() !== env('URL'))style="background-color: cadetblue;"@endif>
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand page-scroll" href="{{ url('/') }}">Elcoin Bank</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li>
                    <a class="page-scroll" href="{{ url('/rules') }}">Правила</a>
                </li>
                <li>
                    <a class="page-scroll" href="{{ url('/conditions') }}">Условия</a>
                </li>
                <li>
                    <a class="page-scroll" href="{{ url('/news') }}">Новости</a>
                </li>
                <li>
                    <a class="page-scroll" href="{{ url('/faq') }}">Вопросы</a>
                </li>
                <li>
                    <a class="page-scroll" href="https://join.skype.com/k7TKH17IHzUC">Skype</a>
                </li>
                @if (Auth::guest())
                    <li>
                        <a class="page-scroll" href="{{ url('/login') }}">Вход</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="{{ url('/register') }}">Регистрация</a>
                    </li>
                @else

                    <li>
                        <a class="page-scroll" href="{{ url('/profile') }}">Мой кабинет</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="{{ url('/logout') }}">Выйти</a>
                    </li>
                @endif

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

