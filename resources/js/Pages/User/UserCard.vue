<script setup lang="ts">
import iUser from '../../Models/user';
import { Link } from '@inertiajs/vue3';

defineProps({ user: Object as () => iUser })
</script>

<template>
    <div>
        <h3>{{ user?.email }}</h3>
        <span v-if="user?.admin">Админ</span>
        <span v-if="!user?.admin">Обычный пользователь</span>
        <Link :href="'/cms/users/admin/' + user?.id" v-if="!user?.admin">Дать права администратора</Link>
        <Link v-if="user?.email !== 'admin@user.com'" class="delete-button" :href="'/cms/users/delete/' + user?.id">удалить
        </Link>
    </div>
</template>

<style lang="scss" scoped>
h3 {
    font-size: var(--h3-font-size);
    color: var(--primary-color);
}

div {
    flex-direction: column;
    display: flex;
}

a {
    width: fit-content;
}
</style>