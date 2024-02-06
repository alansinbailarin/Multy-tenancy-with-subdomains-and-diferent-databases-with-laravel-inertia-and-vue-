<template>
    <section v-if="preferences?.show_about_us" class="md:mx-8 mx-4 mt-10">
        <div class="text-center">
            <h1
                class="text-3xl md:text-5xl font-semibold mb-10"
                :style="{
                    color: preferences?.about_us_heading_text_color,
                }"
            >
                {{ preferences?.about_us_heading_text }}
            </h1>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2">
            <div>
                <picture>
                    <img
                        v-if="!preferences?.about_us_image_path"
                        src="../../../../../public/img/noimage.png"
                        alt=""
                        class="mx-auto object-cover rounded-md"
                    />
                    <img
                        v-else
                        :src="preferences?.about_us_image_path"
                        alt=""
                        class="mx-auto object-cover rounded-md"
                    />
                </picture>
            </div>
            <div>
                <p
                    class="text-lg mt-3"
                    :style="{
                        color: preferences?.about_us_text_color,
                    }"
                >
                    {{ preferences?.about_us_text }}
                </p>
                <div class="mt-2">
                    <h1 class="font-medium text-lg">
                        {{ preferences?.about_us_text_extra_one_title }}
                    </h1>
                    <p>{{ preferences?.about_us_text_extra_one }}</p>
                </div>
                <div class="mt-2">
                    <h1 class="font-medium text-lg">
                        {{ preferences?.about_us_text_extra_two_title }}
                    </h1>
                    <p>{{ preferences?.about_us_text_extra_two }}</p>
                </div>
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
