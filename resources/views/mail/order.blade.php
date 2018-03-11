<h2>Здравствуйте, {{ $user }}!</h2>
<p>Ваша заявка принята.</p>
<p>Менеджер компании <a href="http://allwebstudio.ru" target="_blank">{{ config('setting.company', 'AllWEB') }}</a> свяжется с Вами в ближайшее время.</p>
<h4>Заказ № {{ $order->id }}</h4>
<p>дата заказа {{ $order->created_at }}</p>

<table style="width: 100%;border: 4px double black;border-collapse: collapse;">
    <thead>
        <tr>
            <th style="text-align: left;background: #ccc;padding: 5px;border: 1px solid black;">Код товара</th>
            <th style="text-align: left;background: #ccc;padding: 5px;border: 1px solid black;">Название</th>
            <th style="text-align: left;background: #ccc;padding: 5px;border: 1px solid black;">Цена</th>
            <th style="text-align: left;background: #ccc;padding: 5px;border: 1px solid black;">Количество</th>
            <th style="text-align: left;background: #ccc;padding: 5px;border: 1px solid black;">Сумма</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cart as $product)
        <tr>
            <td style="padding: 5px;border: 1px solid black;">{{ $product->id }}</td>
            <td style="padding: 5px;border: 1px solid black;">{{ $product->name }}</td>
            <td style="padding: 5px;border: 1px solid black;">{{ $product->price }} {{ $currency }}</td>
            <td style="padding: 5px;border: 1px solid black;">{{ $product->qty }}</td>
            <td style="padding: 5px;border: 1px solid black;">{{ $product->subtotal}} {{ $currency }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<h3 style="float:right">К оплате: <span>{{ Cart::total() }}</span> {{ $currency }}</h3>
<h4>Ваш комментарий</h4>
<p>{!! $order->comment !!}</p>

<h4>Контактная информация</h4>
<p>Телефон: {{ config('setting.phone','+7999-777-99-77') }}</p>
<p>Адрес:   {{ config('setting.address','Moscow') }}</p>
<p>Email:   <a href="mailto:{{ config('setting.email','verin@allwebstudio.ru') }}">{{ config('setting.email','verin@allwebstudio.ru') }}</a></p>