<script setup lang="ts">
import Layout from '../Layout.vue';
import { Link } from '@inertiajs/vue3';
import iOrder from '../../Models/order';
import OrderCard from '../Order/OrderCard.vue';

defineProps({ orders: Array<iOrder> })
</script>

<template>
    <Layout>
        <section>
            <Link href="/cms/panel">Вернуться в панель</Link>
            <h2 class="hugged">Заказы</h2>
            <ul class="hugged column-flex">
                <li v-for="order in orders" :key="order.id">
                    <OrderCard :order="order" />
                </li>
            </ul>
        </section>
    </Layout>
</template>

<style lang="scss">
ul.column-flex {
    display: flex;
    flex-direction: column;
    row-gap: 1.04vw;
}
</style>