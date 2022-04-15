<template>
    <section class="mt-6">
        <Head title="Users" />
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-xl font-semibold text-gray-900">Users</h1>
                    <p class="mt-2 text-sm text-gray-700">
                        A list of all the users in your account including their
                        name, title, email and role.
                    </p>
                </div>

                <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex">
                    <Link
                        href="users/create"
                        as="button"
                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-teal-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 sm:w-auto"
                    >
                        Add user
                    </Link>
                </div>
            </div>

            <div class="mt-8 flex flex-col">
                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div
                        class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8"
                    >
                        <div class="w-1/4 mt-2 ml-auto">
                            <div class="mt-1 relative flex items-center">
                                <input
                                    v-model="search"
                                    type="text"
                                    name="search"
                                    id="search"
                                    class="shadow-sm focus:ring-teal-500 focus:border-teal-500 block w-full bg-gray-100 pr-12 sm:text-sm border-gray-300 rounded-md"
                                />
                                <div
                                    class="absolute inset-y-0 right-0 flex py-1.5 pr-1.5"
                                >
                                    <kbd
                                        class="inline-flex items-center border border-gray-200 rounded px-2 text-sm font-sans font-medium text-gray-400"
                                    >
                                        ⌘K
                                    </kbd>
                                </div>
                            </div>
                        </div>
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead>
                                <tr>
                                    <th
                                        scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6 md:pl-0"
                                    >
                                        Name
                                    </th>
                                    <th
                                        scope="col"
                                        class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900"
                                    >
                                        Title
                                    </th>
                                    <th
                                        scope="col"
                                        class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900"
                                    >
                                        Email
                                    </th>
                                    <th
                                        scope="col"
                                        class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900"
                                    >
                                        Role
                                    </th>
                                    <th
                                        scope="col"
                                        class="relative py-3.5 pl-3 pr-4 sm:pr-6 md:pr-0"
                                    >
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <tr v-for="user in users.data" :key="user.name">
                                    <td
                                        class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 md:pl-0"
                                    >
                                        {{ user.name }}
                                    </td>
                                    <td
                                        class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"
                                    >
                                        {{ user.email }}
                                    </td>
                                    <td
                                        class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"
                                    >
                                        {{ user.email }}
                                    </td>
                                    <td
                                        class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"
                                    >
                                        {{ user.token }}
                                    </td>
                                    <td
                                        class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 md:pr-0"
                                    >
                                        <Link
                                            v-if="user.can.edit"
                                            :href="`/users/${user.id}/edit`"
                                            class="text-teal-600 hover:text-teal-900"
                                            >Edit<span class="sr-only"
                                                >, {{ user.name }}</span
                                            >
                                        </Link>
                                    </td>
                                </tr>

                                <!-- More people... -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <Pagination :links="users.links" class="justify-end" />
        </div>
    </section>
</template>

<script setup>
import { ref, watch } from "vue";
import { Inertia } from "@inertiajs/inertia";
import debounce from "lodash/debounce";
import Pagination from "@/Shared/Pagination.vue";

const props = defineProps({
    users: Object,
    filters: Object,
});

let search = ref(props.filters.search);

watch(
    search,
    debounce(function (value) {
        Inertia.get(
            "/users",
            { search: value },
            { preserveState: true, replace: true }
        );
    }, 500)
);
</script>

<style></style>
