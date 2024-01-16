<template>
    <div class="grid grid-cols-1 lg:grid-cols-2 h-screen w-full">
        <div
            class="flex items-center justify-center text-center p-4 md:p-12 overflow-y-scroll"
        >
            <div class="pt-16">
                <h1 class="font-semibold text-2xl">Sign Up</h1>
                <div id="socials" class="my-4">
                    <h3 class="text-gray-400 text-sm">With your socials</h3>
                    <section
                        id="social-buttons"
                        class="flex items-center justify-center mt-4 gap-2"
                    >
                        <SocialButton id="google"
                            ><svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="15"
                                height="15"
                                fill="currentColor"
                                class="bi bi-google"
                                viewBox="0 0 16 16"
                            >
                                <path
                                    d="M15.545 6.558a9.4 9.4 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.7 7.7 0 0 1 5.352 2.082l-2.284 2.284A4.35 4.35 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.8 4.8 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.7 3.7 0 0 0 1.599-2.431H8v-3.08z"
                                />
                            </svg>
                            With google</SocialButton
                        >
                        <SocialButton
                            ><svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="17"
                                height="17"
                                fill="currentColor"
                                class="bi bi-facebook"
                                viewBox="0 0 16 16"
                            >
                                <path
                                    d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"
                                />
                            </svg>
                            With facebook</SocialButton
                        >
                    </section>
                </div>
                <div class="">
                    <h3 class="text-gray-400 text-sm">Or with your email</h3>
                    <section class="mt-6">
                        <form
                            class="grid grid-cols-2 gap-3"
                            @submit.prevent="submit"
                        >
                            <div class="col-span-2">
                                <h1
                                    class="text-left font-medium mb-1.5 text-gray-700"
                                >
                                    Choose your business type
                                </h1>

                                <div
                                    class="flex items-center overflow-x-auto gap-2"
                                >
                                    <div
                                        class="flex items-center text-left text-sm"
                                        v-for="type in props.types"
                                        :key="type.id"
                                    >
                                        <input
                                            :id="'sender-radio-' + type.id"
                                            type="radio"
                                            :value="type.id"
                                            class="hidden peer"
                                            v-model="form.type_id"
                                            :checked="form.type_id === type.id"
                                            @input="updateType(type.id)"
                                        />
                                        <label
                                            :for="'sender-radio-' + type.id"
                                            class="inline-flex w-40 items-center justify-between p-3 text-sm text-gray-500 peer- bg-white border border-gray-200 border-dashed rounded-md cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-50 transition-all duration-300 ease-in-out"
                                        >
                                            <div class="block">
                                                <div
                                                    class="w-full text-normal font-medium mb-1"
                                                >
                                                    {{ type.name }}
                                                </div>
                                                <div
                                                    class="w-full line-clamp-3 font-light"
                                                >
                                                    <p>
                                                        {{ type.description }}
                                                    </p>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="w-full text-left col-span-2 md:col-span-1"
                            >
                                <Label for="business_name">Business name</Label>
                                <TextInput
                                    id="business_name"
                                    @input="passData(form.company)"
                                    :placeholder="
                                        form.errors.company
                                            ? form.errors.company
                                            : 'Blessed Barbershop'
                                    "
                                    :class="{
                                        'bg-red-50 border-2 border-red-500 text-red-900 placeholder:text-red-500 placeholder-red-700  focus:ring-red-500 focus:border-red-500':
                                            form.errors.company,
                                    }"
                                    v-model="form.company"
                                />
                            </div>
                            <div
                                class="w-full text-left col-span-2 md:col-span-1"
                            >
                                <Label for="domain" class="block">Domain</Label>
                                <div class="relative">
                                    <TextInput
                                        type="text"
                                        name="domain"
                                        disabled
                                        v-model="form.domain"
                                        :placeholder="
                                            form.errors.domain
                                                ? form.errors.domain
                                                : 'blessed-barbershop'
                                        "
                                        class="pointer-events-none bg-gray-50"
                                        :class="{
                                            'bg-red-50 border-2 border-red-500 text-red-900 placeholder:text-red-500 placeholder-red-700  focus:ring-red-500 focus:border-red-500':
                                                form.errors.domain,
                                        }"
                                        id="domain"
                                    />
                                    <div
                                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center"
                                    >
                                        <span
                                            class="text-gray-300 font-thin bg-gray-50 border-l py-2 mt-1 px-2 rounded-r-md mr-[0.1rem]"
                                            :class="{
                                                'bg-red-50 border border-red-500 text-red-500 placeholder:text-red-500 placeholder-red-700  focus:ring-red-500 focus:border-red-500':
                                                    form.errors.domain,
                                            }"
                                            >.projectr.test</span
                                        >
                                    </div>
                                </div>
                            </div>
                            <div class="w-full text-left">
                                <Label for="name">First name</Label>
                                <TextInput
                                    id="name"
                                    :placeholder="
                                        form.errors.name
                                            ? form.errors.name
                                            : 'Alexander'
                                    "
                                    :class="{
                                        'bg-red-50 border-2 border-red-500 text-red-900 placeholder:text-red-500 placeholder-red-700  focus:ring-red-500 focus:border-red-500':
                                            form.errors.name,
                                    }"
                                    v-model="form.name"
                                />
                            </div>
                            <div class="w-full text-left">
                                <Label for="last_name">Last name</Label>
                                <TextInput
                                    id="last_name"
                                    :placeholder="
                                        form.errors.surname
                                            ? form.errors.surname
                                            : 'Ghallagher'
                                    "
                                    :class="{
                                        'bg-red-50 border-2 border-red-500 text-red-900 placeholder:text-red-500 placeholder-red-700  focus:ring-red-500 focus:border-red-500':
                                            form.errors.surname,
                                    }"
                                    v-model="form.surname"
                                />
                            </div>
                            <div class="w-full col-span-2 text-left">
                                <Label for="email">Email</Label>
                                <TextInput
                                    id="email"
                                    :placeholder="
                                        form.errors.email
                                            ? form.errors.email
                                            : 'example@gmail.com'
                                    "
                                    :class="{
                                        'bg-red-50 border-2 border-red-500 text-red-900 placeholder:text-red-500 placeholder-red-700  focus:ring-red-500 focus:border-red-500':
                                            form.errors.email,
                                    }"
                                    v-model="form.email"
                                />
                            </div>
                            <div class="w-full col-span-2 text-left">
                                <Label for="password">Password</Label>
                                <div class="relative">
                                    <TextInput
                                        id="password"
                                        type="password"
                                        :placeholder="
                                            form.errors.password
                                                ? form.errors.password
                                                : '•••••••••••••••'
                                        "
                                        :class="{
                                            'bg-red-50 border-2 border-red-500 text-red-900 placeholder:text-red-500 placeholder-red-700  focus:ring-red-500 focus:border-red-500':
                                                form.errors.password,
                                        }"
                                        v-model="form.password"
                                        @input="updatePassword"
                                    />
                                    <div
                                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center"
                                    >
                                        <svg
                                            class="w-7 h-7 mr-3"
                                            viewBox="0 0 100 100"
                                        >
                                            <circle
                                                class="text-gray-200 stroke-current"
                                                stroke-width="15"
                                                cx="50"
                                                cy="50"
                                                r="40"
                                                fill="transparent"
                                            ></circle>
                                            <circle
                                                class="text-green-400 progress-ring__circle stroke-current"
                                                :class="{
                                                    'text-red-300':
                                                        passwordStrength < 50,
                                                    'text-yellow-300':
                                                        passwordStrength >=
                                                            50 &&
                                                        passwordStrength < 75,
                                                    'text-green-400':
                                                        passwordStrength >= 75,
                                                }"
                                                :style="{
                                                    strokeDashoffset: `calc(400 - (400 * ${passwordStrength}) / 100)`,
                                                }"
                                                stroke-width="15"
                                                stroke-linecap="round"
                                                cx="50"
                                                cy="50"
                                                r="40"
                                                fill="transparent"
                                            ></circle>
                                        </svg>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <p class="text-gray-400 font-thin text-sm">
                                        Use symbols, uppercase, numbers, letters
                                        and more than 8 characters
                                    </p>
                                </div>
                            </div>
                            <div class="w-full col-span-2 text-left">
                                <Label for="password_confirmation"
                                    >Repeat password</Label
                                >
                                <div class="relative">
                                    <TextInput
                                        id="password_confirmation"
                                        type="password"
                                        :placeholder="
                                            form.errors.password
                                                ? form.errors.password
                                                : '•••••••••••••••'
                                        "
                                        :class="{
                                            'bg-red-50 border-2 border-red-500 text-red-900 placeholder:text-red-500 placeholder-red-700  focus:ring-red-500 focus:border-red-500':
                                                form.errors.password,
                                        }"
                                        v-model="form.password_confirmation"
                                    />
                                    <div
                                        class="pointer-events-none text-gray-300 absolute inset-y-0 right-0 flex items-center"
                                        :class="{
                                            'text-green-400 duration-300 ease-in-out transition-all':
                                                form.password_confirmation ===
                                                    form.password &&
                                                form.password_confirmation
                                                    .length > 0,
                                            'text-red-300':
                                                form.errors.password,
                                        }"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="40"
                                            height="40"
                                            fill="currentColor"
                                            class="bi bi-check mr-1"
                                            viewBox="0 0 16 16"
                                        >
                                            <path
                                                d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z"
                                            />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full col-span-2 mt-3">
                                <Button class=""
                                    ><span v-if="!form.processing"
                                        >Get started for free</span
                                    >
                                    <span v-else>Loading...</span>
                                </Button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
        <div class="bg-blue-600 hidden lg:block"></div>
    </div>
</template>
<script setup>
import SocialButton from "../../Components/Utilities/SocialButton.vue";
import TextInput from "../../Components/Utilities/TextInput.vue";
import Label from "../../Components/Utilities/Label.vue";
import Button from "../../Components/Utilities/Button.vue";
import { useDomainFormatter } from "../../Composables/useFormatDomain";
import { useForm } from "@inertiajs/vue3";
import { computed, watch, ref } from "vue";

const passwordStrength = ref(0);

const props = defineProps({
    types: {
        type: Array,
        required: true,
    },
});

const form = useForm({
    name: "",
    surname: "",
    email: "",
    password: "",
    password_confirmation: "",
    type_id: 1,
    company: "",
    domain: "",
});

const updateType = (typeId) => {
    form.type_id = typeId;
};

const updatePassword = () => {
    const password = form.password;
    let strength = 0;

    if (password.length >= 8) {
        strength += 25;
    }
    if (/\d/.test(password)) {
        strength += 25;
    }
    if (/[A-Z]/.test(password)) {
        strength += 25;
    }
    if (/[!@#$%^&*(),.?":{}|<>]/.test(password)) {
        strength += 25;
    }
    passwordStrength.value = strength;
};

const passData = (company) => {
    let domain = company.trim().toLowerCase();
    domain = domain.replace(/^(https?:\/\/)?/i, "");
    domain = domain.replace(/\s+/g, "-");
    domain = domain.replace(/[^\w\d-]/g, "");

    form.domain = domain;
};

function submit() {
    form.post("/register");
}
</script>

<style scoped>
.progress-ring__circle {
    stroke-dasharray: 400, 400;
    transition: stroke-dashoffset 0.35s;
    transform: rotate(-90deg);
    transform-origin: 50% 50%;
}
</style>
