<script setup>
    import { useForm } from '@inertiajs/vue3';
    import InputField from '../../Components/InputField.vue';
    import ValidationErrors from '../../Components/ValidationErrors.vue';
    import Checkbox from '../../Components/Checkbox.vue';
    import TextLink from '../../Components/TextLink.vue';
    import PrimaryButton from '../../Components/PrimaryButton.vue';
    import Form from '../../Components/Form.vue';
    import Container from '../../Components/Container.vue';
    import Title from '../../Components/Title.vue';

    const form = useForm({
        email: '',
        password: '',
        remember: false,
    });

    defineProps({
        status: String
    });

    const submit = () => {
        form.post(route('login'), { 
            onFinish: () => form.reset('password')
        });
    }
</script>

<template>
    <Head title="| Login"/>
    <Container>
        <Form @submit.prevent="submit">
            <Title>Make a Log In</Title>
            <p class="font-barlow text-gray-500 text-xl">
                Doesn't have an account?
                <TextLink routeName='register'>Register</TextLink>
            </p>
            <ValidationErrors :errors="form.errors"/>
            <p class="text-green-600 font-barlow" v-if="status">{{ status }}</p>
            <InputField v-model="form.email" icon="envelope" placeholder="Email"/>
            <InputField v-model="form.password" icon="key" type="password" placeholder="Password"/>
            <div class="flex justify-between items-center w-full">
                <Checkbox v-model="form.remember"/>
                <TextLink routeName='password.request'>Forgot Password?</TextLink>
            </div>
            <div>
                <PrimaryButton :disable="form.processing">Login</PrimaryButton>
            </div>
        </Form>
    </Container>
</template>