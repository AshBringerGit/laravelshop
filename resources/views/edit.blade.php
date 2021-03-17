@extends('master')
<h1>Изменить продукт</h1>

<form action="{{route('productUpdate')}}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{$data['id']}}">
    <input type="text" name="name" value="{{$data['name']}}">
    <input type="text" name="description" value="{{$data['description']}}">
    <input type="text" name="price" value="{{$data['price']}}">
    <input type="submit" value="Сохранить">
</form>
