<script setup>
defineProps({
    message: String,
});
</script>

<template>
    <div class="container text-center mt-5">
        <h1 class="display-4">Welcome to Laravel + Vue!</h1>
        <p class="lead">{{ message }}</p>
        <a href="/dashboard" class="btn btn-primary">Go to Dashboard</a>
    </div>
</template>
