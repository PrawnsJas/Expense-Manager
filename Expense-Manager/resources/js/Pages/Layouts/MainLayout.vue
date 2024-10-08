<template>
    <div>
      <header> <!-- This stays the same for all pages -->
        <h1>My Application</h1>
        <!-- <nav>...</nav> -->
      </header>
      <div class="layout">
        <Sidebar /> <!-- Sidebar stays the same for all pages -->
        <main>
          <slot></slot> <!-- Page content changes here -->
        </main>
      </div>
      <footer> <!-- Footer stays the same -->
        &copy; 2024 My Application
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
  