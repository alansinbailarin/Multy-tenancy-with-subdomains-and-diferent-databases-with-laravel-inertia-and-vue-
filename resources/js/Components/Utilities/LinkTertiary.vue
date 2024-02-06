<template>
    <Link
        class="px-4 py-2 text-blue-500 underline font-medium text-sm transition-all ease-in-out duration-300"
        ><slot></slot
    ></Link>
</template>
<script setup>
import { Link } from "@inertiajs/vue3";
</script>
