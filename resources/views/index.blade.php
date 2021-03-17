@extends('master')


@section('title', 'Главная')

@section('content')
    <div class="starter-template">
        <div class="row">
            @foreach($products as $product)
                @include('card', compact('product'))
            @endforeach
        </div>
        <span> {{ $products->links('pagination::bootstrap-4') }}</span>

    </div>
@endsection
