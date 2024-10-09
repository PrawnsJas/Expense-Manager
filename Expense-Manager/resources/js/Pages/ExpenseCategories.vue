<template>
  <div>
    <h1>Expense Categories Management</h1>
    <table class="table">
      <thead>
        <tr>
          <th>Category</th>
          <th>Description</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="category in categories" :key="category.id">
          <td>{{ category.name }}</td>
          <td>{{ category.description }}</td>
          <td>
            <button @click="showUpdateModal(category)" class="btn btn-warning">Update</button>
            <button @click="deleteCategory(category)" class="btn btn-danger">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>

    <AddCategoryModal 
      v-if="showAddCategoryModal" 
      @close="closeAddCategoryModal" 
      @submit="addCategory" 
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
    const categories = ref([...props.categories]); // Copying initial categories to reactive ref
    const showAddCategoryModal = ref(false);

    const fetchCategories = () => {
      Inertia.get('/expense-management/categories', {
        preserveState: true,
        onSuccess: (page) => {
          categories.value = page.props.categories; 
        },
      });
    };

    const addCategory = (formData) => {
      Inertia.post('/expense-management/categories', formData, {
        onSuccess: (response) => {
          categories.value.push(response.category); // Add new category to the list
          closeAddCategoryModal(); // Close the modal
        },
        onError: () => {
          console.error('Failed to add category'); // Handle error
        },
      });
    };

    const closeAddCategoryModal = () => {
      showAddCategoryModal.value = false;
    };

    onMounted(fetchCategories);

    return {
      categories,
      showAddCategoryModal,
      addCategory,
      closeAddCategoryModal,
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
