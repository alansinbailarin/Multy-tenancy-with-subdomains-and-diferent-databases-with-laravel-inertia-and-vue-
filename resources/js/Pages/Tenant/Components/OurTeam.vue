<template>
    <section v-if="preferences?.show_team" class="md:mx-8 mx-4 mt-10">
        <div class="text-center">
            <h1
                class="text-3xl md:text-5xl font-semibold mb-10"
                :style="{
                    color: preferences?.our_team_heading_text_color,
                }"
            >
                {{ preferences?.our_team_heading_text }}
            </h1>
        </div>
        <div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div
                    v-for="member in team"
                    :key="member.id"
                    class="items-center"
                >
                    <picture>
                        <img
                            v-if="!member.image_path"
                            src="../../../../../public/img/noimage.png"
                            alt=""
                            class="mx-auto object-cover rounded-md w-96 h-96"
                        />
                        <img
                            v-else
                            :src="member.image_path"
                            alt=""
                            class="mx-auto object-cover rounded-md w-96 h-96"
                        />
                    </picture>
                    <h1
                        class="text-xl text-left font-semibold mt-2"
                        :style="{
                            color: preferences?.our_team_name_text_color,
                        }"
                    >
                        {{ member.name }} {{ member.surname }}
                    </h1>
                    <p
                        class="font-medium"
                        :style="{
                            color: preferences?.our_team_position_text_color,
                        }"
                    >
                        {{ member.position }}
                    </p>
                    <p
                        class="font-light text-sm mt-2"
                        :style="{
                            color: preferences?.our_team_description_text_color,
                        }"
                    >
                        {{ member.description }}
                    </p>
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
    team: {
        type: Array,
        required: true,
    },
});
</script>
