<template>
  <div class="modal">
    <div class="modal-content">
      <h2>Update Role</h2>
      <form @submit.prevent="updateRole">
        <div>
          <label for="roleName">Role Name:</label>
          <input type="text" id="roleName" v-model="roleName" required />
        </div>
        <button type="submit" class="btn btn-primary">Update Role</button>
        <button @click="$emit('close')" type="button" class="btn btn-secondary">Cancel</button>
      </form>
    </div>
  </div>
</template>

<script>
import { ref, watch } from 'vue';
import { Inertia } from '@inertiajs/inertia';

export default {
  props: {
    role: Object,
  },
  setup(props, { emit }) {
    const roleName = ref('');

    // Watch for changes to the role prop
    watch(() => props.role, (newRole) => {
      if (newRole) {
        roleName.value = newRole.name; // Set the input to the current role name
      }
    }, { immediate: true }); // Initialize on mount

    const updateRole = () => {
      console.log(`Updating role to: ${props.role.id}`);
      Inertia.put(`/user-management/roles/${props.role.id}`, {
        name: roleName.value,
      });
      emit('close');
    };

    return {
      roleName,
      updateRole,
    };
  },
};
</script>

<style scoped>
.modal {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  display: flex;
  align-items: center;
  justify-content: center;
}
.modal-content {
  background: white;
  padding: 20px;
  border-radius: 5px;
}
</style>
