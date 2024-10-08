<template>
    <div>
      <h1>Expenses</h1>
      <table>
        <tr>
          <th>Expense</th>
          <th>Amount</th>
          <th>Actions</th>
        </tr>
        <tr v-for="expense in expenses" :key="expense.id">
          <td>{{ expense.name }}</td>
          <td>{{ expense.amount }}</td>
          <td>
            <button @click="showUpdateModal(expense)">Update</button>
            <button @click="deleteExpense(expense)">Delete</button>
          </td>
        </tr>
      </table>
  
      <!-- Placeholder for the modal -->
      <div v-if="showModal">
        <p>Update Expense Modal ({{ selectedExpense.name }})</p>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        expenses: [
          { id: 1, name: 'Flight to NY', amount: 500 },
          { id: 2, name: 'Lunch', amount: 15 }
        ],
        showModal: false,
        selectedExpense: null
      };
    },
    methods: {
      showUpdateModal(expense) {
        this.selectedExpense = expense;
        this.showModal = true;
      },
      deleteExpense(expense) {
        // Handle delete logic here
        alert(`Deleting expense: ${expense.name}`);
      }
    }
  };
  </script>
  