@extends('master');

<form action="{{ route('categoriesSubmit') }}" method="post">
    @csrf


    <div class="form-group">
        <label for="categoryName">Введите наименование категории</label>
        <input type="text" name="categoryName" placeholder="Введите наименование категории" id="categoryName" class="form-control">
    </div>


    <div class="form-group">
        <label for="description">Описание</label>
        <input type="text" name="description" id="description" class="form-control" placeholder="Опишите категорию товара"></input>
    </div>

    <button type="submit" class="btn btn-success">Отправить</button>
</form>
