<script setup>
    
    import { useForm } from '@inertiajs/vue3';
    import InputField from '../../Components/InputField.vue';
    import ValidationErrors from '../../Components/ValidationErrors.vue';
    import TextLink from '../../Components/TextLink.vue';
    import PrimaryButton from '../../Components/PrimaryButton.vue';
    import Form from '../../Components/Form.vue';
    import File from '../../Components/File.vue';
    import Container from '../../Components/Container.vue';
    import Title from '../../Components/Title.vue';

    const form = useForm({
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
        avatar: '',
        preview: null
    });

    const submit = () => {
        form.post(route('register'), { 
            onFinish: () => form.reset('password', 'password_confirmation')
        });
    }

    const change = (e) => {
        form.avatar = e.target.files[0];
        form.preview = URL.createObjectURL(e.target.files[0]);
    }

</script>

<template>
    <Head title="| Register"/>
    <Container>
        <Form @submit.prevent="submit">
            <Title>Create an Account</Title>
            <p class="font-barlow text-gray-500 text-xl">
                Already have an account?
                <TextLink routeName='login'>Login</TextLink>
            </p>
            <ValidationErrors :errors="form.errors"/>
            <File @input="change" :preview="form.preview"/>
            <InputField v-model="form.name" icon="user" placeholder="User"/>
            <InputField v-model="form.email" icon="envelope" placeholder="Email"/>
            <InputField v-model="form.password" icon="key" type="password" placeholder="Password"/>
            <InputField v-model="form.password_confirmation" icon="key" type="password" placeholder="Confirm Password"/>

            <p class="font-barlow">By creating an account, you agree to our Terms of Service and Privacy Policy.</p>
            <div>
               <PrimaryButton :disable="form.processing">Register</PrimaryButton>
            </div>
        </Form>
    </Container>
</template>