<template>
  <div>
    <div class="mb-4">
      <inertia-link
        class="flex items-center group py-3"
        :href="route('dashboard')"
      >
        <div
          :class="
            isUrl('') ? 'text-white' : 'text-indigo-300 group-hover:text-white'
          "
        >
          Dashboard
        </div>
      </inertia-link>
    </div>
    <div class="mb-4">
      <inertia-link
        class="flex items-center group py-3"
        :href="route('organizations')"
      >
        <div
          :class="
            isUrl('organizations')
              ? 'text-white'
              : 'text-indigo-300 group-hover:text-white'
          "
        >
          Organizations
        </div>
      </inertia-link>
    </div>
    <div class="mb-4">
      <inertia-link
        class="flex items-center group py-3"
        :href="route('contacts')"
      >
        <div
          :class="
            isUrl('contacts')
              ? 'text-white'
              : 'text-indigo-300 group-hover:text-white'
          "
        >
          Contacts
        </div>
      </inertia-link>
    </div>
    <div class="mb-4">
      <inertia-link
        class="flex items-center group py-3"
        :href="route('reports')"
      >
        <div
          :class="
            isUrl('reports')
              ? 'text-white'
              : 'text-indigo-300 group-hover:text-white'
          "
        >
          Reports
        </div>
      </inertia-link>
    </div>
  </div>
</template>

<script>
export default {
  components: {},
  props: {},
  methods: {},
};
</script>
