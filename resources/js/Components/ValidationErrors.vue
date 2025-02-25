<script setup>
    defineProps({
        errors: Object
    });
</script>

<template>
    <div>
        <p class="font-bold uppercase text-sm text-red-500" v-for="(error, i) in errors" :key="i">
            {{ error }}
        </p>
    </div>
</template>