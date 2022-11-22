<?php

namespace App\Http\Controllers;

use App\Models\SupportTaskStatus;

class SupportTaskStatusController extends Controller
{
    public function index()
    {
        return response()->json(SupportTaskStatus::get());
    }
}
