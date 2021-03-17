@extends('master')

@section('title', 'Категория'. $category->name)

@section('content')

    <div class="starter-template">

        <h1>
            {{ $category->name }}


{{--            @if($category == 'mobiles')--}}
{{--                Мобильные телефоны--}}
{{--            @elseif($category == 'portable')--}}
{{--                Портативная техника--}}
{{--            @elseif($category == 'appliances')--}}
{{--                Бытовая техника--}}
{{--            @endif--}}

        </h1>
        Количество: {{ $category->products->count() }}
        <p>
            {{ $category->description }}
        </p>
        <div class="row">
            @foreach($category->products as $product)
                @include('card', compact('product'))
            @endforeach

        </div>
    </div>
@endsection
