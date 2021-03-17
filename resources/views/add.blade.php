@extends('master');

<form action="{{ route('productSubmit') }}" method="post">
    @csrf


    <div class="form-group">
        <label for="productName">Введите наименование товара</label>
        <input type="text" name="productName" placeholder="Введите наименование товара" id="productName" class="form-control">
    </div>

    <div class="form-group">
        <label for="categoryName">Выберите категорию</label>

            @foreach($categories as $category)
            <input type="radio" name="categoryName" id="categoryName" class="" value='{{ $category->id }}'>
            {{ $category->name }}
            @endforeach
    </div>

    <div class="form-group">
        <label for="message">Цена</label>
        <input type="text" name="price" id="price" class="form-control" placeholder="Введите цену товара"></input>
    </div>

    <button type="submit" class="btn btn-success">Отправить</button>
</form>
