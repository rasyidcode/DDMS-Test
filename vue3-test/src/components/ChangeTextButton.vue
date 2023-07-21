<script setup>
const emit = defineEmits(['changeText']);

</script>

<template>
    <button @click="$emit('changeText')" class=" bg-purple-500 py-2 px-4 font-medium text-white rounded hover:bg-purple-700
      transition duration-150 ease-in-out">Change Text</button>
</template>

<style scoped></style>