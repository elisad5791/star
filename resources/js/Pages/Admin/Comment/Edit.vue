<script setup>
import {Head, Link, useForm} from "@inertiajs/vue3";
import AdminLayout from "@/Layouts/AdminLayout.vue";

let props = defineProps({
    comment: {type: Object}
});

defineOptions({
    layout: AdminLayout
});

let form = useForm({
    content: props.comment.content
});

function submit() {
    form.patch(route('admin.comments.update', props.comment.id));
}
</script>

<template>
    <Head title="Edit Comment"/>

    <form @submit.prevent="submit" class="w-1/2 mx-auto my-5">
        <div class="mb-5">
            <Link :href="route('admin.comments.index')" class="font-bold text-gray-900">
                &larr; Back
            </Link>
        </div>

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-2xl font-bold tracking-tight text-gray-900">
                    Edit Comment
                </h2>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="col-span-full">
                        <label for="content" class="block text-sm font-medium leading-6 text-gray-900">
                            Content
                        </label>
                        <div class="mt-2">
                            <textarea id="content" name="content" rows="3" v-model="form.content"
                                  class="block w-full rounded-md border-0
                                  text-gray-900 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300
                                  placeholder:text-gray-400 focus:ring-2 focus:ring-inset
                                  focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
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
