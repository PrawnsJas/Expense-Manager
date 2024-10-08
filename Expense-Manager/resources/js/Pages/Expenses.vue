<template>
  <div>
    <h1>Expenses Management</h1>
    <table class="table">
      <thead>
        <tr>
          <th>Expense Category</th>
          <th>Amount</th>
          <th>Entry Date</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="expense in expenses" :key="expense.id">
          <td>{{ expense.category.name }}</td>
          <td>{{ expense.amount }}</td>
          <td>{{ expense.date }}</td>
          <td>
            <button @click="showUpdateModal(expense)" class="btn btn-warning">Update</button>
            <button @click="deleteExpense(expense)" class="btn btn-danger">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>

    <AddExpenseModal 
      v-if="showAddExpenseModal" 
      :expenseCategory="expenseCategory" 
      @close="showAddExpenseModal = false" 
    />

    <UpdateExpenseModal 
      v-if="showUpdateModalFlag" 
      :expenseCategory="expenseCategory" 
      :expense="selectedExpense" 
      @close="showUpdateModalFlag = false" 
    />

    <button @click="showAddExpenseModal = true" class="btn btn-primary">Add Expense</button>
  </div>
</template>

<script>
import { ref, onMounted } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import AddExpenseModal from './Components/AddExpenseModal.vue';  
import UpdateExpenseModal from './Components/UpdateExpenseModal.vue';  

export default {
  props: {
    expenses: Array,
    expenseCategory: Array,
  },
  components: {
    AddExpenseModal,
    UpdateExpenseModal,
  },
  setup(props) {
    const expenses = ref(props.expenses);
    const expenseCategory = ref(props.expenseCategory);
    const showAddExpenseModal = ref(false);
    const showUpdateModalFlag = ref(false);
    const selectedExpense = ref(null);
    console.log(props.expenseCategory);
    const fetchExpenses = () => {
      Inertia.get('/expense-management/expenses', {}, {
        preserveState: true,
        onSuccess: (page) => {
          expenses.value = page.props.expenses;
        },
      });
    };

    const showUpdateModal = (expense) => {
      selectedExpense.value = expense;
      showUpdateModalFlag.value = true;
    };

    const deleteExpense = (expense) => {
      if (confirm(`Are you sure you want to delete expense: ${expense.name}?`)) {
        Inertia.delete(`/expense-management/expenses/${expense.id}`, {
          onSuccess: fetchExpenses, 
        });
      }
    };

    onMounted(fetchExpenses);

    return {
      expenses,
      expenseCategory,
      showAddExpenseModal,
      showUpdateModalFlag,
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
