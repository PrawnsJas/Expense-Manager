<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense; 
use App\Models\ExpenseCategory;
use Inertia\Inertia;


class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Expense::with('category')->get(); // Eager load categories
        $expenseCategory = ExpenseCategory::all(); // Replace with your actual model for categories
    
        return Inertia::render('Expenses', [
            'expenses' => $expenses,
            'expenseCategory' => $expenseCategory,
        ]);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'category_id' => 'required|exists:expense_categories,id', // Ensure category exists
        ]);

        Expense::create([
            'name' => $request->name,
            'amount' => $request->amount,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('expenses.index'); // Redirect back to expenses index
    }


    public function update($id)
    {
        // Logic to update the expense based on $id
        // ...

        return redirect()->route('expenses.index'); // Redirect back after updating
    }

    public function destroy($id)
    {
        // Logic to delete the expense based on $id
        // ...

        return redirect()->route('expenses.index'); // Redirect back after deletion
    }
}
