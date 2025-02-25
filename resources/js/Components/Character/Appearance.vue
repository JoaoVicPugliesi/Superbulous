<script setup>
    defineProps({
        value: {
            type: String,
            required: true
        },
        icon: {
            type: String,
            required: true
        },
        iconFormat: {
            type: String,
            required: true
        },
    });
</script>

<template>
    <div class="flex justify-center items-center gap-2">
        <i :class="`fa-${iconFormat} fa-${icon}  hover:-translate-x-1 transition-all ease-in cursor-pointer`"></i>
        <h3>{{ value }}</h3>
    </div>
</template>