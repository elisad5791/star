<script setup>
import {Head, Link, useForm} from "@inertiajs/vue3";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import Multiselect from "vue-multiselect";

let props = defineProps({
    categories: {type: Array},
    tags: {type: Array},
    picture: {type: Object}
});

defineOptions({
    layout: AdminLayout
});

let form = useForm({
    _method: 'patch',
    title: props.picture.title,
    image: null,
    category_id: props.picture.category_id,
    tags: props.picture.tags
});

let options = props.tags;

function submit() {
    form.post(route('admin.pictures.update', props.picture.id), {headers: {'Content-Type': 'multipart/form-data'}});
}

function setImage(e) {
    form.image = e.target.files[0];
}
</script>

<template>
    <Head title="Edit Picture"/>

    <form @submit.prevent="submit" class="w-1/2 mx-auto my-5">
        <div class="mb-5">
            <Link :href="route('admin.pictures.index')" class="font-bold text-gray-900">
                &larr; Back
            </Link>
        </div>

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-2xl font-bold tracking-tight text-gray-900">
                    Edit Picture
                </h2>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="title" class="block text-sm font-medium leading-6 text-gray-900">
                            Title
                        </label>
                        <div class="mt-2">
                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2
                                focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" name="title" id="title" v-model="form.title"
                                       class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900
                                       placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="title" class="block text-sm font-medium leading-6 text-gray-900">
                            Image
                        </label>
                        <div class="mt-2">
                            <img :src="props.picture.img_url" :alt="props.picture.title" width="200">
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Replace image
                        </label>
                        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg
                            cursor-pointer focus:outline-none" id="image" type="file" @change="setImage">
                    </div>

                    <div class="sm:col-span-3">
                        <label for="category_id" class="block text-sm font-medium leading-6 text-gray-900">
                            Category
                        </label>
                        <div class="mt-2">
                            <select id="category_id" name="category_id" v-model="form.category_id"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1
                                    ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600
                                    sm:max-w-xs sm:text-sm sm:leading-6">
                                <option v-for="category in categories" :value="category.id" :key="category.id">
                                    {{ category.title }}
                                </option>">
                            </select>
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label for="tags" class="block text-sm font-medium leading-6 text-gray-900">
                            Tags
                        </label>
                        <div class="mt-2">
                            <multiselect v-model="form.tags" label="title" track-by="id" :options="options"
                                         :multiple="true" id="tags">
                            </multiselect>
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

<style src="node_modules/vue-multiselect/dist/vue-multiselect.css"></style>
<style scoped>

</style>
