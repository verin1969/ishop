<h2>Здравствуйте, {{ $firstname }}!</h2>
<p>Мы рады приветствовать вас в нашем интернет-магазине</p>
<p>Для входа, перейдите по <a href="{{ asset('login') }}" target="_blank">ссылке</a>, введите свой логин и пароль</p>
<p>Ваш логин: <strong>{{ $login }}</strong></p>
<p>Ваш пароль: <strong>{{ $password }}</strong></p>
<h4>Контактная информация:</h4>
<p>Телефон: {{ config('setting.phone','+7999-777-99-77') }}</p>
<p>Адрес: {{ config('setting.address','Moscow') }}</p>
<p>Email: <a href="mailto:{{ config('setting.email','verin@allwebstudio.ru') }}">{{ config('setting.email','verin@allwebstudio.ru') }}</a></p>