<script setup>

    defineProps({
        preview: Object,
    });

</script>

<template>
    <div class="grid place-items-center">
        <div class="relative w-28 h-28 rounded-lg overflow-hidden border border-slate-300">
        <label for="avatar" class="absolute inset-0 grid content-end cursor-pointer">
        <span class="bg-color5 text-zinc-100 font-barlow uppercase pb-2 text-center">Avatar</span>
        </label>
        <input type="file" id="avatar" hidden />
        <img class="object-cover w-28 h-28" :src="preview ?? 'storage/avatars/default.jpg'"/>
        </div>
    </div>
</template>