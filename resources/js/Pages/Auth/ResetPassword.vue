<script setup>
    
    import { useForm } from '@inertiajs/vue3';
    import InputField from '../../Components/InputField.vue';
    import ValidationErrors from '../../Components/ValidationErrors.vue';
    import PrimaryButton from '../../Components/PrimaryButton.vue';
    import Form from '../../Components/Form.vue';
    import Container from '../../Components/Container.vue';
    import Title from '../../Components/Title.vue';

    const props = defineProps({
        token: String,
        email: String
    });

    const form = useForm({
        token: props.token,
        email: props.email,
        password: '',
        password_confirmation: '',
    });

    const submit = () => {
        form.post(route('password.update'), { 
            onFinish: () => form.reset('password', 'password_confirmation')
        });
    }

</script>

<template>
    <Head title="| Reset Password"/>
    <Container>
        <Form @submit.prevent="submit">
            <Title>Enter Your New Password</Title>
            <ValidationErrors :errors="form.errors"/>
            <InputField v-model="form.email" icon="envelope" placeholder="Email"/>
            <InputField v-model="form.password" icon="key" type="password" placeholder="Password"/>
            <InputField v-model="form.password_confirmation" icon="key" type="password" placeholder="Confirm Password"/>
            <div>
               <PrimaryButton :disable="form.processing">Reset Password</PrimaryButton>
            </div>
        </Form>
    </Container>
</template>