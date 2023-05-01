<?php

namespace App\Http\Controllers;

use App\Models\TodoList;

use Illuminate\Http\Request;
use App\Models\User;
use App\Exports\ToDoExport;
use App\Imports\ToDoImport;
use Excel;
use Auth;

class TodoListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todolists = TodoList::where('user_id', auth()->id())->get();
        return view("home",compact("todolists"));
    }

  
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required'
        ]);
        TodoList::create(
            [
                'title' => $request->title,
                'user_id' => auth()->id(),
                // 'is_completed'=>,
            ]
        );
        return redirect('/home');
    }

    public function destroy(TodoList $todolist)
    {
        
        $todolist->delete();
        return redirect()->back();
    }
    public function iscompleted(TodoList $todolist){
        $todolist->update([
            'is_completed'=>true
        ]);
        return redirect()->back();
        
        

    }
    public function notcompleted(TodoList $todolist){
        $todolist->update([
            'is_completed'=>false
        ]);
        return redirect()->back();
        
        

    }
    public function exportToDos(){
        return Excel::download(new ToDoExport,'todos.xlsx');
    }
    public function importToDos(Request $request){

       Excel::import(new ToDoImport,$request->file('file') );
        return redirect('home')->with('flash_message', 'Member Added!');
    }
    
}
