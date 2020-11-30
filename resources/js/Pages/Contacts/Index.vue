<template>
<app-layout>
    <template #header>
        <h2 class="text-3xl text-teal-400 hover:text-teal-600 leading-tight">
            Contacts
        </h2>
    </template>

    <div class="mb-6 flex justify-between items-center">
        <search-filter v-model="form.search" class="ml-20 py-2 px-3 text-grey-darkest w-full lg:w-1/2">
      </search-filter>

        <inertia-link class="bg-teal-300 hover:bg-teal-800 text-white font-bold py-2 px-4 rounded ml-4 mt-3 mr-15" :href="route('contact.create')">
            <span>Create</span>
            <span class="hidden md:inline">Contact</span>
        </inertia-link>
    </div>
  <!-- <h1> here: {{contacts.data}}</h1> <h1> here: {{contacts}}</h1> <h1> here: {{contacts}}</h1> <h1> here: {{contacts[0].accounts.name}}</h1> -->
  

    <div class="bg-white mb-10 flex justify-center content-center">
        <table class="border rounded ml-20 mr-20 whitespace-no-wrap">
            <tr class="bg-white text-left font-bold">
                <th class="px-6 pt-6 pb-4">Name</th>
                <th class="px-6 pt-6 pb-4">Account</th>
                <th class="px-6 pt-6 pb-4">City</th>
                <th class="px-6 pt-6 pb-4">Phone</th>
            </tr>
            <tr v-for="contact in contacts.data" class="hover:bg-gray-100 focus-within:bg-gray-100">

                <td class="px-6 pt-6 pb-4 border-t">
                    <inertia-link :href="route('contact.edit', contact.id)">{{ contact.name }}</inertia-link>
                </td>
                <td class="px-6 pt-6 pb-4 border-t">

                    <inertia-link v-if="contact.accounts" :href="route('account.edit', contact.accounts.id)">{{ contact.accounts.name }}</inertia-link>
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
 <pagination class="p-2 mb-10" :links="contacts.pagination.links" />
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
        contacts: Object,
        filters: Object,
        activities: Object,
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
        console.log(query);
        this.$inertia.replace(this.route('contact.index', query))
      }, 150),
      deep: true,
    },
  },

};
</script>
