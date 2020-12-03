<template>
<app-layout>
    <template #header>
        <h2 class="text-3xl text-teal-400 hover:text-teal-600 leading-tight">
            Accounts
        </h2>
    </template>
    <div class="mb-6 bg-white flex justify-between items-center">
    <search-filter v-model="form.search" class="ml-20 py-2 px-3 text-grey-darkest w-full lg:w-1/2">
      </search-filter>

        <inertia-link class="bg-teal-400 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded mt-5 mr-40 mb-7" :href="route('account.create')">
            <span>Create</span>
            <span class="hidden md:inline">Account</span>
        </inertia-link>
    </div>
    <div class="bg-white mb-10 flex justify-center content-center">
        <table class="border rounded ml-20 mr-20 whitespace-no-wrap">
            <tr class="bg-white text-left font-bold">
                <th class="px-6 pt-6 pb-4">Name</th>
                <th class="px-6 pt-6 pb-4">Email</th>
                <th class="px-6 pt-6 pb-4">Address</th>
                <th class="px-6 pt-6 pb-4"># Contacts</th>
                <th class="px-6 pt-6 pb-4">Phone</th>

            </tr>
            <tr v-for="account in accounts.data" class="hover:bg-gray-100 focus-within:bg-gray-100">

                <td class="px-6 pt-6 pb-4 border-t">
                     <inertia-link :href="route('account.show', account.id)">{{ account.name }}</inertia-link>
                </td>
                <td class="px-6 pt-6 pb-4 border-t">
                    <inertia-link :href="route('account.show', account.id)">{{ account.email }}</inertia-link>
                </td>
                <td class="px-6 pt-6 pb-4 border-t">
                 <inertia-link :href="route('account.show', account.id)">{{ account.address }}</inertia-link>
                </td>
                <td class="px-6 pt-6 pb-4 border-t">
                 <inertia-link :href="route('account.show', account.id)">{{ account.contacts_count }}</inertia-link>
                </td>
                <td class=" px-6 pt-6 pb-4 border-t">
                 <inertia-link :href="route('account.show', account.id)">{{ account.phone }}</inertia-link>
                </td>

            </tr>
            </table>

    </div>

 <pagination class="p-2 mb-6" :links="accounts.pagination.links" />
</app-layout>
</template>

<script>
import AppLayout from "./../../Layouts/AppLayout";
import Pagination from "./../../Pagination/Pagination"
import SearchFilter from "./../../Search/SearchFilter"
import mapValues from 'lodash/mapValues'
import pickBy from 'lodash/pickBy'
import throttle from 'lodash/throttle'

export default {
    components: {
        AppLayout,
        Pagination,
        SearchFilter
    },
    props: {
        accounts: Object,
        filters: Object,

    },
    data() {
    return {
      form: {
        search: this.filters.search,
      },
    }
  },

  watch: {
    form: {
      handler: throttle(function() {
        // console.log(this.form);
        let query = pickBy(this.form)
        // console.log(query);
        this.$inertia.replace(this.route('account.index', query))
      }, 150),
      deep: true,
    },
  },


};
</script>
