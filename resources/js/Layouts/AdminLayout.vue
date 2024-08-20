<script setup>
import { Link, router } from '@inertiajs/vue3';
import { DocumentIcon } from '@heroicons/vue/24/solid';
import { PhotoIcon } from '@heroicons/vue/24/solid';
import { VideoCameraIcon } from '@heroicons/vue/24/solid';
import { FolderIcon } from '@heroicons/vue/24/solid';
import { TagIcon } from '@heroicons/vue/24/solid';
import { ChatBubbleLeftIcon } from '@heroicons/vue/24/solid';
import { UserIcon } from '@heroicons/vue/24/solid';
import { UserPlusIcon } from '@heroicons/vue/24/solid';
import { UserCircleIcon } from '@heroicons/vue/24/solid';
import { UserGroupIcon } from '@heroicons/vue/24/solid';
import { LockOpenIcon } from '@heroicons/vue/24/solid';

function logout() {
    router.post(route('logout'));
}
</script>

<template>
    <div class="grid grid-cols-5 h-full">
        <div class="bg-indigo-800 text-white h-full flex flex-col p-10 gap-4">
            <Link :href="route('admin.posts.index')" class="flex hover:text-indigo-200">
                <DocumentIcon class="size-5 me-2"/> Posts
            </Link>
            <Link :href="route('admin.pictures.index')" class="flex hover:text-indigo-200">
                <PhotoIcon class="size-5 me-2"/> Pictures
            </Link>
            <Link :href="route('admin.videos.index')" class="flex hover:text-indigo-200">
                <VideoCameraIcon class="size-5 me-2"/> Videos
            </Link>
            <hr>
            <Link :href="route('admin.categories.index')" class="flex hover:text-indigo-200">
                <FolderIcon class="size-5 me-2"/> Categories
            </Link>
            <Link :href="route('admin.tags.index')" class="flex hover:text-indigo-200">
                <TagIcon class="size-5 me-2"/> Tags
            </Link>
            <hr>
            <Link :href="route('admin.comments.index')" class="flex hover:text-indigo-200">
                <ChatBubbleLeftIcon class="size-5 me-2"/> Comments
            </Link>
            <hr>
            <Link :href="route('admin.users.index')" class="flex hover:text-indigo-200">
                <UserIcon class="size-5 me-2"/> Users
            </Link>
            <Link :href="route('admin.authors.index')" class="flex hover:text-indigo-200">
                <UserPlusIcon class="size-5 me-2"/> Authors
            </Link>
            <Link :href="route('admin.profiles.index')" class="flex hover:text-indigo-200">
                <UserCircleIcon class="size-5 me-2"/> Profiles
            </Link>
            <hr>
            <Link :href="route('admin.roles.index')" class="flex hover:text-indigo-200">
                <UserGroupIcon class="size-5 me-2"/> Roles
            </Link>
            <Link :href="route('admin.permissions.index')" class="flex hover:text-indigo-200">
                <LockOpenIcon class="size-5 me-2"/> Permissions
            </Link>
        </div>

        <div class="col-span-4">
            <header>
                <nav class="flex items-center justify-between p-6 lg:px-8">
                    <div class="flex flex-1">
                        <Link :href="route('profile')" class="m-1.5 p-1.5">
                            <span class="text-sm font-semibold leading-6 text-gray-900 hover:text-gray-600">
                                Blog
                            </span>
                        </Link>
                    </div>
                    <div class="flex gap-x-12">
                        <h1 class="text-4xl font-bold tracking-tight">Admin panel</h1>
                    </div>
                    <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                        <button type="button" @click="logout"
                            class="text-sm font-semibold leading-6 text-gray-900 hover:text-gray-600">
                            Log out &rarr;
                        </button>
                    </div>
                </nav>
            </header>

            <slot />
        </div>
    </div>
</template>
