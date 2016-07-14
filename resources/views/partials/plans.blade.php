<div class="col-md-12">
    <div class="row">
        <div class="col-md-12">
            <p class="text-center h3">Инвест-план: "Пополнение баланса Elcoin"</p>
        </div>
        <div class="row">
            @foreach($plans1 as $plan)
                <div class="col-md-4" style="margin-top: 8px;">
                <div class="pricing-table">
                    <div class="panel panel-primary" style="border: none;">
                        <div class="controle-header panel-heading panel-heading-landing">
                            <h1 class="panel-title panel-title-landing">
                                <span id="percent">Процент вклада: {{ $plan->percent }} %</span>
                                <span id="days">Количество дней: {{ $plan->days }}</span>
                            </h1>
                        </div>
                        <div class="panel-body panel-body-landing" style="padding-top: 0; @if(Request::path() == '/') display:none; @endif">
                            <table class="table" style="margin-bottom: 0">
                                <tr>
                                    <td width="50px"><i class="fa fa-money"></i></td>
                                    <td id="total"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <br />
        <div class="col-md-12">
            <p class="text-center h3">Инвест-план: "Покупка Elcoin"</p>
        </div>
        <div class="row">
            @foreach($plans2 as $plan)
                <div class="col-md-4">
                <div class="pricing-table">
                    <div class="panel panel-primary" style="border: none;">
                        <div class="controle-header panel-heading panel-heading-landing">
                            <h1 class="panel-title panel-title-landing">
                                <span id="percent">Процент вклада: {{ $plan->percent }} %</span>
                                <span id="days">Количество дней: {{ $plan->days }}</span>
                            </h1>
                        </div>
                        <div class="panel-body panel-body-landing" style="padding-top: 0; @if(Request::path() == '/') display:none; @endif">
                            <table class="table" style="margin-bottom: 0">
                                <tr>
                                    <td width="50px"><i class="fa fa-money"></i></td>
                                    <td id="total"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>