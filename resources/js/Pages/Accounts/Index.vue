<template>
<app-layout>
    <template #header>
        <h2 class="text-3xl text-teal-400 hover:text-teal-600 leading-tight">
            Accounts
        </h2>
        <div> here :{{accounts.links}} </div>
    </template>
    <div class="mb-6 bg-white flex justify-between items-center">
        <input type="text" placeholder="Search.." class="border ml-20 py-2 px-3 text-grey-darkest w-full lg:w-1/2">
        <inertia-link class="bg-teal-400 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded mt-5 mr-40 mb-7" :href="route('account.create')">
            <span>Create</span>
            <span class="hidden md:inline">Account</span>
        </inertia-link>
    </div>
    <div class="bg-white h-screen flex justify-center content-center shadow overflow-x-auto">
        <table class="border rounded ml-20 mr-20 whitespace-no-wrap">
            <tr class="bg-white text-left font-bold">
                <th class="px-6 pt-6 pb-4">Name</th>
                <th class="px-6 pt-6 pb-4">Email</th>
                <th class="px-6 pt-6 pb-4">Address</th>
                <th class="px-6 pt-6 pb-4"># Contacts</th>
                <th class="px-6 pt-6 pb-4">Phone</th>

            </tr>
            <tr v-for="account in accounts" class="hover:bg-gray-100 focus-within:bg-gray-100">

                <td class="px-6 pt-6 pb-4 border-t">
                    <a :href="account.edit_url" method="post" as="button" :account="accounts">{{account.name}}</a>
                </td>
                <td class="px-6 pt-6 pb-4 border-t">
                    <inertia-link :href="account.edit_url">{{ account.email }}</inertia-link>
                </td>
                <td class="px-6 pt-6 pb-4 border-t">
                    <div>{{ account.address }}</div>
                </td>
                <td class="px-6 pt-6 pb-4 border-t">
                    <div>{{ account.contactcount }}</div>
                </td>
                <td class=" px-6 pt-6 pb-4 border-t">
                    <div>{{ account.phone }}</div>
                </td>
            </tr>

        </table>
    </div>

 <pagination :links="accounts" />
</app-layout>
</template>

<script>
import AppLayout from "./../../Layouts/AppLayout";
import Pagination from "./../../Pagination/Pagination"


export default {
    components: {
        AppLayout,
        Pagination,

    },
    props: {
        accounts: Array,
    },


};
</script>
