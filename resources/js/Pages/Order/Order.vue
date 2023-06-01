<script setup lang="ts">
import iProduct from '../../Models/product';
import Layout from '../Layout.vue';
import IMask from 'imask'
import axios from 'axios';

defineProps({ cart: Array<iProduct>, sum: Number })
</script>

<script lang="ts">
export default {
    mounted() {
        const phoneMask = IMask(
            document.getElementById('tel'), {
            mask: '+{7} (000) 000-00-00'
        });
    },
}
</script>

<template>
    <Layout>
        <section>
            <h2 class="hugged">Заказ на сумму <span class="sum">{{ sum }}₽</span></h2>
            <form class="hugged" action="/order/add" method="POST">
                <input required type="text" name="name" placeholder="Имя">
                <input required type="text" name="surname" placeholder="Фамилия">
                <input required type="text" name="tel" id="tel" placeholder="Номер телефона">
                <input required type="text" name="city" placeholder="Город">
                <input required type="text" name="street" placeholder="Улица">
                <input required type="text" name="construction" placeholder="Дом">
                <input required type="text" name="apartment" placeholder="Квартира">
                <input type="submit" value="Подтвердить" class="button">

                <input type="hidden" name="sum" :value="sum">
            </form>
        </section>
    </Layout>
</template>

<style lang="scss" scoped>
span.sum {
    font-size: 1em;
    color: var(--primary-color);
    text-shadow: none;
}

form {
    width: 30vw;
    row-gap: .52vw;

    input[type="submit"] {
        margin-top: 1vw;
    }
}
</style>