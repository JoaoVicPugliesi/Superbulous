<script setup>
    import { router, useForm } from '@inertiajs/vue3';
    import InputField from '../../../Components/InputField.vue';
    import ValidationErrors from '../../../Components/ValidationErrors.vue';
    import PrimaryButton from '../../../Components/PrimaryButton.vue';
    import Form from '../../../Components/Form.vue';
    import Container from '../../../Components/Container.vue';
    import Title from '../../../Components/Title.vue';
    import { route } from 'ziggy-js';
    import { ref } from 'vue';


    const showConfirmPassword = ref(false);
  
    const form = useForm({
        password: '',
    });

    const submit = () => {
        form.delete(route('profile.destroy'), {
            onFinish: () => form.reset(),
            preserveScroll: true,
        });
    }

</script>

<template>
    <Container class="lg:flex lg:w-1/2 lg:justify-start">
        <Form @submit.prevent="submit" class="lg:p-2">
            <Title>Delete Account</Title>
            <p class="font-barlow text-center text-gray-500 text-xl w-80 max-500px:w-60">
                Once your account is deleted, all of its resources data will be permanently deleted. This action cannot be undone.
            </p>
            <InputField class="pt-5"  v-if="showConfirmPassword" v-model="form.password" icon="key" placeholder="Password"/>
            <ValidationErrors :errors="form.errors"/>
            <div v-if="showConfirmPassword" class="flex justify-center items-center gap-3 pb-5">
                <PrimaryButton class="hover:bg-red-500 transition-colors ease-in-out" :disable="form.processing">Delete</PrimaryButton>
                <button @click="showConfirmPassword = false" class="text-gray-500 mt-5">Cancel</button>
            </div>
            <PrimaryButton v-if="!showConfirmPassword" @click="showConfirmPassword = true" class="bg-red-500 h-10">
                <i class="fa-solid fa-triangle-exclamation mr-2"></i>
                Delete Account
            </PrimaryButton>
        </Form>
    </Container>
</template>