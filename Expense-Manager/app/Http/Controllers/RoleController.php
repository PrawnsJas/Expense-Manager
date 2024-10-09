<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Inertia\Inertia;
use Illuminate\Support\Facades\Log;

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

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Log::info("Updating role: {$id}", $request->all());

        $role = Role::findOrFail($id);
        $role->name = $request->name;
        $role->save();

        return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
    }

    public function destroy($id)
    {

        return redirect()->route('roles.index'); 
    }
}
