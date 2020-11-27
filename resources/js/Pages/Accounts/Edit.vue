<template>
 <app-layout>
  <div class="bg-white h-screen flex justify-center content-center">
    <div class="">
    <h1 class="mb-8 font-bold text-3xl">
      <inertia-link class="text-teal-400 hover:text-teal-600">Account</inertia-link>
      <span class="text-teal-400 font-medium">/ {{ account.name }}</span>
    </h1>

    <div class="bg-white ml-3 rounded max-w-3xl">
      <form class="p-10" @submit.prevent="">
        <div class="flex flex-col mb-4">
            <label class="mb-2 font-bold text-lg text-grey-darkest" for="name">Name</label>
            <input name="name" id="name" v-model="account.name" class="border py-2 px-3 text-grey-800 w-full" />
        </div>
         <div class="flex flex-col mb-4">
            <label class="mb-2 font-bold text-lg text-grey-darkest" for="name">Email</label>
            <input v-model="account.email" name="email" class="border py-2 px-3 text-grey-800 w-full"  />
        </div>
        <div class="flex flex-col mb-4">
            <label class="mb-2 font-bold text-lg text-grey-darkest" for="name">Phone</label>
            <input v-model.number="account.phone" name="phone" text class="border py-2 px-3 text-grey-800 w-full"  />
        </div>
         <div class="flex flex-col mb-4">
            <label class="mb-2 font-bold text-lg text-grey-darkest" for="name">Address</label>
            <input v-model="account.address" name="address"class="border py-2 px-3 text-grey-800 w-full"  />
          </div>
          <div class="flex flex-col mb-4">
            <label class="mb-2 font-bold text-lg text-grey-darkest" for="name">#Contact</label>
            <input v-model="account.contact" name="contactcount"class="border py-2 px-3 text-grey-800 w-full"  />
          </div>
        <div class="px-8 py-4 border-gray-200 flex items-center">
          <button @click="destroy" class="bg-teal-700 hover:bg-teal-200 text-white font-bold py-2 px-4 rounded ml-4 mt-3 mr-15">Delete Account</button>
          <button @click="editAccount" class="bg-teal-300 hover:bg-teal-800 text-white font-bold py-2 px-4 rounded ml-4 mt-3 mr-15">Edit Account</button>
        </div>
      </form>
    </div>
    </div>

 <div class="mt-40">
        <h1 class="mb-8 font-bold text-2xl">
      <inertia-link class="text-teal-400 hover:text-teal-600">Contacts</inertia-link>
        </h1>


    <div class="bg-white ml-3 rounded max-w-3xl">
        <table class="border rounded ml-20 mr-20 whitespace-no-wrap">
            <tr class="bg-white text-left font-bold">
                <th class="px-6 pt-6 pb-4">Name</th>
                <th class="px-6 pt-6 pb-4">City</th>
                <th class="px-6 pt-6 pb-4">Phone</th>

            </tr>
            <tr v-for="contact in Object.values(contacts)[0].contacts" class="hover:bg-gray-100 focus-within:bg-gray-100">

                <td class="px-6 pt-6 pb-4 border-t">
                     <inertia-link :href="route('contact.edit', contact.id)">{{ contact.name }}</inertia-link>
                </td>
                <td class="px-6 pt-6 pb-4 border-t">
                 <inertia-link :href="route('contact.edit', contact.id)">{{ contact.city }}</inertia-link>
                </td>
                <td class=" px-6 pt-6 pb-4 border-t">
                 <inertia-link :href="route('contact.edit', contact.id)">{{ contact.phone }}</inertia-link>
                </td>

            </tr>

        </table>
            <div class="px-8 py-4 border-gray-200 flex items-center">

           <inertia-link class="bg-teal-300 hover:bg-teal-800 text-white font-bold py-2 px-4 rounded ml-4 mt-3 mr-15" :href="route('contact.create')">
            <span>Add</span>
            <span class="hidden md:inline">Contact</span>
        </inertia-link>
        </div>
      </div>
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
            account: Object,
            contacts: Object
        },

        data() {
            return {
                name: '',
                email: '',
                phone: null,
                address: '',
                contact: '',
                id: '',
            }
        },
                methods: {
                    editAccount(){
                        let accountEdit = {
                            name: this.account.name,
                            email: this.account.email,
                            phone: this.account.phone,
                            address: this.account.address,
                            contact: this.account.contact,
                            id: this.account.id,
                            _method: 'PUT',
                        }

                        this.$inertia.post('/account/' + this.account.id, accountEdit)
                    },

                    destroy() {
                      let accountDelete = {
                            name: this.account.name,
                            email: this.account.email,
                            phone: this.account.phone,
                            address: this.account.address,
                            contact: this.account.contact,
                            id: this.account.id,
                            _method: 'DELETE',
                        }
                            if (confirm('Are you sure you want to delete this account?')) {
                                console.log(this.account.id);
                                this.$inertia.post('/account/' + this.account.id, accountDelete);
                            }
                        }
                }
    };
</script>
