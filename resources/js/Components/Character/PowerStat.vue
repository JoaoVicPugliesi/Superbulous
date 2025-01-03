<script setup>

    import StatMarker from './StatMarker.vue';

    defineProps({
        type: {
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
        stat: {
            type: Number,
            required: true
        }
    });

    const calculateStatMarkers = (stat) => {
        if (stat > 0 && stat <= 20) return 1;
        if (stat > 20 && stat <= 40) return 2;
        if (stat > 40 && stat <= 60) return 3;
        if (stat > 60 && stat <= 80) return 4;
        if (stat > 80 && stat <= 100) return 5;
        return 0; 
    };
</script>

<template>
    <div class="flex gap-2">
        <i :class="`fa-${iconFormat} fa-${icon} mt-1 hover:-translate-y-1 transition-all ease-in cursor-pointer`"></i>
        <h3 class="font-barlow uppercase">{{ type }}</h3>
        <div class="flex bg-gray-400 w-40">
           <template v-for="index in calculateStatMarkers(stat)" :key="index">
                <StatMarker/>
           </template>
        </div>                       
    </div>
</template>