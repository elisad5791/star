<script setup>
import {Head, Link, router} from "@inertiajs/vue3";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { EyeIcon } from '@heroicons/vue/24/solid';
import { PencilIcon } from '@heroicons/vue/24/solid';
import { TrashIcon } from '@heroicons/vue/24/solid';

defineProps({
    pictures: {type: Array}
});

defineOptions({
    layout: AdminLayout
});

function deletePicture(id) {
    if (confirm('Are you sure you want to delete this picture?')) {
        router.delete(route('admin.pictures.destroy', id));
    }
}
</script>

<template>
    <Head title="Pictures"/>

    <div class="bg-white pt-12 pb-24">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto lg:mx-0 flex justify-between">
                <h2 class="text-2xl font-bold tracking-tight text-gray-900">
                    Pictures
                </h2>
                <div>
                    <Link :href="route('admin.pictures.create')"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white
                        shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2
                        focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Add New Picture
                    </Link>
                </div>
            </div>

            <div class="mt-10">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3"></th>
                                <th scope="col" class="px-6 py-3">
                                    Title
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Image
                                </th>
                                <th scope="col" class="px-6 py-3"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50"
                                v-for="picture,i in pictures" :key="picture.id">
                                <td class="px-6 py-4">
                                    {{ i + 1 }}
                                </td>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ picture.title }}
                                </th>
                                <td class="px-6 py-4">
                                    <img :src="picture.img_url" alt="" width="60">
                                </td>
                                <td class="px-6 py-4 flex gap-4">
                                    <Link :href="route('admin.pictures.show', picture.id)">
                                        <EyeIcon class="size-5 text-gray-500" />
                                    </Link>
                                    <Link :href="route('admin.pictures.edit', picture.id)">
                                        <PencilIcon class="size-5 text-gray-500" />
                                    </Link>
                                    <button type="button" @click="deletePicture(picture.id)">
                                        <TrashIcon class="size-5 text-red-500" />
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
