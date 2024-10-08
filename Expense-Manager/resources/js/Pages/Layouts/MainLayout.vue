<template>
  <div class="app-layout">
    <header> <!-- This stays the same for all pages -->
      <h1>My Application</h1>
      <!-- <nav>...</nav> -->
    </header>
    <div class="layout">
      <Sidebar /> <!-- Sidebar stays the same for all pages -->
      <main class="main-content">
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

<style scoped>
.app-layout {
  display: flex;
  flex-direction: column;
  height: 100vh; /* Full height of the viewport */
}

.layout {
  display: flex; /* Use flexbox for layout */
  flex: 1; /* Take up the remaining space between header and footer */
}

main {
  flex: 1; /* Take remaining space in layout */
  padding: 20px; /* Add some padding */
  overflow-y: auto; /* Allow scrolling for long content */
}

/* Optional styles for header and footer */
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
