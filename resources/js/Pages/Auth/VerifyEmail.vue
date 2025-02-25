<script setup>
import { useForm } from "@inertiajs/vue3";
import PrimaryButton from "../../Components/PrimaryButton.vue";

const form = useForm({
    token: "",
});

const resendForm = useForm({});

const submit = () => {
    form.post(route("verification.verify"), {
        onSuccess: () => {
            form.reset("token");
        },
    });
};

const resendToken = () => {
    resendForm.post(route("verification.send"), {
        onSuccess: () => {
            alert("New code sent to you on your email");
        },
    });
};
</script>

<template>
    <div class="max-w-md mx-auto mt-10 p-6 bg-white space-mono-regular text-color5 shadow-lg rounded-lg">
        <h2 class="text-lg  mb-4 text-center">Verify your email</h2>
        <p class="mb-2 font-barlow text-center">Type the code we sent to your email</p>

        <form @submit.prevent="submit" class="flex justify-center items-center flex-col gap-3">
            <input v-model="form.token" type="text"
                class="border p-2 w-full text-center text-lg space-mono-regular tracking-wide rounded"
                placeholder="XXXXXX" />
            <PrimaryButton type="submit" 
                :disabled="form.processing">
                Verify
            </PrimaryButton>
        </form>

        <p v-if="form.errors.token" class="text-red-500 mt-2 text-center">
            {{ form.errors.token }}
        </p>

        <div class="mt-4 text-center">
            <p class="text-gray-600 font-barlow">Did not receive the code?</p>
            <PrimaryButton @click="resendToken" :disabled="resendForm.processing">
                Resend the code
            </PrimaryButton>
        </div>
    </div>
</template>
