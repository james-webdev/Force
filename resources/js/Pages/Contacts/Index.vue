<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Contacts
      </h2>
    </template>

 <div class="mb-6 flex justify-between items-center">
      <input type="text" placeholder="Search.." class="w-full max-w-md mr-4 ml-5">

      <inertia-link class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-5 mr-15" :href="route('contacts.create')">
        <span>Create</span>
        <span class="hidden md:inline">Contact</span>
      </inertia-link>
    </div>

 <div class="bg-white rounded shadow overflow-x-auto">
      <table class="w-full whitespace-no-wrap">
        <tr class="text-left font-bold">
          <th class="px-6 pt-6 pb-4">Name</th>
          <th class="px-6 pt-6 pb-4">Organization</th>
          <th class="px-6 pt-6 pb-4">City</th>
          <th class="px-6 pt-6 pb-4" colspan="2">Phone</th>
        </tr>
        <tr v-for="contact in contacts" class="hover:bg-gray-100 focus-within:bg-gray-100">
          <td class="px-6 pt-6 pb-4 border-t">
           <div>{{ contact.name }}</div>
          </td>
          <td class="px-6 pt-6 pb-4 border-t">
            <div>{{ contact.name }}</div>
          </td>
          <td class="px-6 pt-6 pb-4 border-t">
            <div>{{ contact.city }}</div>
          </td>
          <td class="px-6 pt-6 pb-4 border-t">
           <div>{{ contact.phone }}</div>
          </td>
        </tr>

      </table>
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
    contacts: Object,
  },
};
</script>
