<template>
  <div class="flex items-center">
    <div class="flex bg-white border-2 border-teal-400 border-opacity-25 rounded">
      <input class="relative px-4 py-2" autocomplete="off" type="text" name="search" placeholder="Search…"  @input="$emit('input', $event.target.value)">
    </div>
  </div>
</template>

<script>


export default {

}
</script>
