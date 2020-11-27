<template>
 <app-layout>
  <div class="bg-white h-screen flex justify-center content-center">
    <div class="">
    <h1 class="mb-8 font-bold text-3xl">
      <inertia-link class="text-teal-400 hover:text-teal-600">contacts</inertia-link>
      <span class="text-teal-400 font-medium">/ {{ contacts.name }}</span>
    </h1>

    <div class="bg-white ml-3 rounded max-w-3xl">
      <form class="p-10" @submit.prevent="">
        <div class="flex flex-col mb-4">
            <label class="mb-2 font-bold text-lg text-grey-darkest" for="name">Name</label>
            <input name="name" id="name" v-model="contacts.name" class="border py-2 px-3 text-grey-800 w-full" />
        </div>
         <div class="flex flex-col mb-4">
            <label class="mb-2 font-bold text-lg text-grey-darkest" for="name">City</label>
            <input v-model="contacts.city" name="email" class="border py-2 px-3 text-grey-800 w-full"  />
        </div>
        <div class="flex flex-col mb-4">
            <label class="mb-2 font-bold text-lg text-grey-darkest" for="name">Phone</label>
            <input v-model.number="contacts.phone" name="phone" text class="border py-2 px-3 text-grey-800 w-full"  />
        </div>
        <div class="px-8 py-4 border-gray-200 flex items-center">
          <button @click="destroy" class="bg-teal-700 hover:bg-teal-200 text-white font-bold py-2 px-4 rounded ml-4 mt-3 mr-15">Delete Contact</button>
          <button @click="editContact" class="bg-teal-300 hover:bg-teal-800 text-white font-bold py-2 px-4 rounded ml-4 mt-3 mr-15">Edit Contact</button>
        </div>
      </form>
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
            contacts: Object
        },

        data() {
            return {
                name: '',
                phone: null,
                city: '',
            }
        },
                methods: {
                    editcontact(){
                        let contactsEdit = {
                            name: this.contacts.name,
                            email: this.contacts.email,
                            phone: this.contacts.phone,
                            address: this.contacts.address,
                            contact: this.contacts.contact,
                            id: this.contacts.id,
                            _method: 'PUT',
                        }

                        this.$inertia.post('/contacts/' + this.contacts.id, contactsEdit)
                    },

                    destroy() {
                      let contactsDelete = {
                            name: this.contacts.name,
                            email: this.contacts.email,
                            phone: this.contacts.phone,
                            address: this.contacts.address,
                            contact: this.contacts.contact,
                            id: this.contacts.id,
                            _method: 'DELETE',
                        }
                            if (confirm('Are you sure you want to delete this contact?')) {
                                console.log(this.contacts.id);
                                this.$inertia.post('/contacts/' + this.contacts.id, contactsDelete);
                            }
                        }
                }
    };
</script>

