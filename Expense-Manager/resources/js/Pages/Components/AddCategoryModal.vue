<template>
    <div class="modal">
      <div class="modal-content">
        <h2>Add New Category</h2>
        <form @submit.prevent="submitForm">
          <div class="form-group">
            <label for="name">Category Name:</label>
            <input v-model="form.name" id="name" required />
          </div>
          <button type="submit" class="btn btn-primary">Add Category</button>
          <button type="button" @click="$emit('close')" class="btn btn-secondary">Close</button>
        </form>
      </div>
    </div>
  </template>
  
  <script>
  import { ref } from 'vue';
  import { Inertia } from '@inertiajs/inertia';
  
  export default {
    setup(props, { emit }) {
      const form = ref({
        name: '',
      });
  
      const submitForm = () => {
        Inertia.post('/expense-management/categories', form.value, {
          onSuccess: () => {
            emit('close'); // Close modal
            emit('categoryAdded'); // Emit event to refresh categories
            form.value.name = ''; // Reset form
          },
        });
      };
  
      return {
        form,
        submitForm,
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
  