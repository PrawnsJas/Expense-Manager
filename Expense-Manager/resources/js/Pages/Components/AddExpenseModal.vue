<template>
  <div class="modal">
    <div class="modal-content">
      <h2>Add New Expense</h2>
      <form @submit.prevent="submitForm">
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

        <button type="submit" class="btn btn-primary">Save</button>
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
  },
  setup(props, { emit }) {
    const form = ref({
      category: '',
      amount: '',
      entryDate: '',
    });

    const today = new Date().toISOString().split('T')[0];

    const submitForm = () => {
      Inertia.post('/expense-management/expenses', form.value, {
        onSuccess: () => {
          emit('close'); // Close modal
          form.value.category = '';
          form.value.amount = '';
          form.value.entryDate = '';
        },
      });
    };

    return {
      form,
      submitForm,
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
