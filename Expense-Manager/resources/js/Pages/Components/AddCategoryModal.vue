<template>
  <div class="modal">
    <div class="modal-content">
      <h2>Add New Category</h2>
      <form @submit.prevent="submitForm">
        <div class="form-group">
          <label for="name">Category Name:</label>
          <input v-model="form.name" id="name" required />
        </div>

        <div class="form-group">
          <label for="description">Category Description:</label>
          <textarea v-model="form.description" id="description"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Add Category</button>
        <button type="button" @click="$emit('close')" class="btn btn-secondary">Close</button>
      </form>
    </div>
  </div>
</template>

<script>
import { ref } from 'vue';

export default {
  setup(props, { emit }) {
    const form = ref({
      name: '',
      description: '',
    });

    const submitForm = () => {
      emit('submit', form.value);
      form.value.name = '';
      form.value.description = '';
    };

    return {
      form,
      submitForm,
    };
  },
};
</script>


<style scoped>
.modal {
  display: flex;
  justify-content: center;
  align-items: center;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
}
.modal-content {
  background-color: white;
  padding: 20px;
  border-radius: 5px;
  width: 400px;
}
.form-group {
  margin-bottom: 15px;
}
textarea {
  width: 100%;
  height: 80px;
  resize: none;
}
.btn {
  margin-right: 10px;
}
</style>
