<template>
    <Layout>

        <div class="bg-gray-50 py-8 antialiased  md:py-12">
            <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
                <h2 class="my-3 text-4xl text-center font-semibold text-gray-900">Art works</h2>
            </div>
        </div>
    </Layout>
</template>

<script>
import Layout from '@/Layouts/Layout.vue';
import ProductCard from "@/Components/ProductCard.vue";

export default {
    components: {
        ProductCard,
        Layout
    },
    props: {
        products: {
            type: Array,
            required: true
        }
    }
};
</script>
