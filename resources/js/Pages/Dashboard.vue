<script setup>
    import { ref, watch } from 'vue';
    import Card from '../Components/Character/Card.vue';
    import { router } from '@inertiajs/vue3';
    import { debounce } from 'lodash';
    import Searchbar from '../Components/Searchbar.vue';
    import Title from '../Components/Title.vue';

    defineProps({
        characters: Array
    });

    const search = ref('');

    watch(search, debounce(
        (q) => router.get('/dashboard', {search: q}, {preserveState: true}, 1000)
    ));

</script>

<template>
    <Head title="| Dashboard"></Head>
    <div class="w-max space-y-3">
        <Title>Find New Characters...</Title>
        <Searchbar v-model="search"/>
    </div>
    <div class="flex flex-col justify-center items-center">
        <div v-for="character in characters">
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
</template>