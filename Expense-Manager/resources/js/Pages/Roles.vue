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

        <AddRoleModal v-if="showAddRoleModal" @close="showAddRoleModal = false" />

        <button @click="showAddRoleModal = true" class="btn btn-primary">Add Role</button>
    </div>
</template>

<script>
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import AddRoleModal from './Components/AddRoleModal.vue';

export default {
    props: {
        roles: Array,
    },
    components: {
        AddRoleModal,
    },
    setup(props) {
        const showAddRoleModal = ref(false);
        const showModal = ref(false);
        const selectedRole = ref(null);

        const showUpdateModal = (role) => {
            selectedRole.value = role;
            showModal.value = true;
        };

        const deleteRole = (role) => {
            if (confirm(`Are you sure you want to delete role: ${role.name}?`)) {
                Inertia.delete(`/user-management/roles/${role.id}`); 
            }
        };

        return {
            showAddRoleModal,
            showModal,
            selectedRole,
            showUpdateModal,
            deleteRole,
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
