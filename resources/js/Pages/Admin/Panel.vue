<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import Layout from '../Layout.vue';
</script>

<template>
    <Layout>
        <ul class="options hugged">
            <li>
                <section>
                    <h2>Продукты</h2>
                    <ul class="category-options">
                        <li>
                            <Link href="/cms/products">
                            просмотр
                            </Link>
                        </li>
                        <li>
                            <Link href="/cms/addproduct">
                            добавить
                            </Link>
                        </li>
                    </ul>
                </section>
            </li>
            <li>
                <section>
                    <h2>Заказы</h2>
                    <ul class="category-options">
                        <li>
                            <Link href="/cms/orders">
                            просмотр
                            </Link>
                        </li>
                    </ul>
                </section>
            </li>
            <li>
                <section>
                    <h2>Пользователи</h2>
                    <ul class="category-options">
                        <li>
                            <Link href="/cms/users">
                            просмотр
                            </Link>
                        </li>
                    </ul>
                </section>
            </li>
        </ul>
    </Layout>
</template>

<style lang="scss" scoped>
ul.options {
    display: flex;
    justify-content: space-between;
}

ul.category-options {
    flex-direction: column;
    row-gap: .52vw;
}

@media screen and (max-width: 450px) {
    ul.options {
        flex-direction: column;
    }
}
</style>