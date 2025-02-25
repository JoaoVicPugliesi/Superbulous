<script setup>
    import { router, useForm } from '@inertiajs/vue3';
    import InputField from '../../../Components/InputField.vue';
    import ValidationErrors from '../../../Components/ValidationErrors.vue';
    import PrimaryButton from '../../../Components/PrimaryButton.vue';
    import Form from '../../../Components/Form.vue';
    import Container from '../../../Components/Container.vue';
    import Title from '../../../Components/Title.vue';
    import File from '../../../Components/File.vue';
    import { route } from 'ziggy-js';

    const props = defineProps({
        user: Object
    });

    const form = useForm({
        name: props.user.name,
        email: props.user.email,
        avatar: '',
        preview: props.user.avatar != null ? `storage/${props.user.avatar}` : 'storage/avatars/default.jpg'
    });

    const submit = () => {
        form.patch(route('profile.info'));
    };

    const resendEmail = (e) => {
        router.post(route('verification.send'),  {}, {
            onStart: () => (e.target.disable = true),

            onFinish: () => (e.target.disable = false)
        });
    }

    const change = (e) => {
        form.avatar = e.target.files[0];
        form.preview = URL.createObjectURL(e.target.files[0]);
    };

</script>

<template>
    <Container class="lg:w-1/2 lg:flex lg:justify-start">
        <Form @submit.prevent="submit" class="lg:p-2">
            <Title>Update Information</Title>
            <p class="font-barlow text-center text-gray-500 text-xl w-80 max-500px:w-60">
                Update your account's profile information and email address.
            </p>
            <ValidationErrors :errors="form.errors"/>
            <File @input="change" :preview="form.preview"/>
            <InputField v-model="form.name" icon="user" type="user" placeholder="User"/>
            <InputField v-model="form.email" icon="envelope" placeholder="Email"/>
            <div class="text-center" v-if="user.email_verified_at == null">
                <p class="font-barlow text-gray-500 text-xl">
                    Your email address is unverified.
                </p>
                <button @click="resendEmail" class="text-color5 font-semibold underline hover:no-underline disabled:text-gray-400 transition-all ease-in-out">Click here to re-send the verification email.</button>
            </div>
            <div>
                <PrimaryButton :disable="form.processing">Save</PrimaryButton>
            </div>
        </Form>
    </Container>
</template>