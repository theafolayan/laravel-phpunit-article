<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fetch_all_tasks()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create_task(Request $request)
    {
        Task::create($request->all()); // create a task
        return response()->json([
            'message' => 'task created successfully'
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        if ($task->exists()) {
            return response()->json([
                'message' => 'task found',
                'data' => $task
            ]);
        }
        else{
            return response()->json([
                'message' => 'specified task does not exist',
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($task)
    {
        $task_to_be_deleted = Task::findOrFail($task);
        $task_to_be_deleted->delete();
        return response()->json([
            'message' => 'task deleted successfully'
        ], 410);
    }
    public function mark_task_as_completed(Task $task)
    {
        $task->mark_task_as_completed(); //calls the mark_task_as_complete method we created in the App/Models/Task.php file
        return response()->json([
            'message' => 'task successfully marked as updated'
        ], 200); //send a json response with the 200 status code
    }
}
