<script setup>
    import { ref, watch } from 'vue';
    import Card from '../Components/Character/Card.vue';
    import { router } from '@inertiajs/vue3';
    import { debounce } from 'lodash';
    import Searchbar from '../Components/Searchbar.vue';
    import Title from '../Components/Title.vue';
    import Pagination from '../Components/Pagination.vue'; 

    const props = defineProps({
        characters: Array,
        pagination: Object,
    });

    const search = ref('');

    watch(search, debounce(
        (q) => router.get('/dashboard', { search: q, page: 1 }, { preserveState: true }), 1000
    ));

    function goToPage(page) {
        router.get('/dashboard', { search: search.value, page }, { preserveState: true });
    }
</script>

<template>
    <Head title="| Dashboard"></Head>
    <div class="w-max space-y-3">
        <Title class="dark:text-zinc-100">Find New Characters...</Title>
        <Searchbar v-model="search" />
    </div>
    <div v-if="props.characters.length > 0" class="flex flex-col justify-center items-center">
        <div v-for="character in props.characters" :key="character.id">
            <Card 
                :name="character.name" 
                :image="character.image"
                :identity="character.identity"
                :race="character.race"
                :height="character.height"
                :weight="character.weight"
                :stats="character.stats"
                :publisher="character.publisher"
            />
        </div>
    </div>
    <div v-else class="flex flex-col justify-center items-center">
        <h3 class="space-mono-regular">No Results Found</h3>
    </div>
    <Pagination
        :current-page="pagination.currentPage" 
        :last-page="pagination.lastPage" 
        :on-page-change="goToPage"
    />
    <div></div>
</template>
