@extends('todos.layout')

@section('content')

        <x-alert />
        <h1 class="text-2xl">What Task Next Would You like Todo</h1>
        <form method="POST" action="{{ route('todo.create') }}" class="py-5">
            @csrf
            <input type="text" name="title" class="py-2 px-2 border">
            <button class="py-2 border rounded">Submit</button>
        </form>

@endsection