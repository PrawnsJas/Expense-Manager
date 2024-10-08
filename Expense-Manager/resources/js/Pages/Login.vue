<template>
    <div class="login-container">
      <h1>Login</h1>
      <form @submit.prevent="login">
        <div class="form-group">
          <label for="email">Email:</label>
          <input 
            type="email" 
            id="email" 
            v-model="form.email" 
            required 
            autofocus 
          />
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input 
            type="password" 
            id="password" 
            v-model="form.password" 
            required 
          />
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Login</button>
        </div>
      </form>
      <div v-if="errorMessage" class="error-message">{{ errorMessage }}</div>
    </div>
  </template>
  
  <script>
  import { ref } from 'vue';
  import { Inertia } from '@inertiajs/inertia';
  
  export default {
    setup() {
      const form = ref({
        email: '',
        password: '',
      });
  
      const errorMessage = ref('');
  
      const login = () => {
        Inertia.post('/login', form.value, {
          onError: (errors) => {
            errorMessage.value = errors.email ? errors.email[0] : 'Invalid credentials'; // Display the first error message
          },
          onSuccess: () => {
            // Redirect or do something after successful login
            console.log('Logged in successfully');
          },
        });
      };
  
      return {
        form,
        login,
        errorMessage,
      };
    },
  };
  </script>
  
  <style scoped>
  .login-container {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }
  
  .form-group {
    margin-bottom: 15px;
  }
  
  .error-message {
    color: red;
    margin-top: 10px;
  }
  </style>
  