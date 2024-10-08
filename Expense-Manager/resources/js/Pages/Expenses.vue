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

      <!-- Placeholder for the modal -->
      <div v-if="showModal">
          <p>Update Expense Modal ({{ selectedExpense.name }})</p>
          <!-- Add your modal form here for updating expense information -->
          <button @click="showModal = false">Close</button>
      </div>

      <button @click="addExpense" class="btn btn-primary">Add Expense</button>
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
  showUpdateModal(expense) {
      this.selectedExpense = expense;
      this.showModal = true;
  },
  deleteExpense(expense) {
      // Handle delete logic here
      alert(`Deleting expense: ${expense.name}`);
  },
  addExpense() {
      // Logic to add a new expense
      alert('Add expense logic here');
  }
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
