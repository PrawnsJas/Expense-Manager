<template>
    <div>
      <h1>Expenses Management</h1>
      <table class="table">
        <thead>
          <tr>
            <th>Expense</th>
            <th>Amount</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="expense in expenses" :key="expense.id">
            <td>{{ expense.name }}</td>
            <td>{{ expense.amount }}</td>
            <td>
              <button 
                @click="showUpdateModal(expense)" 
                class="btn btn-warning"
              >
                Update
              </button>
              <button 
                @click="deleteExpense(expense)" 
                class="btn btn-danger"
              >
                Delete
              </button>
            </td>
          </tr>
        </tbody>
      </table>
  
      <div v-if="showModal">
        <p>Update Expense Modal ({{ selectedExpense.name }})</p>
        <button @click="showModal = false">Close</button>
      </div>
  
      <AddExpenseModal v-if="showAddExpenseModal" :expenseCategory="expenseCategory" @close="showAddExpenseModal = false" />
  
      <button @click="showAddExpenseModal = true" class="btn btn-primary">Add Expense</button>
    </div>
  </template>
  
  <script>
  import { ref, onMounted } from 'vue';
  import { Inertia } from '@inertiajs/inertia';
  import AddExpenseModal from './Components/AddExpenseModal.vue';  
  
  export default {
    props: {
      expenses: Array,
      expenseCategory: Array, 
    },
    components: {
      AddExpenseModal,
    },
    setup(props) {
      const expenses = ref(props.expenses);
      const showModal = ref(false);
      const showAddExpenseModal = ref(false);
      const selectedExpense = ref(null);
  
      const showUpdateModal = (expense) => {
        selectedExpense.value = expense;
        showModal.value = true;
      };
  
      const deleteExpense = (expense) => {
        if (confirm(`Are you sure you want to delete expense: ${expense.name}?`)) {
          Inertia.delete(`/expense-management/expenses/${expense.id}`);
        }
      };
  
      const fetchExpenses = () => {
        Inertia.get('/expense-management/expenses', {}, {
          preserveState: true,
          onSuccess: (page) => {
            expenses.value = page.props.expenses;
          },
        });
      };
  
      onMounted(fetchExpenses);
  
      return {
        expenses,
        showModal,
        showAddExpenseModal,
        selectedExpense,
        fetchExpenses,
        showUpdateModal,
        deleteExpense,
      };
    },
  };
  </script>
  
  <style scoped>
  .table {
    width: 100%;
    margin-top: 20px;
  }
  .table th, .table td {
    padding: 10px;
    text-align: left;
  }
  .btn {
    margin-right: 5px;
  }
  </style>
  