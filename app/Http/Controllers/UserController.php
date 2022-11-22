<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(User::get());
    }

    public function store(Request $request)
    {
        User::create($request->input());
        return response()->json([], 201);
    }

    public function update(Request $request, int $id)
    {
        User::findOrFail($id)->update($request->input());
        return response()->json([], 204);
    }

    public function destroy(int $id)
    {
        $user = User::findOrFail($id);
        $user->tasks()->delete();
        $user->delete();
        return response()->json([], 204);
    }
}
