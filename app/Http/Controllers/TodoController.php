<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use App\Models\Step;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth')->except('index');

        //$this->middleware('auth')->only(['create','edit']);

        $this->middleware('auth');
    }

    public function index()
    {

        /// save using eloquent relationship
        $todos = auth()->user()->todos()->orderBy('completed')->get();
        //$todos = Todo::orderBy('completed')->get();

        return view('todos.index')->with(['todos' => $todos]);
    }


    public function create()
    {
        return view('todos.create');
    }


    public function store(TodoCreateRequest $request)
    {
       
        /// save using eloquent relationship
        $todo = auth()->user()->todos()->create($request->all());
        if($request->steps){
            foreach($request->steps as $step) 
            {
                $todo->steps()->create(['name' => $step]);
            }
        }
        //Todo::create($request->all());

        return redirect(route('todo.index'))->with('message', 'Todo Created successfully');
    }

    /// used route model binding
    public function edit(TODO $todo)
    {
        return view('todos.edit',compact('todo'));
    }


    public function update(TodoCreateRequest $request, TODO $todo)
    {
        $todo->update(['title' => $request->title]);

        if($request->steps){
            foreach($request->steps as $key => $value) 
            {
                $id = $request->stepId[$key];
                if(!$id){
                    $todo->steps()->create(['name' => $value]);
                }else{
                    $step = Step::find($id);
                    $step->update(['name' => $value]);
                }
               
            }
        }
       
        return redirect(route('todo.index'))->with('message', 'Updated');
    }

    public function complete(TODO $todo)
    {
        $todo->update(['completed' => true]);
       
        return redirect(route('todo.index'))->with('message', 'Task Marked as completed');
    }

    public function delete(TODO $todo)
    {
        // DELETE CASCADE
        $todo->steps->each->delete();

        $todo->delete();
       
        return redirect(route('todo.index'))->with('message', 'Task Deleted');
    }

}
