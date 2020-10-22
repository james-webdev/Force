<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Accounts
      </h2>
    </template>

    <div>
      <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
        <ul v-for="account in accounts">
          <li>{{ account.name }}</li>
          <li>{{ account.address }}</li>
          <li>{{ account.email }}</li>
        </ul>
      </div>
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
