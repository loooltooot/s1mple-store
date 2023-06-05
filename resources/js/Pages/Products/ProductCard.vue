<script setup lang="ts">
import axios from 'axios';
import type iProduct from '../../Models/product';
import { Link } from '@inertiajs/vue3'

defineProps({ product: { type: Object as () => iProduct, required: true }, hideWhenNull: Boolean, adminDisplay: Boolean })
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
        <Link :href="!adminDisplay ? '/products/' + product.id : '/cms/products/edit/' + product.id">
        <div class="image-wrapper">
            <img :src="'/storage/images/' + product.img" :alt="product.title">
        </div>
        </Link>
        <div class="content">
            <h3>{{ product.title }}</h3>
            <!-- <p>{{ product.description }}</p> -->
            <span class="price">{{ product.price }}₽
                <span v-if="hideWhenNull"> * {{ quantity }} = {{ product.price *
                    quantity }}₽
                </span>
                <Link class="delete-button" :href="'/cms/products/delete/' + product.id" v-if="adminDisplay">удалить</Link>
            </span>
        </div>
        <button v-if="$store.state.loggedIn" @click="incrementQuantity" class="add-to-cart">
            <span @click="decrementQuantity" v-if="quantity !== 0">-</span>
            {{ quantity === 0 ? '+' : quantity }}
            <span @click="incrementQuantity" v-if="quantity !== 0">+</span>
        </button>
    </div>
</template>

<style lang="scss" scoped>
.card {
    display: flex;
    flex-direction: column;
    min-height: 100%;
    position: relative;
    overflow: hidden;

    &:hover {
        .add-to-cart {
            top: 0;
        }

        div.image-wrapper {
            border-color: white;
        }
    }

    .image-wrapper {
        overflow: clip;
        width: 100%;
        height: 8.75vw;
        border: var(--second-color) .1vw solid;
        box-sizing: border-box;
        transition: border-color .3s ease;

        img {
            width: 100%;
        }
    }

    .content {
        flex-grow: 2;
        display: flex;
        flex-direction: column;

        h3 {
            margin-top: .52vw;
            flex-grow: 1;
            margin-bottom: .3vw;
        }

        span {
            font-weight: 700;
            font-size: --h3-font-size;
            color: var(--second-color);
        }
    }

    .add-to-cart {
        cursor: pointer;
        border: .11vw var(--primary-color) solid;
        background-color: var(--primary-color);
        padding: .22vw .11vw;
        color: var(--back-color);
        transition: border-color .3s ease, background-color .3s ease, top .3s ease;
        position: relative;
        position: absolute;
        top: -5vw;
        left: 0;
        width: 100%;

        span {
            position: absolute;
            font-size: var(--h3-font-size);
            color: var(--back-color);
            font-weight: 700;

            &:nth-child(1) {
                left: .3vw;
                top: .1vw;

            }

            &:nth-child(2) {
                right: .3vw;
                top: .1vw;
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

@media screen and (max-width: 450px) {
    .card {
        .image-wrapper {
            height: 43.78vw;
        }

        .add-to-cart {
            top: 0;
        }
    }
}
</style>