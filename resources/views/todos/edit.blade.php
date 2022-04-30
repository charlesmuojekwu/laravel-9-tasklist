@extends('todos.layout')

@section('content')

    

    <x-alert />
    <h1 class="text-2xl">Update The Todo List</h1>
    <form method="POST" action="{{ route('todo.update',['todo'=>$todo->id]) }}" class="py-5">
        @method('PATCH')
        @csrf
        <input type="text" name="title" class="py-2 px-2 border" value="{{ $todo->title }}">
        <button class="py-2 border rounded">Update</button>
    </form>

@endsection