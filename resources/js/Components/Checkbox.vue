<script setup>

    const model = defineModel();

</script>

<template>
    <div class="flex justify-center items-center gap-2 font-bold">
        <input class="mt-1 cursor-pointer" type="checkbox" v-model="model">
        <h3>Remember Me</h3>
    </div>
</template>