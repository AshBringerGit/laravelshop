@extends('master')
<h1>Изменить категорию</h1>

<form action="{{route('categoriesUpdate')}}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{$data['id']}}">
    <input type="text" name="name" value="{{$data['name']}}">
    <input type="text" name="description" value="{{$data['description']}}">
    <input type="submit" value="Сохранить">
</form>
