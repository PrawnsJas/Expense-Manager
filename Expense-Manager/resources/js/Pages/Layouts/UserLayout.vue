<template>
    <div class="app-layout">
      <header>
        <h2>BudgetBoost</h2>
      </header>
      <div class="layout">
        <UserSidebar /> 
        <main class="main-content">
          <slot></slot> 
        </main>
      </div>
      <footer> 
        &copy; 2024 BudgetBoost
      </footer>
    </div>
  </template>
  
  <script>
  import UserSideBar from '../Components/UserSideBar.vue';
  
  export default {
    components: {
      UserSideBar,
    },
  };
  </script>
  
  <style scoped>
  .content {
    margin-left: 250px; 
  }
  </style>
  