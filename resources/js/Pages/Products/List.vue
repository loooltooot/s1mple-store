<script setup lang="ts">
import Layout from '../Layout.vue';
import { Head } from '@inertiajs/vue3';
import type iProduct from '../../Models/product'
import ProductCard from './ProductCard.vue';

defineProps({ products: Array<iProduct> });
</script>

<template>
    <Head title="S1mple-Store" />
    <Layout>
        <section>
            <h2>Продукты</h2>
            <ul class="grid-products">
                <li v-for="product in products">
                    <ProductCard :product="product" />
                </li>
            </ul>
        </section>
    </Layout>
</template>

<style lang="scss">
ul.grid-products {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    row-gap: 2.5vw;
    column-gap: 1.5vw;
}
</style>