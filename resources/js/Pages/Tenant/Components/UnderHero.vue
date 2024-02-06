<template>
    <section
        v-if="preferences?.show_under_hero"
        class="w-full h-20 text-center md:flex items-center justify-between"
        :style="{
            color: preferences?.under_hero_text_color,
            'background-color': preferences?.under_hero_background_color,
        }"
    >
        <div class="mx-4 md:mx-8 flex justify-center">
            <div class="flex items-center gap-1">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    :width="preferences?.under_hero_icons_size"
                    :height="preferences?.under_hero_icons_size"
                    fill="currentColor"
                    class="bi bi-telephone-fill"
                    viewBox="0 0 16 16"
                >
                    <path
                        fill-rule="evenodd"
                        d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"
                    />
                </svg>
                <span>{{ preferences?.under_hero_phone_number_text }}</span>
            </div>
        </div>
        <div class="mx-4 md:mx-8 flex justify-center">
            <div class="flex items-center gap-1">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    :width="preferences?.under_hero_icons_size"
                    :height="preferences?.under_hero_icons_size"
                    fill="currentColor"
                    class="bi bi-geo-alt-fill"
                    viewBox="0 0 16 16"
                >
                    <path
                        d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"
                    />
                </svg>
                <span>{{ preferences?.under_hero_address_text }}</span>
            </div>
        </div>
        <div class="mx-4 md:mx-8 flex justify-center">
            <div class="flex items-center gap-1">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    :width="preferences?.under_hero_icons_size"
                    :height="preferences?.under_hero_icons_size"
                    fill="currentColor"
                    class="bi bi-clock-fill"
                    viewBox="0 0 16 16"
                >
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z"
                    />
                </svg>
                <span>{{ preferences?.under_hero_schedule_hours_text }}</span>
            </div>
        </div>
    </section>
</template>
<script setup>
defineProps({
    preferences: {
        type: Object,
        required: true,
    },
});
</script>
