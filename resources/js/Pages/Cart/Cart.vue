<script setup lang="ts">
import iProduct from '../../Models/product';
import Layout from '../Layout.vue'
import ProductCard from '../Products/ProductCard.vue';
import { Link, Head } from "@inertiajs/vue3";

defineProps({ cart: Array<iProduct> })
</script>

<template>
    <Head title="Корзина" />
    <Layout>
        <section>
            <h2 class="hugged">Корзина</h2>
            <Link class="hugged button" href="/order">Заказать</Link>
            <ul class="grid-products hugged">
                <li v-for="product in cart">
                    <ProductCard :product="product" :hide-when-null="true" />
                </li>
            </ul>
        </section>
    </Layout>
</template>