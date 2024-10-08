<template>
    <div class="modal">
      <div class="modal-content">
        <h2>Update Expense</h2>
        <form @submit.prevent="updateExpense">
          <div class="form-group">
            <label for="category">Expense Category:</label>
            <select v-model="form.category" id="category" required>
              <option v-for="category in categories" :key="category.id" :value="category.id">{{ category.name }}</option>
            </select>
          </div>
          <div class="form-group">
            <label for="amount">Amount:</label>
            <input v-model="form.amount" id="amount" type="number" required />
          </div>
          <div class="form-group">
            <label for="entryDate">Entry Date:</label>
            <input 
                v-model="form.entryDate" 
                id="entryDate" 
                type="date" 
                :max="today" 
                required 
            />
          </div>
          <button type="submit" class="btn btn-success">Update</button>
          <button type="button" @click="deleteExpense" class="btn btn-danger">Delete</button>
          <button type="button" @click="$emit('close')" class="btn btn-secondary">Cancel</button>
        </form>
      </div>
    </div>
  </template>
  
  <script>
  import { ref } from 'vue';
  import { Inertia } from '@inertiajs/inertia';
  
  export default {
    props: {
      categories: Array,
      expense: Object,
    },
    setup(props, { emit }) {
    const today = new Date().toISOString().split('T')[0];
      const form = ref({
        category: props.expense.category_id,
        amount: props.expense.amount,
        entryDate: props.expense.entry_date,
      });
  
      const updateExpense = () => {
        Inertia.put(`/expense-management/expenses/${props.expense.id}`, form.value, {
          onSuccess: () => {
            emit('close');
          },
        });
      };
  
      const deleteExpense = () => {
        if (confirm(`Are you sure you want to delete this expense?`)) {
          Inertia.delete(`/expense-management/expenses/${props.expense.id}`, {
            onSuccess: () => {
              emit('close');
            },
          });
        }
      };
  
      return {
        form,
        updateExpense,
        deleteExpense,
        today,
      };
    },
  };
  </script>
  
  <style scoped>
  .modal {
    display: flex;
    justify-content: center;
    align-items: center;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
  }
  .modal-content {
    background-color: white;
    padding: 20px;
    border-radius: 5px;
  }
  </style>
  