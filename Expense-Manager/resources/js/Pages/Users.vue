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
                  <td>{{ user.role }}</td>
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
          <!-- Add your modal form here for updating user information -->
          <button @click="showModal = false">Close</button>
      </div>

      <button @click="addUser" class="btn btn-primary">Add User</button>
  </div>
</template>

<script>
export default {
  data() {
      return {
          users: [
              { id: 1, name: 'Admin User', role: 'Administrator' },
              { id: 2, name: 'Regular User', role: 'User' },
          ],
          showModal: false,
          selectedUser: null
      };
  },
  // Use a computed property to determine actions
  computed: {
      canUpdate() {
          return (user) => user.role !== 'Administrator';
      },
      canDelete() {
          return (user) => user.role !== 'Administrator';
      }
  },
  // You can define the functions directly in the `methods` property as constants
  showUpdateModal(user) {
      this.selectedUser = user;
      this.showModal = true;
  },
  deleteUser(user) {
      // Handle delete logic here
      alert(`Deleting user: ${user.name}`);
  },
  addUser() {
      // Logic to add a new user
      alert('Add user logic here');
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
