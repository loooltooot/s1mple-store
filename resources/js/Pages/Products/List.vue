<script setup lang="ts">
import Layout from '../Layout.vue';
import { Head } from '@inertiajs/vue3';
import type iProduct from '../../Models/product'

defineProps({ products: Array<iProduct> });
</script>

<template>
    <Head title="S1mple-Store" />
    <Layout>
        <h2>Продукты</h2>
        <ul>
            <li v-for="product in products">
                <div class="image-wrapper">
                    <img :src="'storage/images/' + product.img" alt="">
                </div>
                <div class="content">
                    <h3>{{ product.title }}</h3>
                    <p>{{ product.description }}</p>
                    <span class="price">{{ product.price }}р</span>
                </div>
            </li>
        </ul>
    </Layout>
</template>