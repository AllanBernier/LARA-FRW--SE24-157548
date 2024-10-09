<script setup lang="ts">
defineProps<{
  name: string;
}>();

</script>


<template>
  <div>
    Hello from {{ name }}
  </div>
</template>