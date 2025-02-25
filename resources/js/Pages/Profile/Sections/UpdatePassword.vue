<script setup>
    import { useForm } from '@inertiajs/vue3';
    import InputField from '../../../Components/InputField.vue';
    import ValidationErrors from '../../../Components/ValidationErrors.vue';
    import PrimaryButton from '../../../Components/PrimaryButton.vue';
    import Form from '../../../Components/Form.vue';
    import Container from '../../../Components/Container.vue';
    import Title from '../../../Components/Title.vue';
    import { route } from 'ziggy-js';
  
    const form = useForm({
        current_password: "",
        password: "",
        password_confirmation: "",
    });

    const submit = () => {
        form.put(route('profile.password'), {
            onSuccess: () => form.reset(),
            onError: () => form.reset(),
            preserveScroll: true,
        });
    };

</script>

<template>
    <Container class="lg:w-1/2 lg:flex lg:justify-start">
        <Form @submit.prevent="submit" class="lg:p-2">
            <Title>Update Password</Title>
            <p class="font-barlow text-gray-500 text-center text-xl w-80 max-500px:w-60">
                Update your account's password.
            </p>
            <ValidationErrors :errors="form.errors"/>
            <InputField v-model="form.current_password" icon="key" type="password" placeholder="Current Password"/>
            <InputField v-model="form.password" icon="key" type="password" placeholder="Password"/>
            <InputField v-model="form.password_confirmation" icon="key" type="password" placeholder="Confirm Password"/>
            <p v-if="form.recentlySuccessful" class="text-green-600 font-barlow">Saved</p>
            <div>
                <PrimaryButton :disable="form.processing">Save</PrimaryButton>
                
            </div>
        </Form>
    </Container>
</template>