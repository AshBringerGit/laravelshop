@extends('master')

@section('title', 'Все категории')


@section('content')
    <div class="starter-template">
        @foreach($categories as $category)
            <div class="panel">
                <a href="{{ route('category', $category->code)}}">

                    <h2>{{$category->name}}</h2>
                </a>
                <p>
                    {{$category->description}}
                </p>
                @if(Auth::check())
                    <a href="/categories/remove/{{ $category->id }}">
                        <button type="submit" class="btn">Удалить</button>

                    </a>
                    <a href="/categories/edit/{{ $category->id }}">
                        <button type="submit" class="btn">Изменить</button>

                    </a>
                @endif
            </div>
        @endforeach


    </div>
@endsection
