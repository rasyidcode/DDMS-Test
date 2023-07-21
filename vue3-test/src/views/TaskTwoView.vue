<script setup>
import { ref } from 'vue';
import { useNews } from '../composables/news'
import MySelect from '../components/MySelect.vue'

const country = ref(null)
const category = ref(null)

const { news, error, loading } = useNews({ country: country, category: category })

</script>

<template>
    <div class="p-5">
        <h1 class="text-3xl font-semibold mb-2">News List</h1>

        <div class="py-5 flex flex-row justify-end">
            <MySelect v-model="country" :options="[
                { text: 'Indonesia', value: 'id' },
                { text: 'United State', value: 'us' },
                { text: 'Singapore', value: 'sg' },
                { text: 'China', value: 'cn' },
                { text: 'Rusia', value: 'ru' }
            ]" :label-text="'-- Choose Country --'" />

            <MySelect v-model="category" :options="[
                { text: 'Business', value: 'business' },
                { text: 'Entertainment', value: 'entertainment' },
                { text: 'General', value: 'general' },
                { text: 'Health', value: 'health' },
                { text: 'Science', value: 'science' },
                { text: 'Sports', value: 'sports' },
                { text: 'Technology', value: 'technology' },
            ]" :label-text="'-- Choose Category --'" />
        </div>

        <div v-if="loading">Loading...</div>
        <div v-else-if="error">
            Something went wrong
        </div>
        <div v-else-if="news">
            <div v-for="article of news.articles" class="py-2">
                <h3 class="font-bold text-blue-950">{{ article.title }}</h3>
                <div class="flex flex-row justify-between">
                    <span class="text-sm text-green-700">{{ article.source.name }}</span>
                    <a target="_blank" :href="article.url" class="hover:underline text-sm text-blue-500">Source</a>
                </div>
                <p class="font-thin">{{ article.description ?? 'No description' }}</p>
            </div>
        </div>
        <div v-else>No Data</div>
    </div>
</template>

<style scoped></style>