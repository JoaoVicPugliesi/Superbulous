<script setup>
    import PowerStat from './PowerStat.vue';
    import Appearance from './Appearance.vue';
    import CardImage from './CardImage.vue';

    defineProps({
        name: String,
        image: String,
        identity: String,
        race: String,
        height: String,
        weight: String,
        publisher: String,
        stats: Object
    });
</script>

<template>
   <div class="w-full h-max flex justify-center items-center gap-4 p-4">
        <div class="w-full max-w-4xl flex flex-col md:flex-row rounded-lg text-zinc-100 shadow-lg">
            <CardImage :image="image"/>
            <div class="flex-1 dark:bg-color5 bg-color2 p-4 rounded-b-lg md:rounded-r-lg md:rounded-bl-none flex flex-col justify-between items-center">
                <h3 class="font-bold text-lg md:text-2xl uppercase text-center md:text-left">
                    {{ name }} - {{ identity ? identity : 'Unknown' }}
                </h3>
                <div class="flex flex-wrap gap-4 justify-center md:justify-start items-center mt-4">
                    <PowerStat type="Intelligence" icon="brain" iconFormat="solid" :stat="Number(stats.intelligence)" />
                    <PowerStat type="Strength" icon="dumbbell" iconFormat="solid" :stat="Number(stats.strength)" />
                    <PowerStat type="Speed" icon="person-running" iconFormat="solid" :stat="Number(stats.speed)" />
                    <PowerStat type="Durability" icon="shield-halved" iconFormat="solid" :stat="Number(stats.durability)" />
                    <PowerStat type="Power" icon="superpowers" iconFormat="brands" :stat="Number(stats.power)" />
                    <PowerStat type="Combat" icon="hand-fist" iconFormat="solid" :stat="Number(stats.combat)" />
                </div>
                <div class="flex w-full flex-col md:flex-row justify-between items-center mt-8">
                    <div class="flex flex-col md:flex-row gap-4 text-sm md:text-base">
                        <Appearance :value="race || 'Unknown'" :icon="race === 'Human' ? 'person' : 'reddit-alien'" :iconFormat="race === 'Human' ? 'solid' : 'brands'" />
                        <Appearance :value="height !== '- | 0 cm' ? height : 'Unknown'" icon="arrow-up-right-dots" iconFormat="solid" />
                        <Appearance :value="weight !== '- lb | 0 kg' ? weight : 'Unknown'" icon="weight-scale" iconFormat="solid" />
                    </div>
                    <p class="text-zinc-100 text-center md:text-right mt-4 md:mt-0">
                        Publisher: {{ publisher }}
                    </p>
                </div>
            </div>
        </div>
    </div>

</template>