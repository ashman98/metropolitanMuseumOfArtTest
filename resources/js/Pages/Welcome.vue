<template>
    <Layout>

        <div class="bg-gray-50 py-8 antialiased  md:py-12">
            <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
                <h2 class="my-3 text-xl font-semibold text-gray-900  sm:text-2xl">Art works</h2>
                <!-- Product Grid -->
                <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
                    <ProductCard v-for="product in products" :key="product.id" :product="product"/>
                </div>
                <!--                &lt;!&ndash; Show More Button &ndash;&gt;-->
                <!--                <div class="w-full text-center">-->
                <!--                    <button type="button"-->
                <!--                            class="rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100">-->
                <!--                        Show more-->
                <!--                    </button>-->
                <!--                </div>-->
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
