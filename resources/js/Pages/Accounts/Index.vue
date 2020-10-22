<template>
  <app-layout>
    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
      <p>Accounts shown here:</p>
      <ul v-for="account in accounts">
        <li>{{ account.name }}</li>
        <li>{{ account.address }}</li>
        <li>{{ account.email }}</li>
      </ul>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "./../../Layouts/AppLayout";

export default {
  components: {
    AppLayout,
  },
  props: {
    accounts: Object,
  },
};
</script>
