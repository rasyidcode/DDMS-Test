<script setup>
import { ref } from 'vue';

import ChangeTextButton from '../components/ChangeTextButton.vue';

const greetings = ref('Hello')

const changeText = () => {
    greetings.value = greetings.value == 'Hello' ? 'Morning' : 'Hello'
}

</script>

<template>
    <div class="p-5">
        <h1 class="text-3xl font-bold text-gray-900 mb-5">
            {{ greetings }} All
        </h1>
        <ChangeTextButton @change-text="changeText" />
    </div>
</template>

<style scoped></style>