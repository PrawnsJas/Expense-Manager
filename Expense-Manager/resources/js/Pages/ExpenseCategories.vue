<template>
  <div>
      <h1>Expense Categories Management</h1>
      <table class="table">
          <thead>
              <tr>
                  <th>Category</th>
                  <th>Actions</th>
              </tr>
          </thead>
          <tbody>
              <tr v-for="category in categories" :key="category.id">
                  <td>{{ category.name }}</td>
                  <td>
                      <button 
                          @click="showUpdateModal(category)" 
                          class="btn btn-warning"
                      >
                          Update
                      </button>
                      <button 
                          @click="deleteCategory(category)" 
                          class="btn btn-danger"
                      >
                          Delete
                      </button>
                  </td>
              </tr>
          </tbody>
      </table>

      <!-- Placeholder for the modal -->
      <div v-if="showModal">
          <p>Update Category Modal ({{ selectedCategory.name }})</p>
          <!-- Add your modal form here for updating category information -->
          <button @click="showModal = false">Close</button>
      </div>

      <button @click="addCategory" class="btn btn-primary">Add Category</button>
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
  showUpdateModal(category) {
      this.selectedCategory = category;
      this.showModal = true;
  },
  deleteCategory(category) {
      // Handle delete logic here
      alert(`Deleting category: ${category.name}`);
  },
  addCategory() {
      // Logic to add a new category
      alert('Add category logic here');
  }
};
</script>

<style scoped>
.table {
  width: 100%;
  margin-top: 20px;
}
.table th, .table td {
  padding: 10px;
  text-align: left;
}
.btn {
  margin-right: 5px;
}
</style>
