<template>
 <app-layout>
  <div class="bg-white h-screen">
    <div class="flex justify-center content-center">
    <h1 class="mb-8 font-bold text-3xl">
      <inertia-link class="text-teal-400 hover:text-teal-600">Contacts</inertia-link>
      <span class="text-teal-400 font-medium">/ {{ contact.name }}</span>
    </h1>
    <div class="bg-white ml-3 rounded max-w-3xl">
      <form class="p-10" @submit.prevent="">
        <div class="flex flex-col mb-4">
            <label class="mb-2 font-bold text-lg text-grey-darkest" for="name">Name</label>
            <input name="name" id="name" v-model="contact.name" class="border py-2 px-3 text-grey-800 w-full" />
        </div>
         <div class="flex flex-col mb-4">
            <label class="mb-2 font-bold text-lg text-grey-darkest" for="name">City</label>
            <input v-model="contact.city" name="email" class="border py-2 px-3 text-grey-800 w-full"  />
        </div>
        <div class="flex flex-col mb-4">
            <label class="mb-2 font-bold text-lg text-grey-darkest" for="name">Phone</label>
            <input v-model.number="contact.phone" name="phone" text class="border py-2 px-3 text-grey-800 w-full"  />
        </div>
        <div class="px-8 py-4 border-gray-200 flex items-center">
          <button @click="destroy" class="bg-teal-700 hover:bg-teal-200 text-white font-bold py-2 px-4 rounded ml-4 mt-3 mr-15">Delete Contact</button>
          <button @click="editContact" class="bg-teal-300 hover:bg-teal-800 text-white font-bold py-2 px-4 rounded ml-4 mt-3 mr-15">Edit Contact</button>
        </div>
      </form>
    </div>
    </div>

    <div class="flex justify-center content-center mt-5" v-if="activitytypes.length !== 0">
        <h1 class="mb-8 mt-6 mr-6 font-bold text-2xl">
              <inertia-link class="text-teal-400 hover:text-teal-600">Activities</inertia-link>
        </h1>
    <div class="bg-white ml-3 rounded max-w-3xl">


  <div class="flex justify-between content-center">
        <table class="table-auto border solid rounded p-4">
        <thead class="border solid">
            <tr >
            <th class="border solid">Activity</th>
            <th class="border solid">Date</th>
            <th class="border solid">Comments</th>
             <th></th>
             <th></th>
            </tr>
        </thead>
        <tbody class="border solid" v-for="activitytype in Object.values(activitytypes)">
        <!--<h1>{{activitytype.id}}</h1>-->

            <tr class="p-3 text-teal-500">
            <td class="p-3 border solid">{{activitytype.type.activity}}</td>
            <td class="p-3 border solid">{{activitytype.created_at.substring(0,10)}}</td>
            <td class="p-3 border solid">{{activitytype.comments}}</td>
             <td class="p-3 border solid"> <inertia-link  class="text-xs bg-gray-300 hover:bg-teal-300 text-teal t-teal-100 font-bold p-1 ml-1 mb-3 rounded" :href="route('activity.edit', activitytype.id)"><i class="far fa-edit"></i></inertia-link></td>
              <td class="p-3 border solid"> <inertia-link method="delete" class="text-xs bg-gray-300 hover:bg-teal-800 text-teal-700 hover:text-teal-100 font-bold p-1 ml-1 mb-3 rounded" :href="route('activity.destroy', activitytype.id)"><i class="far fa-trash-alt"></i></inertia-link></td>
            </tr>
            </tr>
        </tbody>
        </table>


</div>
         <div class="px-8 py-4 border-gray-200 flex items-center">
           <inertia-link class="bg-teal-400 hover:bg-teal-500 text-white font-bold py-1 px-2 rounded ml-4 mt-3 mr-15 mb-20" :href="route('contact.activity', contact.id)">Add New Activity</inertia-link>
        </div>
    </div>
    </div>
    <div class="ml-60 flex justify-content items-center" v-else>
       <div class="px-8 py-4 border-gray-200 flex justify-content items-center">
           <inertia-link class="bg-teal-300 hover:bg-teal-800 text-white font-bold py-1 px-2 rounded ml-60 mt-3 mr-15" :href="route('activity.create')">Add Activity</inertia-link>
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
            contact: Object,
            activities: Array,
            activitytypes: Object
        },

        data() {
            return {
                name: '',
                phone: null,
                city: '',
                id: '',
            }
        },
                methods: {
                    editContact(){
                        console.log("clicked edit contact");
                        let contactsEdit = {
                            name: this.contact.name,
                            phone: this.contact.phone,
                            city: this.contact.city,
                            id: this.contact.id,
                            _method: 'PUT',
                        }

                        this.$inertia.post('/contact/' + this.contact.id, contactsEdit)
                    },

                    destroy() {
                      let contactsDelete = {
                            name: this.contact.name,
                            phone: this.contact.phone,
                            city: this.contact.city,
                            id: this.contact.id,
                            _method: 'DELETE',
                        }
                            if (confirm('Are you sure you want to delete this contact?')) {
                                console.log(this.contact.id);
                                this.$inertia.post('/contact/' + this.contact.id, contactsDelete);
                            }
                        },

                    editActivity(){

                        let activityEdit = {
                           activity_type: this.activity_type,
                           created_at: this.created_at,
                           comments: this.comments,
                           _method: 'PUT',
                        }
                        console.log(activityEdit);
                        this.$inertia.post('/activity/', activityEdit)
                    },

                }
    };
</script>

