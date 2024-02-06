<template>
    <div class="lg:grid grid-cols-1 lg:grid-cols-2 h-screen w-full">
        <div
            class="flex lg:hidden bg-blue-600 text-center h-24 justify-center items-center"
        >
            <h1 class="text-white">Logo</h1>
        </div>
        <div
            class="flex items-center justify-center text-center p-4 md:p-12 overflow-y-scroll"
        >
            <div class="pt-6 md:pt-20">
                <h1 class="font-semibold text-2xl">Sign In</h1>
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
                            <span class="md:hidden">With Google</span>
                            <span class="hidden md:block"
                                >Sign in with Google</span
                            ></SocialButton
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
                            <span class="md:hidden">With Facebook</span>
                            <span class="hidden md:block"
                                >Sign in with Facebook</span
                            >
                        </SocialButton>
                    </section>
                </div>
                <div class="">
                    <h3 class="text-gray-400 text-sm">Or with your email</h3>
                    <section class="mt-6">
                        <form
                            class="grid grid-cols-2 gap-3"
                            @submit.prevent="submit"
                        >
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
                                />
                            </div>
                            <div
                                class="mt-1.5 text-sm flex flex-wrap text-blue-500"
                            >
                                <p>Forgot password?</p>
                            </div>
                            <div class="w-full col-span-2 mt-3">
                                <Button class=""
                                    ><span v-if="!form.processing"
                                        >Sign in</span
                                    >
                                    <span v-else>Loading...</span>
                                </Button>
                            </div>
                        </form>
                        <div>
                            <p class="mt-4 text-sm text-gray-400">
                                Do you want your own website?
                                <a
                                    :href="props.registerRoute"
                                    class="text-blue-500"
                                    >Sign up free</a
                                >
                            </p>
                        </div>
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
import { computed, watch, ref, onMounted } from "vue";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    registerRoute: {
        type: String,
        required: false,
    },
});

const form = useForm({
    email: "",
    password: "",
});

function submit() {
    form.post("/login");
}

onMounted(() => {
    console.log(props.registerRoute);
});
</script>
