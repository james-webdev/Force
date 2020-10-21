<template>
  <div>
    <p>Accounts show here</p>
    <ul v-for="account in accounts">
      <li>{{ account.email }}</li>
    </ul>
  </div>
</template>

<script>
export default {
  props: {
    accounts: Object,
  },
};
</script>
