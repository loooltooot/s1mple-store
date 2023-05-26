<script setup>
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <header>
        <h1>S1mple-Store</h1>
        <Link href="/cart">Корзина</Link>
    </header>
    <main>
        <slot />
    </main>
</template>