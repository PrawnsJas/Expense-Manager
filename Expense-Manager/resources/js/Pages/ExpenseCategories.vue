<template>
    <div>
      <h1>Expense Categories Management</h1>
      <table>
        <tr>
          <th>Category</th>
          <th>Actions</th>
        </tr>
        <tr v-for="category in categories" :key="category.id">
          <td>{{ category.name }}</td>
          <td>
            <button @click="showUpdateModal(category)">Update</button>
            <button @click="deleteCategory(category)">Delete</button>
          </td>
        </tr>
      </table>
  
      <!-- Placeholder for the modal -->
      <div v-if="showModal">
        <p>Update Category Modal ({{ selectedCategory.name }})</p>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        categories: [
          { id: 1, name: 'Travel' },
          { id: 2, name: 'Food' }
        ],
        showModal: false,
        selectedCategory: null
      };
    },
    methods: {
      showUpdateModal(category) {
        this.selectedCategory = category;
        this.showModal = true;
      },
      deleteCategory(category) {
        // Handle delete logic here
        alert(`Deleting category: ${category.name}`);
      }
    }
  };
  </script>
  