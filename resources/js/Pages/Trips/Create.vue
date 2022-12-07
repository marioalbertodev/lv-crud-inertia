<template>
    <Head title="Trips"/>
    <AuthenticatedLayout>
        <div class="mx-auto p-4 sm:p-6 lg:p-8">
            <div class="bg-white shadow-md rounded my-6 p-4">
                <form @submit.prevent="submitForm">
                    <div class="mb-3 flex flex-col">
                        <label for="text" class="mb-2 font-semibold">Title:</label>
                        <input type="text" v-model="form.title"  class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
                    </div>
                    <div class="mb-3 flex flex-col">
                        <label for="text" class="mb-2 font-semibold">Description:</label>
                        <input type="text" v-model="form.description" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
                    </div>
                    <button type="submit" class="text-white font-bold py-1 px-3 rounded bg-blue-500 hover:bg-blue-700">Guardar</button>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm } from "@inertiajs/inertia-vue3";

const form = useForm({
    title: null,
    description: null
})

function submitForm() {
    form.post(route('trips.store'))
}
</script>

<style scoped>

</style>
