<template>
    <div>
      <h1>Roles Management</h1>
      <p>List of roles (Administrator cannot be updated or deleted)</p>
      <table>
        <tr>
          <th>Role</th>
          <th>Actions</th>
        </tr>
        <tr v-for="role in roles" :key="role.id">
          <td>{{ role.name }}</td>
          <td>
            <button @click="showUpdateModal(role)" v-if="role.name !== 'Administrator'">Update</button>
            <button @click="deleteRole(role)" v-if="role.name !== 'Administrator'">Delete</button>
          </td>
        </tr>
      </table>
  
      <!-- Placeholder for the modal -->
      <div v-if="showModal">
        <p>Update Role Modal ({{ selectedRole.name }})</p>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        roles: [
          { id: 1, name: 'Administrator' },
          { id: 2, name: 'User' }
        ],
        showModal: false,
        selectedRole: null
      };
    },
    methods: {
      showUpdateModal(role) {
        this.selectedRole = role;
        this.showModal = true;
      },
      deleteRole(role) {
        // Handle delete logic here
        alert(`Deleting role: ${role.name}`);
      }
    }
  };
  </script>
  