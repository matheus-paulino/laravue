<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index(User $users)
    {
        return Inertia::render('Dashboard', [
            'users' => $users->select(['id', 'name', 'email'])->get()
        ]);
    }
}
