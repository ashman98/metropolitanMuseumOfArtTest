<template>
    <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
        <ProductCard v-for="product in products" :key="product.id" :product="product" />
    </div>
</template>

<script>
import ProductCard from './ProductCard.vue';

export default {
    components: {
        ProductCard
    },
    props: {
        products: {
            type: Array,
            required: true
        }
    }
}
</script>
