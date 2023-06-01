<script setup lang="ts">
import iOrder from '../../Models/order';

defineProps({ order: Object as () => iOrder })
</script>

<template>
    <div>
        <h3>Заказ №{{ order?.id }}</h3>
        <p>{{ order?.details }}</p>
        <span class="date">Заказ создан: {{ new Date(order?.created_at).toLocaleDateString('ru-RU', {
            weekday: 'long', year: 'numeric',
            month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric'
        }) }}</span>
    </div>
</template>

<style lang="scss" scoped>
h3 {
    font-size: var(--h3-font-size);
    color: var(--primary-color);
}

p {
    white-space: pre-line;
    line-height: 1.25;
}
</style>