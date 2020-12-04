<template>
 <app-layout>
  <div class="bg-white h-screen flex justify-center content-center">
        <h1 class="mb-8 mt-6 font-bold text-2xl">
              <inertia-link class="text-teal-400 hover:text-teal-600">Edit Activity</inertia-link>
        </h1>
    <div  class="bg-white ml-3 rounded max-w-3xl">
      <form class="p-10" @submit.prevent="">
        <label class="mb-2 font-bold text-lg text-grey-darkest" for="account">Activity Type</label>
           <h1 class="p-1 text-teal-500" v-for="activitytype in thisactivitytype">Previous type: {{activitytype.activity}} </h1>
                    <select v-model="activity_type_id" class="border py-2 px-3 text-grey-800 w-full" name="activitytype_id">

                    <option v-bind:value="activitytype.id" v-for="activitytype in activitytypes">{{activitytype.activity}}
                    </option>

                    </select>

        <div class="flex flex-col mb-4">
           <textarea name="comments" :value="activity.comments" class="border rounded mt-2 py-2 px-3 text-grey-800 w-full" placeholder="comments">{{activity.comments}}</textarea>
        </div>
        <div class="px-8 py-4 border-gray-200 flex items-center">
          <button @click="addActivity" class="bg-teal-300 hover:bg-teal-800 text-white font-bold py-2 px-4 rounded ml-4 mt-3 mr-15">Edit Activity</button>
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
            activity: Object,
            activitytypes: Object,
            thisactivitytype: Object
        },

        data() {
            return {
                contact_id: '',
                activity_type_id: '',
                comments: ''
            }
        },
                methods: {
                }
    };
</script>

