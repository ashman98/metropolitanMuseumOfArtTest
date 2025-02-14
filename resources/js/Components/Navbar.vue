<template>
    <nav class="py-5 border-b-default bg-gray-900 border-solid border-gray-200 z-10 w-full" id="topnav">
        <div class="mx-auto max-w-7xl lg:px-8">
            <form @submit.prevent="handleSubmit" class="w-full flex flex-col lg:flex-row">
                <div class="flex justify-between lg:hidden px-4">
                    <a href="/" class="flex items-center">
                        <span class="text-2xl font-bold text-gray-200">Museum</span>
                    </a>
                    <button @click="toggleNavbar" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>

                <div :class="['hidden w-full lg:flex justify-between max-lg:bg-white py-5 max-lg:mt-1 max-lg:px-4 max-lg:shadow-lg max-lg:shadow-gray-200 max-lg:h-auto max-lg:overflow-auto transition-all duration-500 delay-200', { 'hidden': !isNavbarOpen }]" id="navbar">
                    <a href="/" class="hidden lg:flex items-center">
                        <span class="text-2xl font-bold text-gray-200">Museum</span>
                    </a>

                    <div class="flex items-center gap-5 lg:justify-center max-lg:mt-4">
                        <div class="relative w-full">
                            <input
                                type="text"
                                placeholder="Search..."
                                v-model="query"
                                class="w-full pl-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            />
                        </div>
                        <div class="w-full mx-auto">
                            <select v-model="department_id" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="" selected disabled>Select...</option>
                                <option v-for="item in result" :key="item.external_id" :value="item.external_id">
                                    {{ item.name }}
                                </option>
                            </select>
                        </div>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Search</button>

                    </div>
                </div>
            </form>
        </div>
    </nav>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            result: [],
            isNavbarOpen: false,
            title: "1",
            query: "",
            department_id: "",
        };
    },
    mounted() {
        axios
            .get("/getDepartments")
            .then((response) => {
                this.result = response.data;
            })
            .catch((error) => {
                console.error(error);
            });
    },
    methods: {
        toggleNavbar() {
            this.isNavbarOpen = !this.isNavbarOpen;
        },
        handleSubmit() {
            const params = new URLSearchParams();
            if (this.query) params.append('query', this.query);
            if (this.department_id) params.append('department_id', this.department_id);
            if (this.title) params.append('title', this.title)
            window.location.href = `/search/results?${params.toString()}`;
        }
    },
};
</script>
