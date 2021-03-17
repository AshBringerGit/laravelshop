@extends('master')

@section('title', 'Товар')


  @section('content')
    <div class="starter-template">
        <h1>{{ $product }}</h1>
        <h2>Мобильные телефоны</h2>
        <p>Цена: <b>71990 ₽</b></p>

        <p>Отличный продвинутый телефон с памятью на 64 gb</p>


        <span>product.not_available</span>
        <br>
        <span>Сообщить мне, когда товар появится в наличии:</span>
        <div class="warning">
        </div>
        <form method="POST" action="#">
            <input type="hidden" name="_token" value="odJoR3kVBp1xGpfbr29qov3SmVFsu8wlWXT7jYXm">            <input type="text" name="email"></input>
            <button type="submit">Отправить</button>
        </form>
    </div>
  @endsection
