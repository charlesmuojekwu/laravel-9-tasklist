@extends('todos.layout')

@section('content')

    <div class="flex justify-center border-b pb-4">
        <h1 class="text-2xl">All Todos</h1>
        <a href="/todos/create" class="mx-5 cursor-pointer rounded py-1 bg-blue-200 text-right">Create New</a>
    </div>
   
        <ul class="py-5" >
            <x-alert />
            @forelse ($todos as $todo )
                <li class="flex justify-between p-2">
                    <p>{{ $todo->title }}</p>
                    <div>
                       
                        
                        @if ($todo->completed)
                            <span class="fas fa-check px-2 text-green-400 cursor-pointer" />
                        @else
                            <span onclick="event.preventDefault(); 
                                            document.getElementById('form-complete-{{ $todo->id }}').submit()" 
                                            class="fas fa-check px-2 text-gray-300 cursor-pointer"
                            />
                            <form id="{{ 'form-complete-'.$todo->id }}" action="{{ route('todo.complete',$todo->id) }}" style="display:none" method="post">
                                @method('put')
                                @csrf
                            </form>
                        @endif

                        <a href="{{'/todos/'.$todo->id.'/edit' }}" class="rounded py-1 px-1 bg-pink-400 cursor-pointer text-white "> Edit</a>

                        <span onclick="event.preventDefault(); 
                                            if(confirm('Are you sure you want to delete')){
                                                document.getElementById('form-delete-{{ $todo->id }}').submit()
                                            }" 
                                            class="fas fa-trash px-2 text-red-300 cursor-pointer"
                            />
                            <form id="{{ 'form-delete-'.$todo->id }}" action="{{ route('todo.delete',$todo->id) }}" style="display:none" method="post">
                                @method('delete')
                                @csrf
                            </form>
                        
                    </div>
                </li>


                {{-- SHOW STEP ASSIGNED TO TASK --}}
                <div class="py-2">
                    
                    @if ($todo->steps->count() > 0)
                    
                    <h4>Steps</h4>

                        @foreach ($todo->steps as $step )
                            <p>{{ $step->name }}</p>
                        @endforeach

                    @endif
                </div>
               
            @empty   

                    <p>No Task Available Create One</p>

            @endforelse

            
        </ul>
        

        
@endsection