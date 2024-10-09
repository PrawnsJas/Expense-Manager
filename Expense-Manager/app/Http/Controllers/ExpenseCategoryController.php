<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpenseCategory;
use Inertia\Inertia;


class ExpenseCategoryController extends Controller
{
    public function index()
    {
        $categories = ExpenseCategory::all();

        return Inertia::render('ExpenseCategories', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000', 
        ]);
    
        $category = ExpenseCategory::create($request->only('name', 'description'));
        return response()->json(['category' => $category], 201);
    }
    
    
    public function update($id)
    {


        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {

        return redirect()->route('categories.index'); 
    }
}
