<template>
    <div>
        <div class="min-h-full flex">
            <div
                class="flex-1 flex flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24"
            >
                <div class="mx-auto w-full max-w-sm lg:w-96">
                    <div>
                        <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
                            Login
                        </h2>
                        <p class="mt-2 text-sm text-gray-600">
                            Or
                            <a
                                href="/register"
                                class="font-medium text-indigo-600 hover:text-indigo-500"
                            >
                                Create account
                            </a>
                        </p>
                    </div>

                    <div class="mt-8">
                        <div class="mt-6">
                            <form
                                action="#"
                                method="POST"
                                @submit.prevent="submit"
                                class="space-y-6"
                            >
                                <div class="space-y-1">
                                    <label
                                        for="email"
                                        class="block text-sm font-medium text-gray-700"
                                    >
                                        Email address
                                    </label>
                                    <div class="mt-1">
                                        <input
                                            id="email"
                                            name="email"
                                            v-model="form.email"
                                            type="email"
                                            autocomplete="email"
                                            required
                                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                        />
                                    </div>
                                </div>

                                <div class="space-y-1">
                                    <label
                                        for="password"
                                        class="block text-sm font-medium text-gray-700"
                                    >
                                        Password
                                    </label>
                                    <div class="mt-1">
                                        <input
                                            id="password"
                                            name="password"
                                            v-model="form.password"
                                            type="password"
                                            autocomplete="current-password"
                                            required
                                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                        />
                                    </div>
                                </div>

                                <div>
                                    <button
                                        type="submit"
                                        class="w-full flex justify-center py-4 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                    >
                                        login
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    email: "",
    password: "",
});

function submit() {
    form.post("/login");
}
</script>
