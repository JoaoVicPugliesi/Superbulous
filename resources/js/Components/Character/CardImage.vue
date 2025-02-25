<script setup>
    defineProps({
        image: Object
    })
</script>

<template>
    <img
        class="h-60 md:h-auto w-full md:w-60 rounded-t-lg md:rounded-l-lg md:rounded-tr-none object-cover"
        :src="image"
        alt="Card Image"
    />
</template>