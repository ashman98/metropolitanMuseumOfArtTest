<template>
    <div>
        <Navbar />
        <slot />
    </div>
</template>

<script>
import Navbar from '@/Components/Navbar.vue';

export default {
    components: {
        Navbar,
    },
};
</script>
