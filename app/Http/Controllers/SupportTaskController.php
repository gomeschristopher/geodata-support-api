<?php

namespace App\Http\Controllers;

use App\Models\SupportTask;
use App\Models\SupportTaskStatus;
use App\Models\User;
use Illuminate\Http\Request;

class SupportTaskController extends Controller
{
    public function index()
    {
        return response()->json(SupportTask::with(['user', 'status'])->get());
    }

    public function store(Request $request)
    {
        $supportTask = new SupportTask();
        $supportTask->user()->associate(User::findOrFail($request->input('user.id')));
        $supportTask->status()->associate(SupportTaskStatus::findOrFail($request->input('status.id')));
        $supportTask->fill($request->input());
        $supportTask->save();
        return response()->json([], 201);
    }

    public function update(Request $request, int $id)
    {
        $supportTask = SupportTask::findOrFail($id);
        $supportTask->user()->associate(User::findOrFail($request->input('user.id')));
        $supportTask->status()->associate(SupportTaskStatus::findOrFail($request->input('status.id')));
        $supportTask->fill($request->input());
        $supportTask->save();
        return response()->json([], 204);
    }

    public function destroy(int $id)
    {
        $supportTask = SupportTask::findOrFail($id);
        $supportTask->delete();
        return response()->json([], 204);
    }
}
