<script setup lang="ts">
import iProduct from '../../Models/product';
import Layout from '../Layout.vue';
import { Head } from '@inertiajs/vue3';

defineProps({ product: Object as () => iProduct })
</script>

<template>
    <Head :title="product?.title" />
    <Layout>
        <section>
            <div class="hugged">
                <div class="image-wrapper">
                    <img :src="'../storage/images/' + product?.img" :alt="product?.title">
                </div>
                <div class="content">
                    <h2>{{ product?.title }}</h2>
                    <p>{{ product?.description }}</p>
                    <span class="price">{{ product?.price }}₽</span>
                </div>
            </div>
        </section>
    </Layout>
</template>

<style lang="scss" scoped>
.image-wrapper {
    overflow: clip;
    width: 10vw;
    height: fit-content;
    box-sizing: border-box;
    transition: border-color .3s ease;

    img {
        width: 100%;
    }
}
</style>