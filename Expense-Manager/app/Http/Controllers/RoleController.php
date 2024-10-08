<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Inertia\Inertia;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all(); 

        return Inertia::render('Roles', [
            'roles' => $roles 
        ]);
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    Role::create([
        'name' => $request->name,
    ]);

    return redirect()->route('roles.index');
}

    public function update($id)
    {


        return redirect()->route('roles.index');
    }

    public function destroy($id)
    {

        return redirect()->route('roles.index'); 
    }
}
