<template>
  <div class="flex items-center">
    <div class="flex w-full bg-white shadow rounded">
      <input class="relative w-full px-6 py-3" autocomplete="off" type="text" name="search" placeholder="Search…"  @input="$emit('input', $event.target.value)">
    </div>
  </div>
</template>

<script>


export default {
  
}
</script>
