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
        $expenses = Expense::with('category')->get();
        $expenseCategory = ExpenseCategory::all(); 
    
        return Inertia::render('Expenses', [
            'expenses' => $expenses,
            'expenseCategory' => $expenseCategory,
        ]);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'category' => 'required|exists:expense_categories,id', 
            'entryDate' => 'required|date', 
        ]);
    
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to add an expense.');
        }
    
        $userId = Auth::id(); 
    
        Expense::create([
            'amount' => $request->amount,
            'category_id' => $request->category, 
            'date' => $request->entryDate, 
            'user_id' => $userId, 
        ]);
    
        return redirect()->route('expenses.index');
    }

    public function getDashboardData()
    {
        $expenses = Expense::with('category')
            ->selectRaw('category_id, SUM(amount) as total_amount')
            ->groupBy('category_id')
            ->get();
    
        return Inertia::render('Dashboard', [
            'expenses' => $expenses,
        ]);
    }
    
    public function update(Request $request, $id)
    {
       
        return redirect()->route('expenses.index'); 
    }

    public function destroy($id)
    {
        return redirect()->route('expenses.index'); 
    }
}
