<script setup>
    import { onBeforeUnmount, onMounted } from 'vue';
    import Navlink from '../Components/Navlink.vue';    
    import { ref } from 'vue';

    const theme = ref(localStorage.theme);

    function switchTheme() {
        theme.value = theme.value === 'dark' ? 'light' : 'dark';
        document.documentElement.classList.toggle('dark', theme.value === 'dark');
        localStorage.theme = theme.value;
    }

    const screen = ref(window.innerWidth);

    function updateScreenSize() {
        screen.value = window.innerWidth;
    }
    onMounted(() => {
        window.addEventListener('resize', updateScreenSize);
    });

    onBeforeUnmount(() => {
        window.removeEventListener('resize', updateScreenSize);
    });

    const show = ref(false);
    const display = ref(false);
</script>

<template>
    <div @click="show = false" v-if="show" class="w-full h-screen absolute"></div>
    <div @click="display = false" v-if="display" class="w-full h-screen absolute"></div>
    <div class="w-full flex flex-col items-center dark:bg-color3 bg-zinc-100 space-y-10 justify-start h-screen overflow-hidden overflow-y-scroll text-zinc-100">
        <div :class="`w-full p-5 uppercase font-oswald bg-color5 flex ${screen <= 350 ? 'flex-col gap-5' : ''} justify-around items-center`">
            <Navlink class="text-2xl" routeName="home" componentName="Home">Superbulous</Navlink>
            <div class="flex justify-center items-center relative gap-3" v-if="$page.props.auth.user">
                <button v-if="screen > 500" @click="switchTheme" class="hover:bg-color3 px-3 py-1 rounded-sm transition-colors ease-in-out">
                    <i v-if="theme === 'dark'" class="fa-solid fa-sun"></i>
                    <i v-else class="fa-solid fa-circle-half-stroke"></i>
                </button>
                <div @click="show = !show" class="flex justify-center items-center gap-2 cursor-pointer">
                    <p class="select-none normal-case">{{ $page.props.auth.user.name }}</p>
                    <i class="fa-solid fa-angle-down"></i>
                </div>
                <div v-if="show" class="bg-color1 z-50 top-16 gap-2 p-2 rounded-b-sm flex flex-col absolute">
                    <Navlink routeName="profile.edit" componentName="Profile/Edit">
                        <img :src="`storage/${$page.props.auth.user.avatar ?? 'avatars/default.jpg'}`" class="bg-color5 rounded-sm w-20 h-20" alt="Profile Image"></img>
                    </Navlink>
                    <button v-if="screen <= 500" @click="switchTheme" class="hover:bg-color3 px-3 py-1 rounded-sm transition-colors ease-in-out">
                        <i v-if="theme === 'dark'" class="fa-solid fa-sun"></i>
                        <i v-else class="fa-solid fa-circle-half-stroke"></i>
                    </button>
                    <Navlink routeName="dashboard" componentName="Dashboard">Dashboard</Navlink>
                    <Navlink routeName="logout" componentName="''" method="post" as="button">LOGOUT</Navlink>
                </div>
            </div>
            <div v-else>
                <div v-if="screen > 500" class="space-x-5 flex justify-start items-center">
                    <button @click="switchTheme" class="hover:bg-color3 px-3 py-1 rounded-sm transition-colors ease-in-out">
                        <i v-if="theme === 'dark'" class="fa-solid fa-sun"></i>
                        <i v-else class="fa-solid fa-circle-half-stroke"></i>
                    </button>
                    <Navlink routeName="login" componentName="Auth/Login">Login</Navlink>
                    <Navlink routeName="register" componentName="Auth/Register">Register</Navlink>
                </div>
                <div v-else class="relative">
                    <i @click="display = !display" class="fa-solid fa-list text-2xl cursor-pointer"></i>
                    <div v-if="display" class="flex flex-col p-2 gap-2 z-50 top-16 absolute -left-8 bg-color1 rounded-b-sm">
                        <button @click="switchTheme" class="hover:bg-color3 px-3 py-1 rounded-sm transition-colors ease-in-out">
                            <i v-if="theme === 'dark'" class="fa-solid fa-sun"></i>
                            <i v-else class="fa-solid fa-circle-half-stroke"></i>
                        </button>
                        <Navlink routeName="login" componentName="Auth/Login">Login</Navlink>
                        <Navlink routeName="register" componentName="Auth/Register">Register</Navlink>
                    </div>
                </div>
            </div>
        </div>
        <slot/>
    </div>
</template>