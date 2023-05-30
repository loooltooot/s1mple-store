<script setup lang="ts">
import iProduct from '../../Models/product';
import { Link } from '@inertiajs/vue3'

defineProps({ product: { type: Object as () => iProduct, required: true } })
</script>

<script lang="ts">
export default {
    data() {
        return {
            show: false
        }
    },
    methods: {
        toggleShow() {
            this.show = !this.show
        }
    }
}
</script>

<template>
    <div id="suprise">
        <Transition name="fly-down">
            <Link v-if="show" :href="'/products/' + product.id">
            <div class="card">
                <div class="img-wrapper">
                    <img :src="'storage/images/' + product.img" :alt="product.title">
                </div>
            </div>
            </Link>
        </Transition>
        <svg v-if="!show" width="166" height="237" viewBox="0 0 166 237" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M55.0134 152.699V135.464C55.0134 124.191 57.0729 115.953 61.192 110.75C65.3111 105.547 74.0912 99.4765 87.5323 92.5391C96.8544 87.5529 102.925 83.8674 105.743 81.4827C108.561 79.098 109.97 75.7377 109.97 71.4018C109.97 58.611 101.082 52.2157 83.3049 52.2157C75.0667 52.2157 68.563 54.2752 63.7935 58.3942C59.0241 62.2965 56.4226 69.7759 55.989 80.8323H0.381621C0.815207 55.6843 8.94494 36.0646 24.7708 21.9731C40.8135 7.88152 61.0836 0.835745 85.5812 0.835745C108.778 0.835745 127.856 6.90595 142.814 19.0464C157.99 31.1868 165.578 47.9882 165.578 69.4507C165.578 84.4094 161.892 95.8994 154.521 103.921C147.367 111.725 135.877 119.855 120.051 128.31C115.282 130.911 112.247 133.405 110.946 135.789C109.645 138.174 108.995 141.751 108.995 146.521V152.699H55.0134ZM106.393 228.143C99.8895 233.996 91.6514 236.923 81.6789 236.923C71.7065 236.923 63.4683 233.996 56.9645 228.143C50.4608 222.29 47.2089 214.593 47.2089 205.055C47.2089 195.516 50.4608 187.82 56.9645 181.966C63.4683 176.113 71.7065 173.186 81.6789 173.186C91.6514 173.186 99.8895 176.113 106.393 181.966C112.897 187.82 116.149 195.516 116.149 205.055C116.149 214.593 112.897 222.29 106.393 228.143Z"
                fill="black" />
        </svg>
        <div id="suprise-header">
            <Transition name="fly-down">
                <span v-if="show" class="headliner">{{ product.title }}</span>
            </Transition>
            <span v-if="!show" class="headliner">Не знаешь, какой вкус больше понравится?</span>
            <button @click="toggleShow" :style="`display: ${show ? 'none' : 'block'}`">узнать</button>
        </div>
    </div>
</template>

<style lang="scss" scoped>
div#suprise {
    background: linear-gradient(225deg, var(--second-color) 0%, var(--primary-color) 100%);
    padding: 0 20.05vw;
    padding-top: 1vw;
    padding-bottom: 1vw;
    overflow: clip;
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 9.11vw;
    box-sizing: border-box;

    svg {
        width: 8.65vw;
        height: 12.34vw;
    }

    div#suprise-header {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;

        span,
        button {
            color: #000;
            font-weight: 700;
        }

        span.headliner {
            display: block;
            font-size: var(--h2-font-size);
            text-shadow: 0px 0.1vw 0px #ffffff;
            width: 20.94vw;
        }

        button {
            cursor: pointer;
            border: #000 0.21vw solid;
            background: none;
            padding: 0.26vw 0.52vw 0.31vw;
            width: 9.01vw;
            text-align: left;
            transition: border-color 0.3s ease, background-color 0.3s ease;

            &:hover {
                border-color: white;
                background-color: white;
            }
        }
    }
}

div.card {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 100%;

    &:hover {
        div.img-wrapper {
            border-color: white;
        }
    }

    div.img-wrapper {
        height: 10vw;
        border: 0.1vw var(--primary-color) solid;
        overflow: clip;
        box-sizing: border-box;
        transition: border-color 0.3s ease;
        position: relative;
    }

    img {
        width: 8.75vw;
    }
}
</style>
