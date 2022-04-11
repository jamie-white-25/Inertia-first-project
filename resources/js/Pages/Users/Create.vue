<template>
    <section>
        <Head title="Create a user" />
        <h1>Hi, world</h1>

        <form
            @submit.prevent="submit"
            class="space-y-8 divide-y divide-gray-200"
        >
            <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
                    <div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Personal Information
                        </h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">
                            Use a permanent address where you can receive mail.
                        </p>
                    </div>
                    <div class="space-y-6 sm:space-y-5">
                        <div
                            class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
                        >
                            <label
                                for="name"
                                class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"
                            >
                                Name
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <input
                                    v-model="form.name"
                                    type="text"
                                    name="name"
                                    id="name"
                                    autocomplete="name"
                                    class="block max-w-lg w-full shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm border-gray-300 rounded-md"
                                />
                                <p
                                    class="text-red-500 text-sm"
                                    v-if="form.errors.name"
                                >
                                    {{ form.errors.name }}
                                </p>
                            </div>
                        </div>

                        <div
                            class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
                        >
                            <label
                                for="email"
                                class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"
                            >
                                Email address
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <input
                                    v-model="form.email"
                                    id="email"
                                    name="email"
                                    type="email"
                                    autocomplete="email"
                                    class="block max-w-lg w-full shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm border-gray-300 rounded-md"
                                />
                                <p
                                    class="text-red-500 text-sm"
                                    v-if="form.errors.email"
                                >
                                    {{ form.errors.email }}
                                </p>
                            </div>
                        </div>

                        <div
                            class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
                        >
                            <label
                                for="email"
                                class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"
                            >
                                Password
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <input
                                    v-model="form.password"
                                    id="password"
                                    name="password"
                                    type="password"
                                    autocomplete="no-password"
                                    class="block max-w-lg w-full shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm border-gray-300 rounded-md"
                                />
                                <p
                                    class="text-red-500 text-sm"
                                    v-if="form.errors.password"
                                >
                                    {{ form.errors.password }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pt-5">
                <div class="flex justify-end">
                    <button
                        type="button"
                        class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500"
                    >
                        Cancel
                    </button>
                    <button
                        type="submit"
                        :disabled="form.processing"
                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500"
                    >
                        Save
                    </button>
                </div>
            </div>
        </form>
    </section>
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

let form = useForm({
    name: "",
    email: "",
    password: "",
});

let submit = async () => {
    form.post("/users");
};
</script>

<style></style>
