<template>
    <div>
      <h1>User Management</h1>
      <p>List of users (Administrator cannot be updated or deleted)</p>
      <table class="table">
        <thead>
          <tr>
            <th>User</th>
            <th>Role</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="user in users" :key="user.id">
            <td>{{ user.name }}</td>
            <td>{{ user.role.name }}</td>
            <td>
              <button 
                @click="showUpdateModal(user)" 
                v-if="canUpdate(user)"
                class="btn btn-warning"
              >
                Update
              </button>
              <button 
                @click="deleteUser(user)" 
                v-if="canDelete(user)"
                class="btn btn-danger"
              >
                Delete
              </button>
            </td>
          </tr>
        </tbody>
      </table>
  
      <div v-if="showModal">
        <p>Update User Modal ({{ selectedUser.name }})</p>
        <button @click="showModal = false">Close</button>
      </div>
  
      <!-- Add User Modal component -->
      <AddUserModal v-if="showAddUserModal" @close="showAddUserModal = false" :roles="roles"/>
  
      <button @click="showAddUserModal = true" class="btn btn-primary">Add User</button>
    </div>
  </template>
  
  <script>
  import { ref } from 'vue';
  import { Inertia } from '@inertiajs/inertia';
  import AddUserModal from './Components/AddUserModal.vue';  
  
  export default {
    props: {
      users: Array,
      roles: Array,
    },
    components: {
      AddUserModal,
    },
    setup(props) {
      const showModal = ref(false);
      const showAddUserModal = ref(false);
      const selectedUser = ref(null);
  
      const canUpdate = (user) => user.role.name !== 'Administrator';
      const canDelete = (user) => user.role.name !== 'Administrator';
  
      const showUpdateModal = (user) => {
        selectedUser.value = user;
        showModal.value = true;
      };
  
      const deleteUser = (user) => {
        if (confirm(`Are you sure you want to delete user: ${user.name}?`)) {
          Inertia.delete(`/user-management/users/${user.id}`);
        }
      };
  
      return {
        showModal,
        selectedUser,
        showAddUserModal,
        canUpdate,
        canDelete,
        showUpdateModal,
        deleteUser,
        roles: props.roles,
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
  