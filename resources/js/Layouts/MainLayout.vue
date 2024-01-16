<template>
    <div class="bg-gray-100">
        <Navbar />
        <main class="min-h-[78vh]">
            <slot>Default</slot>
        </main>
    </div>
</template>
<script setup>
import { usePage } from "@inertiajs/vue3";
import Navbar from "../Components/Navbar.vue";
</script>
