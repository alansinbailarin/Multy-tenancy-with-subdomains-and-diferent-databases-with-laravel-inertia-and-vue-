<template>
    <Link
        class="bg-gray-100 rounded-full px-4 py-2 text-gray-600 font-medium text-sm hover:bg-gray-200 transition-all ease-in-out duration-300"
        ><slot></slot
    ></Link>
</template>
<script setup>
import { Link } from "@inertiajs/vue3";
</script>
