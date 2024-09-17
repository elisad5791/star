<script setup>
import {Head, Link, router, useForm} from "@inertiajs/vue3";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import {EyeIcon} from '@heroicons/vue/24/solid';
import {PencilIcon} from '@heroicons/vue/24/solid';
import {TrashIcon} from '@heroicons/vue/24/solid';
import {onMounted} from 'vue';

let props = defineProps({
    posts: Object,
    search: Object
});

defineOptions({
    layout: AdminLayout
});

let filterForm = useForm({
    'title': props.search?.title ?? '',
    'profile_name': props.search?.profile_name ?? '',
    'category_title': props.search?.category_title ?? '',
    'created_at_from': props.search?.created_at_from ?? '',
    'created_at_to': props.search?.created_at_to ?? '',
    'element': ''
});

onMounted(() => {
    if (props.search.element) {
        let selector = `[data-element="${props.search.element}"]`;
        document.querySelector(selector).focus();
    }
});

function deletePost(id) {
    if (confirm('Are you sure you want to delete this post?')) {
        router.delete(route('admin.posts.destroy', id));
    }
}

function sendFilter(e) {
    filterForm.element = e.target.dataset.element;
    filterForm.get(route('admin.posts.index'));
}
</script>

<template>
    <Head title="Posts"/>

    <div class="bg-white pt-12 pb-24">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto lg:mx-0 flex justify-between">
                <h2 class="text-2xl font-bold tracking-tight text-gray-900">
                    Posts
                </h2>
                <div>
                    <Link :href="route('admin.posts.create')"
                          class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white
                        shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2
                        focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Add New Post
                    </Link>
                </div>
            </div>

            <hr class="bg-gray-300 mt-4">

            <div class="mt-6">
                <form>
                    <div class="flex gap-1 justify-between">
                        <div class="flex gap-2">
                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2
                                focus-within:ring-inset focus-within:ring-indigo-600">
                                <input type="text" placeholder="title" v-model="filterForm.title"
                                    class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900
                                    placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    @input="sendFilter" data-element="title">
                            </div>

                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2
                                focus-within:ring-inset focus-within:ring-indigo-600">
                                <input type="text" placeholder="author" v-model="filterForm.profile_name"
                                    class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900
                                    placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    @input="sendFilter" data-element="author">
                            </div>

                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2
                                focus-within:ring-inset focus-within:ring-indigo-600">
                                <input type="text" placeholder="category" v-model="filterForm.category_title"
                                    class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900
                                    placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    @input="sendFilter" data-element="category">
                            </div>

                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2
                                focus-within:ring-inset focus-within:ring-indigo-600">
                                <span class="flex select-none items-center pl-3 text-gray-400 sm:text-sm">
                                    created from
                                </span>
                                <input type="date" placeholder="created from" v-model="filterForm.created_at_from"
                                    class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900
                                    placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    @input="sendFilter" data-element="created_from">
                            </div>

                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2
                                focus-within:ring-inset focus-within:ring-indigo-600">
                                <span class="flex select-none items-center pl-3 text-gray-400 sm:text-sm">
                                    created to
                                </span>
                                <input type="date" placeholder="created to" v-model="filterForm.created_at_to"
                                    class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900
                                    placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    @input="sendFilter" data-element="created_to">
                            </div>
                        </div>

                        <div class="flex gap-2">
                            <Link :href="route('admin.posts.index')"
                                class="rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white
                                shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2
                                focus-visible:outline-offset-2 focus-visible:outline-green-600">
                                Reset
                            </Link>
                        </div>
                    </div>
                </form>
            </div>

            <div class="mt-2">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3"></th>
                            <th scope="col" class="px-6 py-3">
                                Title
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Author
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Category
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Created At
                            </th>
                            <th scope="col" class="px-6 py-3"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50"
                            v-for="post in posts.data" :key="post.id">
                            <td class="px-6 py-4">
                                {{ post.id }}
                            </td>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ post.title }}
                            </th>
                            <td class="px-6 py-4">
                                {{ post.profile_name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ post.category_title }}
                            </td>
                            <td class="px-6 py-4">
                                {{ post.created_at }}
                            </td>
                            <td class="px-6 py-4 flex gap-4">
                                <Link :href="route('admin.posts.show', post.id)">
                                    <EyeIcon class="size-5 text-gray-500"/>
                                </Link>
                                <Link :href="route('admin.posts.edit', post.id)">
                                    <PencilIcon class="size-5 text-gray-500"/>
                                </Link>
                                <button type="button" @click="deletePost(post.id)">
                                    <TrashIcon class="size-5 text-red-500"/>
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="mt-4 flex justify-center">
                    <Link v-for="link in posts.meta.links" key="link.label" :href="link.url ?? ''" v-html="link.label"
                        class="py-1 px-2 me-2 border border-gray-200 rounded hover:bg-gray-100 text-sm"
                        :class="link.active ? 'bg-gray-100' : ''"   >
                    </Link>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
