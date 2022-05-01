@extends('todos.layout')

@section('content')

    <div class="flex justify-center border-b pb-4">
        <h1 class="text-2xl">All Todos</h1>
        <a href="/todos/create" class="mx-5 cursor-pointer rounded py-1 bg-blue-200 text-right">Create New</a>
    </div>
   
        <ul class="py-5" >
            <x-alert />
            @foreach ($todos as $todo )
                <li class="flex justify-between p-2">
                    <p>{{ $todo->title }}</p>
                    <div>
                        <a href="{{'/todos/'.$todo->id.'/edit' }}" class="rounded py-1 px-1 bg-pink-400 cursor-pointer text-white "> Edit</a>
                        
                        @if ($todo->completed)
                            <span class="fas fa-check px-2 text-green-400 cursor-pointer" />
                        @else
                            <span onclick="event.preventDefault(); document.getElementById('form-complete-{{ $todo->id }}').submit()" class="fas fa-check px-2 text-gray-300 cursor-pointer" />
                            <form id="{{ 'form-complete-'.$todo->id }}" action="{{ route('todo.complete',$todo->id) }}" style="display:none" method="post">
                                @method('put')
                                @csrf
                            </form>
                        @endif
                        
                    </div>
                </li>
            @endforeach
        </ul>


@endsection