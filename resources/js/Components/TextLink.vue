<script setup>
    defineProps({
        routeName: {
            type: String,
            required: true,
        },
    });
</script>

<template>
    <Link :href="route(routeName)" 
          class="text-color5 font-semibold underline hover:no-underline transition-all ease-in-out">
          <slot/>
    </Link>
</template>