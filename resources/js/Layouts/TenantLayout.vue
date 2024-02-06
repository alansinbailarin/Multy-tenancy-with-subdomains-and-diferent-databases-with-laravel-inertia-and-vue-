<template>
    <div class="">
        <Navbar
            :user="user"
            :establishment="establishment"
            :preferences="preferences"
        />
        <main class="">
            <slot>Default</slot>
        </main>
        <Footer :preferences="preferences" :establishment="establishment" />
    </div>
</template>
<script setup>
import { usePage } from "@inertiajs/vue3";
import Navbar from "../Components/Tenant/Navbar.vue";
import Footer from "../Components/Tenant/Footer.vue";
import { computed } from "vue";

const page = usePage();

const user = computed(() => page.props.auth.user);
const establishment = computed(() => page.props.establishment);
const preferences = computed(() => page.props.preferences);
</script>
