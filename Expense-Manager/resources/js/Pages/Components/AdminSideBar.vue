<template>
    <div class="sidebar">
      <nav>
        <ul>
          <li>
            <router-link to="/dashboard">Dashboard</router-link>
          </li>
          <li>
            <div @click="toggleUserManagement" class="sidebar-item">
              User Management
              <span class="caret" :class="{ open: isUserManagementOpen }">▼</span>
            </div>
            <ul v-if="isUserManagementOpen">
              <li><router-link to="/user-management/roles">Roles</router-link></li>
              <li><router-link to="/user-management/users">Users</router-link></li>
            </ul>
          </li>
          <li>
            <div @click="toggleExpenseManagement" class="sidebar-item">
              Expense Management
              <span class="caret" :class="{ open: isExpenseManagementOpen }">▼</span>
            </div>
            <ul v-if="isExpenseManagementOpen">
              <li><router-link to="/expense-management/categories">Expense Categories</router-link></li>
              <li><router-link to="/expense-management/expenses">Expenses</router-link></li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        isUserManagementOpen: false,
        isExpenseManagementOpen: false
      };
    },
    methods: {
      toggleUserManagement() {
        this.isUserManagementOpen = !this.isUserManagementOpen;
      },
      toggleExpenseManagement() {
        this.isExpenseManagementOpen = !this.isExpenseManagementOpen;
      }
    }
  };
  </script>
  
  <style scoped>
  .sidebar {
    width: 250px;
    background-color: #2c3e50;
    color: white;
    height: 100vh;
    padding: 20px;
  }
  
  .sidebar nav ul {
    list-style: none;
    padding: 0;
  }
  
  .sidebar-item {
    cursor: pointer;
    margin-top: 10px;
  }
  
  .sidebar-item .caret {
    float: right;
  }
  
  .caret.open {
    transform: rotate(180deg);
  }
  
  ul li {
    margin: 5px 0;
  }
  
  a {
    text-decoration: none;
    color: #ecf0f1;
  }
  
  a:hover {
    color: #3498db;
  }
  </style>
  