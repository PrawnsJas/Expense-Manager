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

    <div v-if="showModal">
      <p>Update Category Modal ({{ selectedCategory.name }})</p>
      <button @click="showModal = false">Close</button>
    </div>

    <!-- Add Category Modal -->
    <AddCategoryModal 
      v-if="showAddCategoryModal" 
      @close="showAddCategoryModal = false" 
      @categoryAdded="fetchCategories" 
    />

    <button @click="showAddCategoryModal = true" class="btn btn-primary">Add Category</button>
  </div>
</template>

<script>
import { ref, onMounted } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import AddCategoryModal from './Components/AddCategoryModal.vue';  

export default {
  props: {
    categories: Array, 
  },
  components: {
    AddCategoryModal,
  },
  setup(props) {
    const categories = ref(props.categories); 
    const showModal = ref(false);
    const showAddCategoryModal = ref(false);
    const selectedCategory = ref(null);

    const fetchCategories = () => {
      Inertia.get('/expense-management/categories', {}, {
        preserveState: true,
        onSuccess: (page) => {
          categories.value = page.props.categories; 
        },
      });
    };

    const showUpdateModal = (category) => {
      selectedCategory.value = category;
      showModal.value = true;
    };

    const deleteCategory = (category) => {
      if (confirm(`Are you sure you want to delete category: ${category.name}?`)) {
        Inertia.delete(`/expense-management/categories/${category.id}`, {
          onSuccess: fetchCategories,
        });
      }
    };

    onMounted(fetchCategories);

    return {
      categories,
      showModal,
      showAddCategoryModal,
      selectedCategory,
      fetchCategories,
      showUpdateModal,
      deleteCategory,
    };
  },
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
