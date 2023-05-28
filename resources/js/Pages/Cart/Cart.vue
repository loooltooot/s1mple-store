<script setup lang="ts">
import iProduct from '../../Models/product';
import Layout from '../Layout.vue'
import ProductCard from '../Products/ProductCard.vue';
import { Link } from "@inertiajs/vue3";

defineProps({ cart: Array<iProduct> })
</script>

<template>
    <Layout>
        <section>
            <h2>Корзина</h2>
            <Link href="/order" class="button">Заказать</Link>
            <ul class="grid-products">
                <li v-for="product in cart">
                    <ProductCard :product="product" :hide-when-null="true" />
                </li>
            </ul>
        </section>
    </Layout>
</template>