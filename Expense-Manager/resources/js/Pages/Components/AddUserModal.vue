<template>
    <div class="modal">
      <div class="modal-content">
        <h2>Add New User</h2>
  
        <form @submit.prevent="submitForm">
          <div class="form-group">
           
            <label for="name">Name:</label>
            <input v-model="form.name" id="name" required />
          </div>
          <div class="form-group">
            <label for="role">Role:</label>
            <select v-model="form.role" id="role" required>
              <option v-for="role in roles" :key="role.id" :value="role.id">{{ role.name }}</option>
            </select>
          </div>
  
          <button type="submit" class="btn btn-primary">Add User</button>
          <button type="button" @click="$emit('close')" class="btn btn-secondary">Close</button>
        </form>
      </div>
    </div>
  </template>
  
  <script>
  import { ref } from 'vue';
  import { Inertia } from '@inertiajs/inertia';
  
  export default {
    props: {
      roles: Array, 
    },
    setup(props) {
      const form = ref({
        name: '',
        role: '',
      });
  
      const submitForm = () => {
        Inertia.post('/user-management/users', form.value, {
          onSuccess: () => {
            form.value.name = '';
            form.value.role = '';
            this.$emit('close');
          },
        });
      };
  
      return {
        form,
        submitForm,
        roles: props.roles, 
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
  