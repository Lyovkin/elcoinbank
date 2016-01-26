<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
        <div class="offer offer-default">
            <div class="shape">
                <div class="shape-text">
                    <i class="fa fa-money"></i>
                </div>
            </div>
            <div class="offer-content">
                <h3 class="lead">
                    Ваш баланс
                </h3>
                <p>
                    {{ Auth::user()->balance }}
                </p>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
        <div class="offer offer-success">
            <div class="shape">
                <div class="shape-text">
                    <i class="fa fa-users"></i>
                </div>
            </div>
            <div class="offer-content">
                <h3 class="lead">
                    Участников
                </h3>
                <p>
                    {{ $user_count }}
                </p>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
        <div class="offer offer-primary">
            <div class="shape">
                <div class="shape-text">
                    <i class="fa fa-percent"></i>
                </div>
            </div>
            <div class="offer-content">
                <h3 class="lead">
                    <i class="fa fa-percent"></i> прибыли
                </h3>
                <p id="percent" data-percent="{{ $percent['percent'] }}">
                    {{ $percent['percent'] }} <i class="fa fa-percent"></i>
                </p>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
        <div class="offer offer-success">
            <div class="shape">
                <div class="shape-text">
                    <i class="fa fa-diamond"></i>
                </div>
            </div>
            <div class="offer-content">
                <h3 class="lead">
                    Курс 1 elcoin
                </h3>
                <p id="course" data-course="{{ $course['course'] }}">
                    {{ $course['course'] }} <i class="fa fa-ruble"></i>
                </p>
            </div>
        </div>
    </div>
</div>