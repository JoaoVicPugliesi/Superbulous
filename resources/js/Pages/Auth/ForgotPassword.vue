<script setup>
    import { useForm } from '@inertiajs/vue3';
    import InputField from '../../Components/InputField.vue';
    import ValidationErrors from '../../Components/ValidationErrors.vue';
    import PrimaryButton from '../../Components/PrimaryButton.vue';
    import Form from '../../Components/Form.vue';
    import Container from '../../Components/Container.vue';

    const form = useForm({
        email: '',
    });

    defineProps({
        status: String
    });

    const submit = () => {
        form.post(route('password.email'));
    }
</script>

<template>
    <Head title="| Forgot Password"/>
    <Container>
        <Form @submit.prevent="submit">
            <p class="space-mono-regular w-80 max-500px:w-60">
                Forgot your password? No problem. 
                Just let us know your email address 
                and we will email you a password reset link
                that will allow you choose a new one.
            </p>
            <ValidationErrors :errors="form.errors"/>
            <p class="text-green-600 font-barlow" v-if="status">{{ status }}</p>
            <InputField v-model="form.email" icon="envelope" placeholder="Email"/>
            <div>
                <PrimaryButton :disable="form.processing">Send</PrimaryButton>
            </div>
        </Form>
    </Container>
</template>