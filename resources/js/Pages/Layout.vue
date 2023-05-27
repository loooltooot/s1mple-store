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
        <h1>S1mple-Store</h1>
        </Link>
        <Link href="/cart">Корзина {{ cartQuantity === 0 ? '' : cartQuantity }}</Link>
    </header>
    <main>
        <slot />
    </main>
</template>