<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpenseCategory;
use Inertia\Inertia;


class ExpenseCategoryController extends Controller
{
    public function index()
    {
        $categories = ExpenseCategory::all(); // Fetch expense categories

        return Inertia::render('ExpenseCategories', [
            'categories' => $categories // Pass categories to the ExpenseCategories page
        ]);
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000', 
        ]);
    
        // Create a new expense category
        $category = ExpenseCategory::create($request->only('name', 'description'));
    
        // Return the newly created category data
        return response()->json(['category' => $category], 201); // Send JSON response
    }
    
    
    public function update($id)
    {
        // Logic to update the category based on $id
        // ...

        return redirect()->route('categories.index'); // Redirect back after updating
    }

    public function destroy($id)
    {
        // Logic to delete the category based on $id
        // ...

        return redirect()->route('categories.index'); // Redirect back after deletion
    }
}
