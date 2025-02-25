<script setup>
    import UpdateInfo from './Sections/UpdateInfo.vue';
    import UpdatePassword from './Sections/UpdatePassword.vue';
    import DeleteAccount from './Sections/DeleteAccount.vue';

    defineProps({
        user: Object
    });
</script>

<template>
    <head title="| Edit"></head>

    <UpdateInfo :user="user"/>
    <UpdatePassword/>
    <DeleteAccount/>
    <div></div>
</template>