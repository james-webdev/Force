<template>
<app-layout>
    <div class="bg-white h-screen flex justify-center content-center">
        <h1 class="mb-8 font-bold text-3xl">
            <inertia-link class="text-teal-400 hover:text-teal-600">Account</inertia-link>
            <span class="text-teal-400 font-medium">/ {{ name }}</span>
        </h1>
        <div class="bg-white ml-3 rounded max-w-3xl">
            <form class="p-10" @submit.prevent="">
                <div class="flex flex-col mb-4">
                    <label class="mb-2 font-bold text-lg text-grey-darkest" for="name">Name</label>
                    <input name="name" v-model="name" id="name" class="border py-2 px-3 text-grey-800 w-full" />
                </div>
                <div class="flex flex-col mb-4">
                    <label class="mb-2 font-bold text-lg text-grey-darkest" for="name">Email</label>
                    <input name="email" v-model="email" class="border py-2 px-3 text-grey-800 w-full" />
                </div>
                <div class="flex flex-col mb-4">
                    <label class="mb-2 font-bold text-lg text-grey-darkest" for="name">Phone</label>
                    <input name="phone" v-model="phone" text class="border py-2 px-3 text-grey-800 w-full" />
                </div>
                <div class="flex flex-col mb-4">
                    <label class="mb-2 font-bold text-lg text-grey-darkest" for="name">Address</label>
                    <input name="address" v-model="address" class="border py-2 px-3 text-grey-800 w-full" />
                </div>
                <div class="flex flex-col mb-4">
                    <label class="mb-2 font-bold text-lg text-grey-darkest" for="name">#Contact</label>
                    <input name="contactcount" v-model="contact" class="border py-2 px-3 text-grey-800 w-full" />
                </div>
                <div class="px-8 py-4 border-gray-200 flex items-center">
                    <button @click="createAccount" class="bg-teal-700 hover:bg-teal-200 text-white font-bold py-2 px-4 rounded ml-4 mt-3 mr-15">Create Account</button>

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
    props: {},

    data() {
        return {
            name: '',
            email: '',
            phone: null,
            address: '',
            contact: '',
        }
    },
    methods: {

        createAccount() {
            let accountCreate = {
                name: this.name,
                email: this.email,
                phone: this.phone,
                address: this.address,
                contact: this.contact,
                _method: 'POST',
            }
            console.log(accountCreate);
            this.$inertia.post('/account/add', accountCreate)
        },

    }
}
</script>
