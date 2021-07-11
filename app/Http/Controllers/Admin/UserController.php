<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index()
    {
        $users = User::select(['id', 'name', 'email'])->get();

        return Inertia::render('Admin/User/Index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/User/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required', 'min:5'],
        ]);
        

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return Redirect::route('admin.user.index');
    }

    public function show($id)
    {
        try {
            $user = User::findOrFail($id);

            return Inertia::render('Admin/User/Show', [
                'user' => $user
            ]);

        }  catch (ModelNotFoundException $exception) {
            
            return Inertia::render('Errors/NotFoundError', [
                'status' => 404,
                'message' => 'Oops, não foi possível encontrar o usuário',
                'route' => route('admin.user.index'),
            ]);
        }
        
    }
}