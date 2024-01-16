<template>
    <input
        type="text"
        :value="modelValue"
        @input="updateValue"
        class="mt-1 px-4 font-light py-2 border border-gray-200 rounded-md placeholder:text-gray-300 w-full"
    />
</template>
<script setup>
const props = defineProps({
    modelValue: String,
});

const emit = defineEmits(["update:modelValue"]);

const updateValue = (event) => {
    emit("update:modelValue", event.target.value);
};
</script>
