<script setup>
const emit = defineEmits(['update:modelValue'])
const props = defineProps({
    modelValue: {
        type: String,
        default: null
    },
    options: {
        type: Array,
        required: true
    },
    labelText: {
        type: String,
        required: true
    },
})
</script>

<template>
    <select class="py-2 px-4 border mr-5" :value="modelValue" @change="$emit('update:modelValue', $event.target.value)">
        <option value="" :selected="(modelValue == null)">{{ labelText }}</option>
        <option v-for="(opt, i) in props.options" :value="opt.value" :selected="(modelValue == 'id')" :key="i">{{ opt.text }}</option>
    </select>
</template>

<style scoped></style>