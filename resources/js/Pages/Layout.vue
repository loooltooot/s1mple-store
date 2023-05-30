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
        },
    },
    mounted() {
        window.addEventListener('scroll', this.handleScroll)
        this.$store.dispatch('getQuantity')
        this.$store.dispatch('getLoggedIn')
    }
}
</script>

<template>
    <header :class="headerClass">
        <Link href="/">
        <svg class="header-logo" width="64" height="52" viewBox="0 0 64 52" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M24.0927 51.5272V26.5538H7C7 26.5538 10.5144 6 32.0266 6" stroke="#3BD055" stroke-width="10.6496"
                stroke-miterlimit="10" />
            <path d="M39.9073 51.5272V26.5538H57C57 26.5538 53.5389 6 32.0266 6" stroke="#3BD055" stroke-width="10.6496"
                stroke-miterlimit="10" />
        </svg>
        </Link>
        <div class="links">
            <Link v-if="!this.$store.state.loggedIn" href="/login">
            войти
            </Link>
            <Link v-if="!this.$store.state.loggedIn" href="/signup" class="focused-button">
            зарегистрироваться
            </Link>
            <Link v-if="this.$store.state.loggedIn" href="/auth/logout">
            выйти
            </Link>
            <Link href="/cart">Корзина {{ cartQuantity === 0 || !this.$store.state.loggedIn ? '' : cartQuantity }}</Link>
        </div>
    </header>
    <main>
        <slot />
    </main>
    <footer>
        <Link href="/">
        <svg class="footer-logo" width="461" height="222" viewBox="0 0 461 222" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path d="M172.46 322.169V138.865H47C47 138.865 72.7955 -12 230.695 -14" stroke="black" stroke-width="78.1682"
                stroke-miterlimit="10" />
            <path d="M288.54 322.169V138.865H414C414 138.865 388.595 -12 230.696 -14" stroke="black" stroke-width="78.1682"
                stroke-miterlimit="10" />
        </svg>
        </Link>
        <div id="footer-content">
            <span id="disclaimer">чрезмерное употребление комбучи вредит вашему здоровью</span>
            <div id="contacts">
                <span>ИП Грибко В.Е.</span>
                <span>г. Тыгда, ул. Грибная, 146</span>
                <span>+7 (8412) 33-33-33</span>
                <span>grib.ko@yandex.ru</span>
            </div>
        </div>
        <nav>
            <ul>
                <li><a href="/products">товары</a></li>
                <li><a href="/stores">магазины</a></li>
                <li><a href="/shipping">доставка</a></li>
                <li><a href="/factory">производство</a></li>
                <li><a href="/franchise">франшиза</a></li>
            </ul>
        </nav>
    </footer>
</template>

<style lang="scss" scoped>
svg.header-logo {
    margin-top: .2vw;
    margin-bottom: .2vw;
    width: 4vw;
    height: 4vw;
}

svg.footer-logo {
    width: 24.01vw;
    height: 11.56vw;
}

.links {
    display: flex;
    column-gap: .94vw;
    align-items: center;
}
</style>