<template>
    <div class="sidebar">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark flex-column" style="height: 100vh;">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <Link class="nav-link" href="/">Home</Link>
                </li>
                <li class="nav-item">
                    <Link class="nav-link" href="/dashboard">Dashboard</Link>
                </li>

                <li class="nav-item">
                    <h5 class="text-white">User Management</h5>
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <Link class="nav-link" href="/user-management/roles">Roles</Link>
                        </li>
                        <li class="nav-item">
                            <Link class="nav-link" href="/user-management/users">Users</Link>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <h5 class="text-white">Expense Management</h5>
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <Link class="nav-link" href="/expense-management/categories">Expense Categories</Link>
                        </li>
                        <li class="nav-item">
                            <Link class="nav-link" href="/expense-management/expenses">Expenses</Link>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</template>

<script>
import { Link } from '@inertiajs/vue3';

export default {
    components: {
        Link
    }
};
</script>

<style scoped>
.sidebar {
    width: 250px; /* Adjust width as needed */
}

/* Additional styles for headers */
h5 {
    margin: 10px 0; /* Space above and below the headers */
}

.nav-link {
    padding-left: 10px; /* Additional padding for nav links */
}

.nav-link:hover {
    background-color: #495057; /* Background on hover for links */
}

.nav-link.active {
    background-color: #495057; /* Active background for the current link */
}
</style>
