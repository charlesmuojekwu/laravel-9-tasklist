@extends('todos.layout')

@section('content')

        <x-alert />
        <h1 class="text-2xl">What Task Next Would You like Todo</h1>
        <form method="POST" action="{{ route('todo.create') }}" class="py-5">
            @csrf
            <input type="text" name="title" class="my-1 py-2 px-2 border">

                {{-- <livewire:step />  --}}
                @livewire('step')
    
                <div class="py-1">
                    <button class="p-2 border rounded">Create</button>
                </div>           
        </form>

@endsection