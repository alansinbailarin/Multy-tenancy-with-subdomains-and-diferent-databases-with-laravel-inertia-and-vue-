<template>
    <div
        class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden"
    >
        <RememberManage v-if="user.first_login" />
        <Navbar
            :user="user"
            :establishment="establishment"
            :preferences="preferences"
        />
        <div class="flex overflow-hidden">
            <Sidebar />

            <main class="">
                <slot>Default</slot>
            </main>
        </div>
        <Footer :preferences="preferences" :establishment="establishment" />
    </div>
</template>
<script setup>
import { usePage } from "@inertiajs/vue3";
import Navbar from "../../Components/Tenant/dashboard/Navbar.vue";
import Footer from "../../Components/Tenant/dashboard/Footer.vue";
import Sidebar from "../../Components/Tenant/dashboard/Sidebar.vue";
import RememberManage from "../../Components/Tenant/dashboard/RememberManage.vue";
import { computed } from "vue";

const page = usePage();

const user = computed(() => page.props.auth.user);
const establishment = computed(() => page.props.establishment);
const preferences = computed(() => page.props.preferences);
</script>
