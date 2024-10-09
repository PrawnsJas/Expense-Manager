<template>
    <div class="login-layout">
      <header>
        <h2>BudgetBoost</h2>
      </header>
      <main class="login-content">
        <slot></slot>
      </main>
      
    </div>
  </template>
  
  <script>
  export default {
    mounted() {
      console.log("LoginLayout is rendered"); // Debug log
    }
  };
  </script>
  
  <style scoped>
  .login-layout {
    display: flex;
    flex-direction: column;
    height: 100vh;
    justify-content: center;
    align-items: center;
  }
  
  header {
    margin-bottom: 20px;
  }
  
  footer {
    margin-top: 20px;
  }
  </style>
  