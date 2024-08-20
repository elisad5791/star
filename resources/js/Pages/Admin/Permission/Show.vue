<script setup>
import {Head, Link} from "@inertiajs/vue3";
import AdminLayout from "@/Layouts/AdminLayout.vue";

defineProps({
    permission: {type: Object}
});

defineOptions({
    layout: AdminLayout
});

</script>

<template>
    <Head title="Show Permission"/>

    <div class="w-1/2 mx-auto">
        <div class="mb-5">
            <Link :href="route('admin.permissions.index')" class="font-bold text-gray-900">
                &larr; Back
            </Link>
        </div>

        <div class="px-4 sm:px-0">
            <h3 class="text-2xl font-semibold leading-7 text-gray-900">{{ permission.title }}</h3>
        </div>

        <div class="mt-6 border-t border-gray-100">
            <dl class="divide-y divide-gray-100">
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Created At</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                        {{ permission.created_at }}
                    </dd>
                </div>
            </dl>
        </div>
    </div>
</template>

<style scoped>

</style>
