<template>
 <app-layout>
  <div class="bg-white h-screen flex justify-center content-center">
    <div class="">
    <h1 class="mb-8 font-bold text-3xl">
      <inertia-link class="text-teal-400 hover:text-teal-600">contacts</inertia-link>
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
 <!--<h1> {{activities}}</h1> -->
    <div v-if="activities.length !== 0 && activitytypes.length !== 0">
        <h1 class="mb-8 mt-6 font-bold text-2xl">
              <inertia-link class="text-teal-400 hover:text-teal-600">Activities</inertia-link>
        </h1>
    <div  class="bg-white ml-3 rounded max-w-3xl">
      <div class="px-8 py-4 border-gray-200 flex items-center">
           <inertia-link class="bg-teal-200 hover:bg-teal-400 text-white font-bold py-1 px-2 rounded ml-4 mt-3 mr-15" :href="route('activity.create')">Add New Activity</inertia-link>
        </div>
      <form class="p-5" @submit.prevent="">
        <div v-for="activitytype in Object.values(activitytypes)">
            <h1 class="text-teal-500">Activity Type : {{activitytype.type.activity}}, Date Added: {{activitytype.type.created_at.substring(0,10)}} </h1>
        </div>
        <div v-for="activity in activities" class="flex flex-col">
           <p class="py-2 text-teal-500 w-full" v-bind:value="activity.comments">Comment: {{activity.comments}}</p>
        </div>
        <div class="px-8 py-4 border-gray-200 flex items-center">
          <button @click="" class="bg-teal-700 hover:bg-teal-200 text-white font-bold py-1 px-2 rounded ml-4 mt-3 mr-15">Delete Activities</button>
          <button @click="editActivity" class="bg-teal-300 hover:bg-teal-800 text-white font-bold py-1 px-2 rounded ml-4 mt-3 mr-15">Edit Activities</button>
        </div>
      </form>
    </div>
    </div>
    <div v-else>
       <div class="px-8 py-4 border-gray-200 flex items-center">
           <inertia-link class="bg-teal-300 hover:bg-teal-800 text-white font-bold py-2 px-4 rounded ml-4 mt-3 mr-15" :href="route('activity.create')">Add Activity</inertia-link>
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
            activities: Object,
            activitytypes: Object
        },

        data() {
            return {
                name: '',
                phone: null,
                city: '',
                called: false,
                met: false,
                proposed: false,
                assisted: false,
                comments: '',
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
                        console.log(this.activity);
                        let activityEdit = {

                           called: this.called,
                           met: this.met,
                           proposed: this.proposed,
                           assisted: this.assisted,
                           comments: this.comments,
                           id: this.id,
                           _method: 'PUT',
                        }
                        console.log(activityEdit);
                        this.$inertia.post('/activity/' + this.activity.id, activityEdit)
                    },
                }
    };
</script>

