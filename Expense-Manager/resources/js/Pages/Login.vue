<template>
  <LoginLayout>
    <form @submit.prevent="submit">
      <div>
        <label for="email">Email:</label>
        <input type="email" v-model="email" required />
      </div>
      <div>
        <label for="password">Password:</label>
        <input type="password" v-model="password" required />
      </div>
      <button type="submit">Login</button>
    </form>
  </LoginLayout>
</template>

<script>
import LoginLayout from './Layouts/LoginLayout.vue';

export default {
  components: {
    LoginLayout,
  },
  data() {
    return {
      email: '',
      password: '',
    };
  },
  methods: {
    submit() {
      this.$inertia.post('/login', { email: this.email, password: this.password });
    },
  },
};
</script>

<style scoped>
form {
  display: flex;
  flex-direction: column;
  width: 300px; /* Adjust the width of the login form */
}

div {
  margin-bottom: 15px; /* Space between form fields */
}
</style>
