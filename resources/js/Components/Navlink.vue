<script setup>
    
    defineProps({
        routeName: {
            type: String,
            required: true,
        },

        componentName: {
            type: String,
            required: true,
        },
    });

</script>

<template>
    <Link class="hover:bg-color3 flex justify-center items-center p-2 rounded-sm transition-colors ease-in-out"
          :class="$page.component === componentName ? 'bg-color3' : ''" 
          :href="route(routeName)"
          draggable="false">
          <h3 class="select-none"><slot/></h3>
    </Link>
</template>