<template>
<app-layout>
    <div class="bg-white h-screen flex justify-center content-center">
        <h1 class="mb-8 font-bold text-3xl">
            <inertia-link class="text-teal-400 hover:text-teal-600">Contact</inertia-link>
            <span class="text-teal-400 font-medium">/ {{ name }}</span>
        </h1>
        <div class="bg-white ml-3 rounded max-w-3xl">
            <form class="p-10" @submit.prevent="">
                <div class="flex flex-col mb-4">
                    <label class="mb-2 font-bold text-lg text-grey-darkest" for="name">Name</label>
                    <input name="name" v-model="name" id="name" class="border py-2 px-3 text-grey-800 w-full" />
                </div>
                <div class="flex flex-col mb-4">
                    <label class="mb-2 font-bold text-lg text-grey-darkest" for="phone">Phone</label>
                    <input name="phone" v-model="phone" text class="border py-2 px-3 text-grey-800 w-full" />
                </div>
                <div class="flex flex-col mb-4">
                    <label class="mb-2 font-bold text-lg text-grey-darkest" for="city">City</label>
                    <input name="city" v-model="city" class="border py-2 px-3 text-grey-800 w-full" />
                </div>
                <div class="flex flex-col mb-4">
                    <label class="mb-2 font-bold text-lg text-grey-darkest" for="account">Account</label>

                    <select v-model="account" class="border py-2 px-3 text-grey-800 w-full" name="account_id">

                    <option v-for="account in accounts" v-bind:value="account.id">{{account.name}} </option>

                    </select>

                </div>
                <div class="px-8 py-4 border-gray-200 flex items-center">
                    <button @click="createContact" class="bg-teal-700 hover:bg-teal-200 text-white font-bold py-2 px-4 rounded ml-4 mt-3 mr-15">Create Contact</button>

                </div>
            </form>
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

    data() {
        return {
            name: '',
            phone: null,
            city: '',
            account_id: this.accounts,
        }
    },
    methods: {

        createContact() {
            let contactCreate = {
                name: this.name,
                phone: this.phone,
                city: this.city,
                account: this.account,

            }
            console.log(contactCreate);
            this.$inertia.post('/contact', contactCreate)
        },

    }
}
</script>
