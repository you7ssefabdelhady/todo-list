<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::get();
        return response()->json($tasks);
    }
    public function show(Task $tasks){
        return response()->json($tasks);
    }
}
