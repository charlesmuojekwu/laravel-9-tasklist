@extends('todos.layout')

@section('content')

    <div class="flex justify-center border-b pb-4">
        <h1 class="text-2xl">All Todos</h1>
        <a href="/todos/create" class="mx-5 cursor-pointer rounded py-1 bg-blue-200 text-right">Create New</a>
    </div>
   
        <ul class="py-5" >
            @foreach ($todos as $todo )
                <li class="flex justify-between p-2">
                    <p>{{ $todo->title }}</p>
                    <div>
                        <a href="{{'/todos/'.$todo->id.'/edit' }}" class="rounded py-1 px-1 bg-pink-400 cursor-pointer text-white "> Edit</a>
                        <span class="fas fa-check" />
                    </div>
                </li>
            @endforeach
        </ul>


@endsection