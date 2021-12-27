Пользователь {{ $user->title }} заказал следующие товары:<br>
@foreach ($order->goods as $good)
    ID товара - {{ $good->id }}   Название товара - {{ $good->title }}<br>
@endforeach