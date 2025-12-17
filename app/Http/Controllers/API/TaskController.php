<?php

namespace App\Http\Controllers\API;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class TaskController extends Controller
{
    public function index(){
        $tasks = Task::get();
        return response()->json($tasks);
    }

    public function show(Task $task){
        return response()->json($task);
    }

    public function store(Request $request){
        $validate = $request->validate([
            'title' => ['required','string','max:255'],
        ]);

        $task = Task::create([
            'title' => $validate['title'],
            'status' => 'pending',
            'user_id' => auth()->id(),
        ]);

        return response()->json([
            'status' => true,
            'message' => 'تم إضافة المهمة بنجاح',
            'data' => $task
        ]);
    }

    public function update(Request $request, Task $task){
        $validate = $request->validate([
            'title' => ['required','string','max:255'],
            'description' => ['nullable','string'],
        ]);

        $task->update($validate);

        return response()->json([
            'status' => true,
            'message' => 'تم تعديل المهمة بنجاح',
            'data' => $task
        ]);
    }

    public function destroy(Task $task){
        $task->delete();

        return response()->json([
            'status' => true,
            'message' => 'تم حذف المهمة بنجاح'
        ]);
    }
}
