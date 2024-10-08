<template>
    <div>
      <h1>Users Management</h1>
      <p>List of users (Administrator cannot be updated or deleted)</p>
      <table>
        <tr>
          <th>User</th>
          <th>Actions</th>
        </tr>
        <tr v-for="user in users" :key="user.id">
          <td>{{ user.name }}</td>
          <td>
            <button @click="showUpdateModal(user)" v-if="user.role !== 'Administrator'">Update</button>
            <button @click="deleteUser(user)" v-if="user.role !== 'Administrator'">Delete</button>
          </td>
        </tr>
      </table>
  
      <!-- Placeholder for the modal -->
      <div v-if="showModal">
        <p>Update User Modal ({{ selectedUser.name }})</p>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        users: [
          { id: 1, name: 'Admin User', role: 'Administrator' },
          { id: 2, name: 'Regular User', role: 'User' }
        ],
        showModal: false,
        selectedUser: null
      };
    },
    methods: {
      showUpdateModal(user) {
        this.selectedUser = user;
        this.showModal = true;
      },
      deleteUser(user) {
        // Handle delete logic here
        alert(`Deleting user: ${user.name}`);
      }
    }
  };
  </script>
  