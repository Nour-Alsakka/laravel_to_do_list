<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTasks;
use App\Http\Requests\UpdateTasks;
use App\Models\Tasks;
use Exception;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Tasks::all();
        $today = date('Y-m-d');
        return view('admin.dashboard.index', compact('tasks', 'today'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dashboard.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTasks $request)
    {
        $check =  Tasks::create([
            'title' => $request->title,
            'desc' => $request->desc,
            'image' => $request->image,
            'date' => $request->date,
            'status' => $request->status,
        ]);
        if ($check) return back()->with('success', 'The task has inserted successfully.');
        else return back()->withErrors(['errors', 'something happend']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tasks $tasks, $id)
    {
        $task = Tasks::find($id);
        return view('admin.dashboard.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTasks $request, Tasks $tasks, $id)
    {
        try {

            $requestData = $request->all();
            $task = Tasks::find($id);

            $task->fill($requestData);

            $task->save();

            return  back()->with('success', 'The task has updated successfully.');
        } catch (Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tasks $tasks, $id)
    {
        $task = Tasks::find($id);

        $task->delete();
        // return view('admin.posts.index');
        return back();
    }
    public function show(Tasks $tasks)
    {
        //
    }
}
