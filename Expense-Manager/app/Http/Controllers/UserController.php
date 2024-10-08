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
        $users = User::with('role')->get(); // Eager load roles
        $roles = Role::all();
        return Inertia::render('Users', [
            'users' => $users,
            'roles' => $roles,
        ]);
    }
    public function update($id)
    {
        // Logic to update the user based on $id
        // ...

        return redirect()->route('users.index'); // Redirect back to users index after updating
    }

    public function destroy($id)
    {
        // Logic to delete the user based on $id
        // ...

        return redirect()->route('users.index'); // Redirect back to users index after deletion
    }
}
