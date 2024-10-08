<template>
  <div>
      <h1>Roles Management</h1>
      <p>List of roles (Administrator cannot be updated or deleted)</p>
      <table class="table">
          <thead>
              <tr>
                  <th>Role</th>
                  <th>Actions</th>
              </tr>
          </thead>
          <tbody>
              <tr v-for="role in roles" :key="role.id">
                  <td>{{ role.name }}</td>
                  <td>
                      <button 
                          @click="showUpdateModal(role)" 
                          v-if="role.name !== 'Administrator'" 
                          class="btn btn-warning"
                      >
                          Update
                      </button>
                      <button 
                          @click="deleteRole(role)" 
                          v-if="role.name !== 'Administrator'" 
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
          <p>Update Role Modal ({{ selectedRole.name }})</p>
          <!-- Add your modal form here for updating role information -->
          <button @click="showModal = false">Close</button>
      </div>

      <button @click="addRole" class="btn btn-primary">Add Role</button>
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
  showUpdateModal(role) {
      this.selectedRole = role;
      this.showModal = true;
  },
  deleteRole(role) {
      // Handle delete logic here
      alert(`Deleting role: ${role.name}`);
  },
  addRole() {
      // Logic to add a new role
      alert('Add role logic here');
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
