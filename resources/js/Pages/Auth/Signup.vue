<script setup lang="ts">
import Layout from '../Layout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<script lang="ts">
export default {
    data() {
        return {
            password: '',
            passwordConfirmation: ''
        }
    },
    computed: {
        passwordsEqual() {
            return this.password === this.passwordConfirmation
        }
    }
}
</script>

<template>
    <Head title="Зарегистрироваться" />
    <Layout>
        <section>
            <form class="hugged auth-form" action="/auth/signup" method="POST">
                <input required type="email" name="email" placeholder="Email" />
                <input v-model="password" required type="password" name="password" placeholder="Пароль" />
                <input v-model="passwordConfirmation" required type="password" name="password-confirmation"
                    placeholder="Подтвердите пароль" />

                <span v-if="!passwordsEqual" class="passwordsError"> Пароли не совпадают </span>

                <input type="submit" value="Зарегистрироваться" />
            </form>
        </section>
    </Layout>
</template>