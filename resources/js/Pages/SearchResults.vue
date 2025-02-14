<script setup>
import {defineProps, onMounted} from 'vue';
import Layout from "@/Layouts/Layout.vue";
import ProductGrid from "@/Components/ProductGrid.vue";

const props = defineProps({
    art_works: Array
});

onMounted(() => {
    console.log('art_works', props.art_works)
})

</script>

<template>
    <Layout>
        <div class="p-6 max-w-7xl mx-auto">
            <h1 class="text-2xl font-bold mb-4">Search result</h1>
            <div v-if="art_works.length" class="bg-white shadow-md rounded-lg p-4">
                <ProductGrid :products=art_works />
            </div>
            <p v-else class="text-gray-500">Nothing to find.</p>
        </div>
    </Layout>
</template>

<style scoped>
ul {
    list-style-type: none;
    padding: 0;
}
</style>
