<script setup>
    const model = defineModel();
</script>

<template>
     <input class="bg-color3 dark:bg-gray-200 dark:text-color3 w-full rounded-lg p-5 max-500px:p-3 max-500px:w-60 placeholder:dark:text-color3 placeholder:text-gray-300 outline-none font-mono" type="search" placeholder="Search" v-model="model" spellcheck="false">
</template>