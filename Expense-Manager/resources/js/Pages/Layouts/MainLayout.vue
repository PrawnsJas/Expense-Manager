<template>
  <div class="app-layout">
    <header>
      <h2>BudgetBoost</h2>
    </header>
    <div class="layout">
      <Sidebar /> 
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
import Sidebar from '../Components/AdminSideBar.vue';

export default {
  components: {
    Sidebar
  }
};
</script>

<style scoped>
.app-layout {
  display: flex;
  flex-direction: column;
  height: 100vh; 
}

.layout {
  display: flex; 
  flex: 1; 
}

main {
  flex: 1; 
  padding: 20px; 
  overflow-y: auto; 
}

header {
  background-color: #f8f9fa;
  padding: 10px 20px;
}

footer {
  background-color: #f8f9fa;
  padding: 10px 20px;
  text-align: center;
}
</style>
