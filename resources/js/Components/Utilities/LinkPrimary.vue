<template>
    <Link
        class="bg-blue-500 rounded-full px-4 py-2 text-white font-medium text-sm hover:bg-blue-600 transition-all ease-in-out duration-300"
        ><slot></slot
    ></Link>
</template>
<script setup>
import { Link } from "@inertiajs/vue3";
</script>
