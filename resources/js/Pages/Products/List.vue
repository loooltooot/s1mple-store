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
            supriseProductId: 0,
            searchQuery: '',
            sortType: '',
            desc: ''
        }
    },
    methods: {
        sortArray(array: Array<iProduct>) {
            return this.desc
                ? array.sort((a, b) => +b['price'] - +a['price'])
                : array.sort((a, b) => +a['price'] - +b['price']);
        }
    },
    mounted() {
        this.supriseProductId = Math.floor(Math.random() * (this.products?.length));
    },
    computed: {
        searchedProducts() {
            return this.searchQuery ? this.products.filter((product) =>
                product.title.toLowerCase().includes(this.searchQuery.toLowerCase())
            )
                : this.products
        },
        sortedProducts() {
            return this.sortType ? this.sortArray(this.searchedProducts)
                : this.searchedProducts
        }
    }
}
</script>

<template>
    <Head title="Продукты" />
    <Layout>
        <section>
            <Suprise :product="products[supriseProductId]" />
            <div class="filters hugged">
                <h2>Товары:</h2>
                <label>
                    цена
                    <input type="checkbox" v-model="sortType" value="price" />
                </label>
                <label>
                    по убыванию
                    <input type="checkbox" v-model="desc" />
                </label>
                <input type="text" v-model="searchQuery" placeholder="поиск...">
            </div>
            <ul class="grid-products hugged">
                <li v-for="product in sortedProducts" :key="product.id">
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

div.filters {
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: fit-content;
    margin-top: 3.49vw;
    margin-bottom: 1.04vw;

    h2 {
        margin: 0;
    }

    input {
        padding: 0.3vw .5vw;
        border-radius: 0;
    }

    input:not([type="submit"]) {
        border: 0.1vw var(--primary-color) solid;
        background: none;
    }

    input[type="submit"] {
        cursor: pointer;
        background-color: var(--primary-color);
        border: none;
        color: #000;
        font-weight: 700;
        transition: background-color 0.3s ease;
        font-size: 1.5em;

        &:hover {
            background-color: var(--second-color);
        }
    }
}
</style>