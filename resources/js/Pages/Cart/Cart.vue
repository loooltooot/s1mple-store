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
            <Link href="/order">Заказать</Link>
            <ul class="grid-products">
                <li v-for="product in cart">
                    <ProductCard :product="product" :hide-when-null="true" />
                </li>
            </ul>
        </section>
    </Layout>
</template>

<style lang="scss" scoped>
a {
    display: block;
    border: var(--primary-color) .11vw solid;
    width: fit-content;
    margin-bottom: 1.04vw;
    background-color: var(--primary-color);
    color: var(--back-color);
    font-weight: 700;
    font-size: var(--h3-font-size);
    padding: .11vw .33vw;
    border-bottom-left-radius: .52vw;
    border-top-right-radius: .52vw;
    transition: background-color .3s ease, border-color .3s ease;

    &:hover {
        border-color: var(--second-color);
        background-color: var(--second-color);
        color: black;
    }
}
</style>