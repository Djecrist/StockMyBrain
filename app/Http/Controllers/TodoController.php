<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index(){
        $todos = Todo::orderBy('Valider')->get();
        return view('todo.task')->with(['todos' => $todos]);
    }

    public function create(){
        return view('todo.create');
    }
}
