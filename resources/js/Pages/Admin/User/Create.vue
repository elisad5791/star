<script setup>
import {Head, Link, useForm} from "@inertiajs/vue3";
import AdminLayout from "@/Layouts/AdminLayout.vue";

defineOptions({
    layout: AdminLayout
});

let form = useForm({
    name: '',
    email: '',
    password: ''
});

function submit() {
    form.post(route('admin.users.store'));
}
</script>

<template>
    <Head title="Create User"/>

    <form @submit.prevent="submit" class="w-1/2 mx-auto my-5">
        <div class="mb-5">
            <Link :href="route('admin.users.index')" class="font-bold text-gray-900">
                &larr; Back
            </Link>
        </div>

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-2xl font-bold tracking-tight text-gray-900">
                    Add New User
                </h2>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">
                            Name
                        </label>
                        <div class="mt-2">
                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2
                                focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" name="name" id="name" v-model="form.name"
                                       class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900
                                       placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">
                            Email
                        </label>
                        <div class="mt-2">
                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2
                                focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="email" name="email" id="email" v-model="form.email"
                                       class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900
                                       placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">
                            Password
                        </label>
                        <div class="mt-2">
                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2
                                focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="password" name="password" id="password" v-model="form.password"
                                       class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900
                                       placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white
                shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2
                focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Save
            </button>
        </div>
    </form>
</template>

<style scoped>

</style>
