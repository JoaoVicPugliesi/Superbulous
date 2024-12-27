<script setup>

    const model = defineModel();

    defineProps({

        type: {
            type: String,
            default: 'text'
        },
        icon: {
            type: String,
            required: true,
        },
        placeholder: {
            type: String,
            required: true
        },

    });

</script>

<template>
    <div class="flex max-500px:flex-col items-center justify-start max-500px:items-start gap-2">
        <i :class="`fa-solid fa-${icon} w-5`"></i>
        <input v-model="model" class="bg-color5 w-80 max-500px:w-60 px-2 py-1 autocomplete rounded-sm text-zinc-100 outline-none font-mono placeholder:text-zinc-100" :type="type" :placeholder="placeholder" autocomplete="on">
    </div>
</template>