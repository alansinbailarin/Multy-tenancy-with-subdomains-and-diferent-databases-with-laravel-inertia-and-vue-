<template>
    <div class="bg-gray-100">
        <Navbar />
        <main class="">
            <slot>Default</slot>
        </main>
    </div>
</template>
<script setup>
import Navbar from "../Components/Navbar.vue";
</script>
