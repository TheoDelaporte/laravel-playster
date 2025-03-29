<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import PlaceholderPattern from '../../components/PlaceholderPattern.vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Musiques',
        href: '/songs',
    },
];
</script>

<template>

    <Head title="Musiques" />
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="max-w-7xl mx-auto p-6">
            <h1 class="text-4xl font-bold text-center text-gray-800 mb-8">Liste des Chansons</h1>
            <!-- Liste des chansons -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div v-for="song in songs" :key="song.id"
                    class="bg-white shadow-lg rounded-lg overflow-hidden transform transition-all hover:scale-105 hover:shadow-2xl">
                    <img :src="song.cover_image || 'https://via.placeholder.com/150'" alt="Cover image"
                        class="w-full h-48 object-cover" />
                    <div class="p-4">
                        <h2 class="text-xl font-semibold text-gray-900">{{ song.title }}</h2>
                        <p class="text-gray-700 mt-2">{{ song.artist }}</p>
                        <p class="text-sm text-gray-500 mt-1">{{ song.album }}</p>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script lang="ts">
export default {
    props: {
        songs: Array,
    },
};
</script>