<script setup lang="ts">
import Layout from '../Layout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Войти" />
    <Layout>
        <section>
            <form class="hugged auth-form" action="/auth/login" method="POST">
                <input required type="email" name="email" placeholder="Email" />
                <input required type="password" name="password" placeholder="Пароль" />

                <input type="submit" value="Войти" />
            </form>
        </section>
    </Layout>
</template>