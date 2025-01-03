<script setup>
 
    const props = defineProps({
        currentPage: Number,
        lastPage: Number,
        onPageChange: Function,
    });

    function isFirstPage() {
        return props.currentPage === 1;
    }

    function isLastPage() {
        return props.currentPage === props.lastPage;
    }
</script>

<template>
    <div class="flex justify-center items-center rounded-md  space-x-5 bg-color5 p-2 space-mono-regular">
        <button 
            class="btn btn-primary font-oswald uppercase bg-color1 p-2 rounded-sm" 
            :disabled="isFirstPage()" 
            @click="onPageChange(props.currentPage - 1)"
        >
            Previous
        </button>
        <span>Page {{ props.currentPage }} of {{ props.lastPage }}</span>
        <button 
            class="btn btn-primary font-oswald uppercase bg-color1 p-2 rounded-sm" 
            :disabled="isLastPage()" 
            @click="onPageChange(props.currentPage + 1)"
        >
            Next
        </button>
    </div>
</template>
