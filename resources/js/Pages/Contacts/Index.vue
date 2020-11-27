<template>
<app-layout>
    <template #header>
        <h2 class="text-3xl text-teal-400 hover:text-teal-600 leading-tight">
            Contacts
        </h2>
    </template>

    <div class="mb-6 flex justify-between items-center">
        <input type="text" placeholder="Search.." class="border ml-20 py-2 px-3 text-grey-darkest w-full lg:w-1/2">

        <inertia-link class="bg-teal-400 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded mt-5 mr-40 mb-7">
            <span>Create</span>
            <span class="hidden md:inline">Contact</span>
        </inertia-link>
    </div>
  <!-- <h1> here: {{contacts[0].accounts.name}}</h1> -->

    <div class="bg-white h-screen flex justify-center content-center shadow overflow-x-auto">
        <table class="border rounded ml-20 mr-20 whitespace-no-wrap">
            <tr class="bg-white text-left font-bold">
                <th class="px-6 pt-6 pb-4">Name</th>
                <th class="px-6 pt-6 pb-4">Account</th>
                <th class="px-6 pt-6 pb-4">City</th>
                <th class="px-6 pt-6 pb-4">Phone</th>
            </tr>
            <tr v-for="contact in contacts" class="hover:bg-gray-100 focus-within:bg-gray-100">

                <td class="px-6 pt-6 pb-4 border-t">
                    <inertia-link :href="route('contact.edit', contact.id)">{{ contact.name }}</inertia-link>
                </td>
                <td class="px-6 pt-6 pb-4 border-t">
                    <inertia-link :href="route('account.edit', contact.accounts.id)">{{ contact.accounts.name }}</inertia-link>
                </td>
                <td class="px-6 pt-6 pb-4 border-t">
                     <inertia-link :href="route('contact.edit', contact.id)">{{ contact.city }}</inertia-link>
                </td>
                <td class=" px-6 pt-6 pb-4 border-t">
                    <inertia-link :href="route('contact.edit', contact.id)">{{ contact.phone }}</inertia-link>
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
        contacts: Array,
    },
};
</script>
