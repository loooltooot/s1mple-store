<script setup>
import { Link } from "@inertiajs/vue3";
</script>

<script>
export default {
    data() {
        return {
            scrollPosition: 0,
        }
    },
    methods: {
        handleScroll() {
            this.scrollPosition = window.scrollY
        },
    },
    computed: {
        headerClass() {
            return {
                'scrolled': this.scrollPosition > 0,
            }
        },
        cartQuantity() {
            return this.$store.state.cartQuantity
        }
    },
    mounted() {
        window.addEventListener('scroll', this.handleScroll)
        this.$store.dispatch('getQuantity')
    }
}
</script>

<template>
    <header :class="headerClass">
        <Link href="/">
        <svg width="64" height="52" viewBox="0 0 64 52" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M24.0927 51.5272V26.5538H7C7 26.5538 10.5144 6 32.0266 6" stroke="#3BD055" stroke-width="10.6496"
                stroke-miterlimit="10" />
            <path d="M39.9073 51.5272V26.5538H57C57 26.5538 53.5389 6 32.0266 6" stroke="#3BD055" stroke-width="10.6496"
                stroke-miterlimit="10" />
        </svg>
        </Link>
        <Link href="/cart">Корзина {{ cartQuantity === 0 ? '' : cartQuantity }}</Link>
    </header>
    <main>
        <slot />
    </main>
</template>

<style lang="scss">
svg {
    margin-top: .2vw;
    margin-bottom: .2vw;
    width: 4vw;
    height: 4vw;
}
</style>