<script setup lang="ts">
import iUser from '../../Models/user';
import Layout from '../Layout.vue';
import { Link } from '@inertiajs/vue3';
import UserCard from '../User/UserCard.vue';

defineProps({ users: Array<iUser> })
</script>

<template>
    <Layout>
        <section>
            <Link href="/cms/panel">Вернуться в панель</Link>
            <h2 class="hugged">Пользователи</h2>
            <ul class="hugged column-flex">
                <li v-for="user in users" :key="user.id">
                    <UserCard :user="user" />
                </li>
            </ul>
        </section>
    </Layout>
</template>