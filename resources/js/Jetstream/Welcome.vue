<template>
  <div>
    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
      <div>
        <jet-application-logo class="block h-12 w-auto" />
      </div>

      <div class="mt-8 text-2xl">
        Welcome to your FORCE OKOS application!
      </div>
    </div>
  </div>
</template>

<script>
import JetApplicationLogo from "./../Jetstream/ApplicationLogo";
export default {
  components: {
    JetApplicationLogo,
  },
};
</script>
