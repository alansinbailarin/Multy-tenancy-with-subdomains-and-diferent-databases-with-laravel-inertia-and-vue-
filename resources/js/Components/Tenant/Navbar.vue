<template>
    <nav
        class="w-full fixed top-0 z-10 px-4 py-4 shadow-sm"
        :style="{ 'background-color': preferences?.navbar_color }"
    >
        <div class="flex items-center justify-between md:mx-6">
            <div>
                <Link href="/" class="" v-if="establishment.logo_path">
                    <img
                        :src="establishment.logo_path"
                        alt=""
                        class="w-full h-14 object-cover"
                    />
                </Link>
                <Link
                    href="/"
                    class="text-gray-700 font-semibold text-2xl"
                    v-else
                    >{{ establishment.name }}</Link
                >
            </div>
            <div class="flex gap-2 items-center">
                <Link
                    v-if="user && user.position === 'Owner'"
                    href="#"
                    class="hidden md:block rounded-md px-4 py-1.5"
                    :style="{
                        color: preferences?.navbar_button_secondary_text_color,
                        'background-color':
                            preferences?.navbar_button_secondary_color,
                    }"
                    >Manage website</Link
                >
                <Link
                    href="#"
                    class="hidden md:block rounded-md px-4 py-1.5"
                    :style="{
                        color: preferences?.navbar_button_primary_text_color,
                        'background-color':
                            preferences?.navbar_button_primary_color,
                    }"
                    >{{ preferences?.navbar_button_primary_text }}</Link
                >
                <a
                    href="#"
                    class="font-meduim hidden md:block rounded-md px-4 py-1.5"
                    :style="{
                        color: preferences?.navbar_button_secondary_text_color,
                        'background-color':
                            preferences?.navbar_button_secondary_color,
                    }"
                    >{{ preferences?.navbar_button_secondary_text }}
                </a>
                <button
                    :style="{
                        color: preferences?.navbar_button_secondary_text_color,
                    }"
                    class="flex md:hidden"
                    type="button"
                    data-drawer-target="right-nav"
                    data-drawer-show="right-nav"
                    data-drawer-placement="right"
                    aria-controls="right-nav"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="30"
                        height="30"
                        fill="currentColor"
                        class="bi bi-list"
                        viewBox="0 0 16 16"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"
                        />
                    </svg>
                </button>
            </div>
        </div>
    </nav>
    <div
        id="right-nav"
        class="fixed top-0 right-0 z-40 h-screen px-4 py-8 overflow-y-auto transition-transform translate-x-full w-80"
        :style="{
            'background-color': preferences?.navbar_color,
            color: preferences?.navbar_button_secondary_text_color,
        }"
        tabindex="-1"
        aria-labelledby="drawer-right-label"
    >
        <Link href="/" class="" v-if="establishment.logo_path">
            <img
                :src="establishment.logo_path"
                alt=""
                class="w-full h-14 object-cover"
            />
        </Link>
        <Link href="/" class="text-gray-700 font-semibold text-2xl" v-else>{{
            establishment.name
        }}</Link>
        <button
            type="button"
            data-drawer-hide="right-nav"
            aria-controls="right-nav"
            class="bg-transparent rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center"
        >
            <svg
                class="w-4 h-4"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 14 14"
            >
                <path
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"
                />
            </svg>
        </button>
        <p class="mb-6 text-sm">
            Schedule your appointment in the quickest and easiest way, relax and
            enjoy with us
        </p>
        <div class="my-4">
            <ul class="font-medium gap-3">
                <li>
                    <Link href="#about_us">About us</Link>
                </li>
                <li>
                    <Link href="#our_team">Our team</Link>
                </li>
            </ul>
        </div>
        <div class="">
            <div class="mb-2 w-full">
                <Link
                    v-if="user && user.position === 'Owner'"
                    href="#"
                    class="rounded-md px-4 py-1.5 w-full flex text-center justify-center"
                    :style="{
                        color: preferences?.navbar_button_secondary_text_color,
                        'background-color':
                            preferences?.navbar_button_secondary_color,
                    }"
                    >Manage website</Link
                >
            </div>
            <div class="w-full mb-2">
                <Link
                    href="#"
                    class="rounded-md px-4 py-1.5 flex text-center justify-center"
                    :style="{
                        color: preferences?.navbar_button_primary_text_color,
                        'background-color':
                            preferences?.navbar_button_primary_color,
                    }"
                    >{{ preferences?.navbar_button_primary_text }}</Link
                >
            </div>
            <div class="w-full grow">
                <a
                    href="#"
                    class="font-meduim rounded-md px-4 py-1.5 flex text-center justify-center"
                    :style="{
                        color: preferences?.navbar_button_secondary_text_color,
                        'background-color':
                            preferences?.navbar_button_secondary_color,
                    }"
                    >{{ preferences?.navbar_button_secondary_text }}
                </a>
            </div>
        </div>
    </div>
</template>
<script setup>
import { Link } from "@inertiajs/vue3";
import LinkPrimary from "../Utilities/LinkPrimary.vue";
import LinkSecondary from "../Utilities/LinkSecondary.vue";
import { ref, defineProps } from "vue";

defineProps({
    user: {
        type: Object,
        required: true,
    },
    establishment: {
        type: Object,
        required: true,
    },
    preferences: {
        type: Object,
        required: true,
    },
});
</script>
