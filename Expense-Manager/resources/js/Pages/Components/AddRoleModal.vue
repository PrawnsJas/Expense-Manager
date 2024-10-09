<template>
    <div class="modal">
      <div class="modal-content">
        <h2>Add New Role</h2>
        <form @submit.prevent="submitForm">
          <div class="form-group">
            <label for="name">Role Name:</label>
            <input v-model="form.name" id="name" required />
          </div>
          
          <button type="submit" class="btn btn-primary">Add Role</button>
          <button type="button" @click="$emit('close')" class="btn btn-secondary">Close</button>
        </form>
      </div>
    </div>
  </template>
  
  <script>
  import { ref } from 'vue';
  import { Inertia } from '@inertiajs/inertia';
  
  export default {
    setup() {
      const form = ref({
        name: '',
      });
  
      const submitForm = () => {
        Inertia.post('/user-management/roles', form.value, {
          onSuccess: () => {
            form.value.name = ''; 
            this.$emit('close'); 
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
  