<script setup lang="ts">
import Layout from '../Layout.vue';
import { Head } from '@inertiajs/vue3';
import type iProduct from '../../Models/product'
import ProductCard from './ProductCard.vue';
import Suprise from './Suprise.vue';

defineProps({ products: { type: Array<iProduct> } });
</script>

<script lang="ts">
export default {
    data() {
        return {
            supriseProductId: 0
        }
    },
    mounted() {
        this.supriseProductId = Math.floor(Math.random() * (this.products?.length));
    }
}
</script>

<template>
    <Head title="Продукты" />
    <Layout>
        <section>
            <Suprise :product="products[supriseProductId]" />
            <h2 class="hugged">Товары:</h2>
            <ul class="grid-products hugged">
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
    grid-template-columns: repeat(4, 1fr);
    row-gap: .94vw;
    column-gap: 1.3vw;
}

h2 {
    margin-top: 3.49vw;
}
</style>