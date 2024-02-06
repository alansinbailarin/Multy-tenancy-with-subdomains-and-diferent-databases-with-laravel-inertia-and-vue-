<template>
    <div
        class="h-full my-[4.1rem] mb-24 md:mb-[4.1rem]"
        :style="{
            'background-color': preferences?.background_color,
        }"
    >
        <div
            class="w-full bg-gray-100 flex justify-center items-center h-[29rem] text-center"
        >
            <div class="absolute">
                <picture>
                    <img
                        src="../../../../public/img/noimage.png"
                        alt=""
                        class="mx-auto w-screen h-[29rem] object-cover"
                    />
                </picture>
            </div>
            <div class="relative mx-2">
                <h1 class="text-3xl md:text-6xl font-semibold text-gray-800">
                    {{ preferences?.hero_heading_text }}
                </h1>
                <p class="text-gray-600 text-lg md:text-2xl mt-3">
                    {{ preferences?.hero_paragraph_text }}
                </p>
                <div class="flex items-center justify-center mt-8 gap-2">
                    <Link
                        href="#"
                        class="rounded-md px-4 py-1.5"
                        :style="{
                            color: preferences?.hero_button_primary_text_color,
                            'background-color':
                                preferences?.hero_button_primary_color,
                        }"
                        >{{ preferences?.hero_button_primary_text }}</Link
                    >
                    <a
                        href="#"
                        :style="{
                            color: preferences?.hero_button_secondary_text_color,
                            'background-color':
                                preferences?.hero_button_secondary_color,
                        }"
                        class="rounded-md px-4 py-1.5"
                        >{{ preferences?.hero_button_secondary_text }}</a
                    >
                </div>
            </div>
        </div>
        <UnderHero :preferences="preferences" />
        <AboutUs id="about_us" :preferences="preferences" />
        <OurTeam id="our_team" :preferences="preferences" :team="team" />
    </div>
</template>
<script setup>
import LinkPrimary from "../../Components/Utilities/LinkPrimary.vue";
import LinkSecondary from "../../Components/Utilities/LinkSecondary.vue";
import { Link } from "@inertiajs/vue3";
import UnderHero from "./Components/UnderHero.vue";
import AboutUs from "./Components/AboutUs.vue";
import OurTeam from "./Components/OurTeam.vue";

const props = defineProps({
    establishment: {
        type: Object,
        required: true,
    },
    preferences: {
        type: Object,
        required: true,
    },
    team: {
        type: Array,
        required: true,
    },
});
</script>

<script>
import TenantLayout from "@/Layouts/TenantLayout.vue";
export default {
    layout: TenantLayout,
};
</script>
