<template>
    <div>
        <div class="min-h-full flex">
            <div
                class="flex-1 flex flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24"
            >
                <div class="mx-auto w-full max-w-sm lg:w-96">
                    <div>
                        <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
                            Create a new account
                        </h2>
                        <p class="mt-2 text-sm text-gray-600">
                            Or
                            <a
                                href="/login"
                                class="font-medium text-indigo-600 hover:text-indigo-500"
                            >
                                sign in to your existing account
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
                                        for="name"
                                        class="block text-sm font-medium text-gray-700"
                                    >
                                        Company Name
                                    </label>
                                    <div class="mt-1">
                                        <input
                                            id="company"
                                            name="company"
                                            v-model="form.company"
                                            type="name"
                                            autocomplete="company"
                                            required
                                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                        />
                                    </div>
                                </div>
                                <div class="space-y-1">
                                    <label
                                        for="price"
                                        class="block text-sm font-medium leading-6 text-gray-900"
                                        >Sub domain</label
                                    >
                                    <div
                                        class="relative mt-2 rounded-md shadow-sm"
                                    >
                                        <input
                                            type="text"
                                            name="domain"
                                            v-model="form.domain"
                                            id="domain"
                                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            aria-describedby="price-currency"
                                        />
                                        <div
                                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3"
                                        >
                                            <span
                                                class="text-gray-500 sm:text-sm"
                                                id="price-currency"
                                                >.projectr.test</span
                                            >
                                        </div>
                                    </div>
                                </div>

                                <div class="space-y-1">
                                    <label
                                        for="name"
                                        class="block text-sm font-medium text-gray-700"
                                    >
                                        Name
                                    </label>
                                    <div class="mt-1">
                                        <input
                                            id="name"
                                            name="name"
                                            type="name"
                                            v-model="form.name"
                                            autocomplete="name"
                                            required
                                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                        />
                                    </div>
                                </div>
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

                                <div class="space-y-1">
                                    <label
                                        for="password_confirmation"
                                        class="block text-sm font-medium text-gray-700"
                                    >
                                        Confirmation
                                    </label>
                                    <div class="mt-1">
                                        <input
                                            id="password_confirmation"
                                            name="password_confirmation"
                                            v-model="form.password_confirmation"
                                            type="password"
                                            autocomplete="current-password"
                                            required
                                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                        />
                                    </div>
                                </div>

                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <input
                                            id="remember-me"
                                            name="remember-me"
                                            type="checkbox"
                                            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                                        />
                                        <label
                                            for="remember-me"
                                            class="ml-2 block text-sm text-gray-900"
                                        >
                                            Remember me
                                        </label>
                                    </div>

                                    <div class="text-sm">
                                        <a
                                            href="#"
                                            class="font-medium text-indigo-600 hover:text-indigo-500"
                                        >
                                            Forgot your password?
                                        </a>
                                    </div>
                                </div>

                                <div>
                                    <button
                                        type="submit"
                                        class="w-full flex justify-center py-4 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                    >
                                        Register
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
    company: "",
    domain: "",
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
});

function submit() {
    form.post("/register");
}
</script>
