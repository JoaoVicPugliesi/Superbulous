<script setup>
    import { useForm } from '@inertiajs/vue3';
    import PrimaryButton from '../../Components/PrimaryButton.vue';
    import Form from '../../Components/Form.vue';
    import Container from '../../Components/Container.vue';

    const form = useForm({});

    defineProps({
        status: String,
    });

    const submit = () => {
        form.post(route('verification.send'))
    };
</script>

<template>
    <Head title="| Email Verification" />
    <Container>
        <p class="space-mono-regular w-80 max-500px:w-60">
            Thanks for signing up! Before getting started, 
            could you verify your email address by 
            clicking on the link we just emailed to you? 
            If you didn't receive the email, we will gladly send you another
        </p>
        <p class="text-green-600 font-barlow" v-if="status">{{ status }}</p>
        <Form @submit.prevent="submit">
            <PrimaryButton :disable="form.processing">Resend Verification</PrimaryButton>
        </Form>
    </Container>
</template>