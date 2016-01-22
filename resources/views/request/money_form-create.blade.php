<div class="col-md-4 " style="padding-top: 55px;margin-right: 25px;">
    <div class="phone">
        <img class="img-responsive img-rounded" src="/img/phone.jpeg">
    </div>
</div>
<div class="form-group col-lg-8">
    <input type="text" class="form-control" id="name" name="name" placeholder="Имя" required>
</div>
<div class="form-group col-lg-8">
    <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
</div>
<div class="form-group col-lg-8">
    <input type="text" class="form-control" id="mobile" name="tel" placeholder="Телефон" required>
</div>
<div class="form-group col-lg-8">
    <label for="disabledSelect" class="control-label">Количество дней</label>
        <select id="disabledSelect" class="form-control" name="days">
            @foreach($days as $day)
                <option value="{{ $day->days }}">{{ $day->days }}</option>
            @endforeach
        </select>
</div>


<div class="form-group col-lg-8">
    <label for="course" class="control-label">Курс <i class="fa fa-ruble"></i> </label>
    <input type="text" class="form-control" id="course" name="course" placeholder="Курс" readonly="readonly" value="{{ $course['course'] }}">
</div>


<div class="form-group col-lg-8">
    <label for="percent" class="control-label">Процент <i class="fa fa-percent"></i> </label>
    <input type="text" class="form-control" id="percent" name="percent" placeholder="Курс" readonly="readonly" value="{{ $percent['percent'] }}">
</div>
<div class="form-group col-lg-8">
    <input type="text" class="form-control" id="mobile" name="wallet" placeholder="Elcoin - кошелек" required>
</div>
<div class="form-group col-lg-8">
    <input type="text" class="form-control" id="mobile" name="amount" placeholder="Сумма перевода" required>
</div>
<div class="form-group col-lg-8 ">
    <textarea class="form-control" type="textarea" id="message" name="message" placeholder="Примечание" maxlength="140" rows="10"></textarea>
</div>
<div class="form-group col-lg-12">
    <button type='submit' id="submit" name="submit" class="btn btn-primary pull-right">Отправить заявку</button>
</div>


