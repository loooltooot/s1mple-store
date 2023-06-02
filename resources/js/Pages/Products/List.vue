<script setup lang="ts">
import Layout from '../Layout.vue';
import { Head, Link } from '@inertiajs/vue3';
import type iProduct from '../../Models/product'
import ProductCard from './ProductCard.vue';
import Suprise from './Suprise.vue';

defineProps({ products: { type: Array<iProduct> }, adminDisplay: Boolean });
</script>

<script lang="ts">
export default {
    data() {
        return {
            supriseProductId: 0,
            searchQuery: '',
            sortType: '',
            desc: '',
            supriseProduct: Object as () => iProduct,
            productsInit: Array<iProduct>
        }
    },
    methods: {
        sortArray(array: Array<iProduct>) {
            if (!this.sortType) {
                return this.searchQuery ? this.productsInit.filter((product) =>
                    product.title.toLowerCase().includes(this.searchQuery.toLowerCase())
                )
                    : this.productsInit
            }

            return this.desc
                ? array.sort((a, b) => +b['price'] - +a['price'])
                : array.sort((a, b) => +a['price'] - +b['price']);
        }
    },
    mounted() {
        this.productsInit = [...this.products]
        this.supriseProductId = Math.floor(Math.random() * (this.products?.length));
        this.supriseProduct = this.products[this.supriseProductId]
    },
    computed: {
        searchedProducts() {
            return this.searchQuery ? this.products.filter((product) =>
                product.title.toLowerCase().includes(this.searchQuery.toLowerCase())
            )
                : this.products
        },
        sortedProducts() {
            return this.sortArray(this.searchedProducts)
        }
    }
}
</script>

<template>
    <Head title="Продукты" />
    <Layout>
        <section>
            <Link v-if="adminDisplay" href="/cms/panel">Вернуться в панель</Link>
            <Suprise v-if="!adminDisplay" :product="supriseProduct" />
            <div class="filters hugged">
                <h2>Товары:</h2>
                <label>
                    цена
                    <input type="checkbox" v-model="sortType" />
                </label>
                <label>
                    по убыванию
                    <input type="checkbox" v-model="desc" />
                </label>
                <input type="text" v-model="searchQuery" placeholder="поиск...">
            </div>
            <ul class="grid-products hugged">
                <li v-for="product in sortedProducts" :key="product.id">
                    <ProductCard :product="product" :adminDisplay="adminDisplay" />
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

@media screen and (max-width: 450px) {
    ul.grid-products {
        grid-template-columns: repeat(2, 1fr);
        row-gap: 2vw;
    }

    div.filters {
        flex-direction: column;
        row-gap: 2.5vw;
        margin-bottom: 5vw;
    }
}
</style>