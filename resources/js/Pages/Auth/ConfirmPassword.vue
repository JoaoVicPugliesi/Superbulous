<script setup>
    import { useForm } from '@inertiajs/vue3';
    import InputField from '../../Components/InputField.vue';
    import ValidationErrors from '../../Components/ValidationErrors.vue';
    import PrimaryButton from '../../Components/PrimaryButton.vue';
    import Form from '../../Components/Form.vue';
    import Container from '../../Components/Container.vue';

    const form = useForm({
        password: '',
    });

    const submit = () => {
        form.post(route('password.confirm'), {
            onFinish: () => form.reset(),
        });
    }
</script>

<template>
    <Head title="| Confirm Password"/>
    <Container>
        <Form @submit.prevent="submit">
            <p class="space-mono-regular w-80 max-500px:w-60">
               This is a secured area. Please confirm your password before continuing.
            </p>
            <ValidationErrors :errors="form.errors"/>
            <InputField v-model="form.password" icon="key" placeholder="Password"/>
            <div>
                <PrimaryButton :disable="form.processing">Confirm</PrimaryButton>
            </div>
        </Form>
    </Container>
</template>