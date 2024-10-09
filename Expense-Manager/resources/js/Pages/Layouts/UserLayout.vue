<template>
  <div class="app-layout">
    <header>
      <h4>BudgetBoost (User)</h4>
      <button class="logout-btn" @click="logout">Logout</button>
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
import { Inertia } from '@inertiajs/inertia';

export default {
  components: {
    Sidebar,
  },
  methods: {
    logout() {
      Inertia.post('/logout');
    },
  },
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
  display: flex;
  align-items: center;
  justify-content: space-between; 
  padding: 10px 50px;
}

.logout-btn {
  background-color: transparent;
  border: none;
  color: #007bff;
  font-size: 16px;
  cursor: pointer;
}

.logout-btn:hover {
  color: #0056b3;
}

footer {
  background-color: #f8f9fa;
  padding: 10px 20px;
  text-align: center;
}
</style>
