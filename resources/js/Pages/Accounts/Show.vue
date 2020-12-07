<template>
 <app-layout>
  <div class="bg-white h-screen flex justify-center content-center">

        <h1 class="mb-8 font-bold text-3xl text-teal-400 font-medium">{{ account.name }}</h1>

    <div class="bg-white ml-3 rounded max-w-3xl">

         
            <p class="font-bold text-lg text-grey-darkest">Email:
                <span class="font-normal py-2 px-3 text-grey-800 w-full">{{ account.email}}</span></p>

            <p class=" font-bold text-lg text-grey-darkest">Phone:
            <span class="py-2 px-3 text-grey-800 w-full" >{{ account.phone}}</span></p>
        </div>
         <div class="flex flex-col mb-4">
            <label class=" font-bold text-lg text-grey-darkest" for="name">Address</label>
            <input v-model="account.address" name="address"class="py-2 px-3 text-grey-800 w-full"  />
          </div>
          <div class="flex flex-col mb-4">
            <label class=" font-bold text-lg text-grey-darkest" for="name">#Contact</label>
            <input v-model="account.contact" name="contactcount"class="py-2 px-3 text-grey-800 w-full"  />
          </div>

    </div>


 <div class="mt-40">
        <h1 class="mb-8 font-bold text-2xl">
      <inertia-link class="text-teal-400 hover:text-teal-600">Contacts</inertia-link>
        </h1>
        <div class="px-8 py-4 border-gray-200 flex items-center">

           <inertia-link class="bg-teal-300 hover:bg-teal-800 text-white font-bold py-2 px-4 rounded ml-4 mt-3 mr-15" :href="route('contact.create')">
            <span>Add</span>
            <span class="hidden md:inline">Contact</span>
        </inertia-link>

    <div class="bg-white ml-3 rounded max-w-3xl">
        <table class="rounded ml-20 mr-20 whitespace-no-wrap">
            
                <th class="px-6 pt-6 pb-4">Name</th>
                <th class="px-6 pt-6 pb-4">City</th>
                <th class="px-6 pt-6 pb-4">Phone</th>


   


        </table>
        
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
