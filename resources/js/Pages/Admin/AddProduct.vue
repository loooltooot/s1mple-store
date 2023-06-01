<script setup lang="ts">
import iProduct from '../../Models/product';
import Layout from '../Layout.vue';

defineProps({ product: Object as () => iProduct })
</script>

<template>
    <Layout>
        <section>
            <h2 class="hugged">{{ product ? 'Изменить продукт' : 'Добавить продукт' }}</h2>
            <form class="hugged" :action="product ? '/cms/products/edit/' + product?.id : '/cms/addproduct'" method="POST"
                enctype="multipart/form-data">
                <input required :value="product ? product?.title : ''" type="text" name="title" placeholder="Название">
                <input required :value="product ? product?.description : ''" type="text" name="description"
                    placeholder="Описание">
                <input required :value="product ? product?.price : ''" type="number" min="0" name="price"
                    placeholder="Цена">
                <input :required="product ? false : true" type="file" name="img" accept="image/png, image/jpeg">
                <input type="submit" value="Создать">
            </form>
        </section>
    </Layout>
</template>