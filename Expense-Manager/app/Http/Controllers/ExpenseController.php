<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense; 
use App\Models\ExpenseCategory;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

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
            'amount' => 'required|numeric',
            'category' => 'required|exists:expense_categories,id', // Ensure category exists
            'entryDate' => 'required|date', // Ensure entry date is provided and valid
        ]);
    
        // Check if the user is authenticated
        if (!Auth::check()) {
            // Handle the case where the user is not authenticated
            return redirect()->route('login')->with('error', 'You must be logged in to add an expense.');
        }
    
        // Get the authenticated user's ID
        $userId = Auth::id(); // Fetch the logged-in user's ID
    
        Expense::create([
            'amount' => $request->amount,
            'category_id' => $request->category, // Updated to category_id
            'date' => $request->entryDate, // Set entry_date to the provided entryDate
            'user_id' => $userId, // Associate the expense with the logged-in user
        ]);
    
        return redirect()->route('expenses.index'); // Redirect back to expenses index
    }
    
    
    
    public function update(Request $request, $id)
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
