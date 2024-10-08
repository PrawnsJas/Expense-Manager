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
        ]);

        // Create a new expense category
        ExpenseCategory::create($request->only('name'));

        // Redirect back to the categories index after creating
        return redirect()->route('expense-categories.index'); 
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
