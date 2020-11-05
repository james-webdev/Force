<template>
  <app-layout>
    <div  class="h-screen p-6 sm:px-20 bg-white border-b border-gray-200">
       <p class="mt-4 text-4xl">Our goal is to eliminate all Excel files in the World! ;)</p>
       <br/>
       <p class="mt-4 text-2xl"> Import your Excel files to Force here:</p>
       <label for="input-file-import">Upload Excel File</label>
       <input type="file"
        id="input-file-import"
         name="file_import"
         ref="import_file"
         @change="onFileChange">
        <button @click="proceedAction" class="bg-teal-400  hover:bg-teal-700 text-white font-bold py-2 px-4 rounded ml-4 mt-3 mr-15" type="submit">Submit</button>
    </div>
  </app-layout>
</template>

<script>

import AppLayout from "./../../Layouts/AppLayout";


export default {
data() {
        return {
          import_file: '',
        }
      },
      methods: {
        onFileChange(e) {
          this.import_file = e.target.files[0];
        },

         proceedAction() {
         let formData = new FormData();
         formData.append('import_file', this.import_file);
         this.$inertia.post('/import', formData)
        }
    },

  components: {
    AppLayout,
  },

};
</script>
