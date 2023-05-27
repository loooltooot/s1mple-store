<script setup lang="ts">
import axios from 'axios';
import type iProduct from '../../Models/product';

defineProps({ product: { type: Object as () => iProduct, required: true }, hideWhenNull: Boolean })
</script>

<script lang="ts">
export default {
    data() {
        return {
            quantity: 0
        }
    },
    methods: {
        addToCart() {
            axios.post('/cart/add', {
                product_id: this.product.id,
                quantity: this.quantity
            })
                .then(response => {
                    console.log(response.data);
                })
                .catch(error => {
                    console.error(error);
                });
        },
        incrementQuantity(event) {
            event.stopPropagation();

            this.quantity += 1;
            this.$store.commit('increment')
            this.addToCart()
        },
        decrementQuantity(event) {
            event.stopPropagation();
            if (this.quantity - 1 >= 0) {
                this.quantity -= 1;
                this.$store.commit('decrement')
                this.addToCart()
            }
        }
    },
    watch: {
        quantity() {
            const card = document.querySelector(`div[data-id="${this.product.id}"]`)
            if (this.quantity === 0 && this.hideWhenNull) {
                card?.parentElement?.classList.add('hidden')
            }
        }
    },
    mounted() {
        axios.get(`/cart/quantity/${this.product.id}`)
            .then(response => {
                this.quantity = response.data
            }).catch(error => {
                console.error(error);
            });
    },
}
</script>

<template>
    <div class="card" :data-id="product.id">
        <div class="image-wrapper">
            <img :src="'storage/images/' + product.img" :alt="product.title">
        </div>
        <div class="content">
            <h3>{{ product.title }}</h3>
            <p>{{ product.description }}</p>
            <span class="price">{{ product.price }}р</span>
        </div>
        <button @click="incrementQuantity" class="add-to-cart">
            <span @click="decrementQuantity" v-if="quantity !== 0">-</span>
            {{ quantity === 0 ? 'Добавить в корзину' : quantity }}
            <span @click="incrementQuantity" v-if="quantity !== 0">+</span>
        </button>
    </div>
</template>

<style lang="scss" scoped>
.card {
    display: flex;
    flex-direction: column;
    min-height: 28.85vw;

    .image-wrapper {
        overflow: clip;
        width: 100%;
        height: 11.2vw;
        border-top-right-radius: .52vw;

        img {
            width: 100%;
        }
    }

    .content {
        flex-grow: 2;
        display: flex;
        flex-direction: column;
        margin-bottom: .52vw;

        h3 {
            margin-top: .52vw;
        }

        p {
            flex-grow: 2;
            margin: 0;
            margin-bottom: 1vw;
        }

        span.price {
            font-weight: 700;
            font-size: --h3-font-size;
        }
    }

    .add-to-cart {
        cursor: pointer;
        border: .11vw var(--primary-color) solid;
        background-color: var(--primary-color);
        padding: .22vw .11vw;
        color: var(--back-color);
        transition: border-color .3s ease, background-color .3s ease;
        position: relative;
        border-bottom-left-radius: .52vw;

        span {
            position: absolute;
            font-size: var(--h2-font-size);
            color: var(--back-color);
            font-weight: 700;

            &:nth-child(1) {
                left: .3vw;
                top: -.11vw;

            }

            &:nth-child(2) {
                right: .3vw;
                top: 0vw;
            }

            &:hover {
                color: red;
            }
        }

        &:hover {
            border-color: var(--second-color);
            background-color: var(--second-color);
        }
    }
}
</style>