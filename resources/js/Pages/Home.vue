<script setup>
    import Card from '../Components/Character/Card.vue';

    defineProps({
        character: Object
    });
</script>

<template>
    <p class="text-color3 dark:text-zinc-100 w-full sm:w-5/6 md:w-2/3 space-mono-regular  text-lg sm:text-xl md:text-2xl lg:text-4xl text-center md:text-left leading-relaxed">
        Welcome to the Superbulous universe where all supers are united seeking one only cause: bringing happiness to people around not just because brightness lives on the stars but also in every eye from a living heart.
    </p>
    <Card :name="character.name" 
          :image="character.image"
          :identity="character.identity"
          :race="character.race"
          :height="character.height"
          :weight="character.weight"
          :stats="character.stats"
          :publisher="character.publisher"
    />
</template>