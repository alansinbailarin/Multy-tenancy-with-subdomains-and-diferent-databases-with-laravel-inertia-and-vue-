<template>
    <div class="flex items-center justify-between">
        <picture v-if="user.avatar" class="cursor-pointer">
            <img :src="user.avatar" alt="" class="w-10 h-10 rounded-md" />
        </picture>
        <span
            class="bg-gray-100 cursor-pointer w-10 h-10 rounded-md font-medium text-center text-gray-500 flex items-center justify-center text-xl"
            v-else
        >
            {{ initials.getInitials(user.name, user.surname) }}
        </span>
    </div>
</template>
<script setup>
import { useGetInitials } from "@/composables/useGetInitials";

defineProps({
    user: {
        type: Object,
        required: true,
    },
});

const initials = useGetInitials();
</script>
