<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('role')->get();
        $roles = Role::all();
        return Inertia::render('Users', [
            'users' => $users,
            'roles' => $roles,
        ]);
    }
    public function update($id)
    {
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        return redirect()->route('users.index');
    }
}
