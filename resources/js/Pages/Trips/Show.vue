<template>
    <Head title="Trips"/>
    <AuthenticatedLayout>
        <div class="mx-auto p-4 sm:p-6 lg:p-8">
            <div class="bg-white shadow-md rounded my-6 p-4">
                <h2>{{ trip.title }}</h2>
                <h4>{{ trip.description }}</h4>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";

defineProps(['trip']);
</script>

<style scoped>

</style>
