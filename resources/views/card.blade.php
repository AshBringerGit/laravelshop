<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <div class="labels">


        </div>

        <div class="caption">
            <h3>{{ $product->name }}</h3>
            <p>{{ $product->price }} ₽</p>
            <p>В наличии: {{ $product->count }}</p>
            <p>
            {{ $product->category->name }}
            <form action="#" method="POST">

                Не доступен
                @if(Auth::check())
                    <a href="/product/remove/{{ $product->id }}" links
                       class="btn btn-default"
                       role="button">Удалить</a>
                    <a href="/product/edit/{{ $product->id }}" links
                       class="btn btn-default"
                       role="button">Изменить</a>
                @endif
                <input type="hidden" name="_token" value="odJoR3kVBp1xGpfbr29qov3SmVFsu8wlWXT7jYXm"></form>
            </p>
        </div>
    </div>
</div>
