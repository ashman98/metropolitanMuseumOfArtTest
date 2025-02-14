<template>
    <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm">
        <div class="h-56 w-full">
            <a :href="ensureValidUrl(product.objectWikidata_URL)" target="_blank" rel="noopener noreferrer">
                <img class="mx-auto h-full" :src="product.primaryImage" :alt="product.title"/>
            </a>

        </div>
        <div class="pt-6">
            <div class="mb-4 flex flex-col items-center justify-start gap-4">
                <span class="me-2 rounded bg-primary-100 px-2.5 py-0.5 text-xs font-medium text-primary-800 "> {{
                        product.artistDisplayName
                    }} </span>
                <p class="text-sm font-medium text-gray-700 ">{{ product.artistDisplayBio }}</p>
            </div>
            <a :href="ensureValidUrl(product.objectWikidata_URL)" class="text-lg font-semibold leading-tight text-gray-900 hover:underline ">{{
                    product.title
                }}</a>

            <p class="text-sm font-medium text-gray-500 ">{{ product.medium }}</p>
            <div class="mt-4 flex items-center justify-between gap-4">
                <p class="text-xl font-extrabold leading-tight text-gray-500 ">Begin date: {{
                        product.objectBeginDate
                    }}</p>
                <p></p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    methods: {
        ensureValidUrl(url) {
            if (!url) return '#';
            return url.startsWith('http') ? url : `https://${url}`;
        },
    },
    props: {
        product: {
            type: Object,
            required: true
        },
    }
};
</script>
