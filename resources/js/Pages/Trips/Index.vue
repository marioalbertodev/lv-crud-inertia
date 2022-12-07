<template>
    <Head title="Trips"/>
    <AuthenticatedLayout>
        <div class="mx-auto p-4 sm:p-6 lg:p-8">
            <div class="bg-white shadow-md rounded my-6">
                <Link :href="route('trips.create')" class="text-white font-bold py-1 px-3 m-3 rounded bg-blue-500 hover:bg-blue-700 float-right">Create trip</Link>
                <table class="text-left w-full border-collapse">
                    <thead>
                    <tr>
                        <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Title</th>
                        <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="hover:bg-grey-lighter" v-for="trip in trips" :key="trip.id">
                        <td class="py-4 px-6 border-b border-grey-light">{{ trip.title }}</td>
                        <td class="py-4 px-6 border-b border-grey-light">
                            <Link :href="route('trips.show', trip.id)" class="text-white font-bold py-1 px-3 mx-1 rounded text-xs bg-blue-400 hover:bg-blue-600">View</Link>
                            <Link :href="route('trips.edit', trip.id)" class="text-white font-bold py-1 px-3 mx-1 rounded text-xs bg-green-400 hover:bg-green-600">Edit</Link>
                            <button class="text-white font-bold py-1 px-3 mx-1 rounded text-xs bg-red-400 hover:bg-red-600" @click="questionDelete(trip.id)">Delete</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <Modal :show="confirmDelete" @close="closeModal">
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900">
                    Are you sure your want to delete your account?
                </h2>
                <div class="mt-6 flex justify-end">
                    <button
                        class="text-white font-bold py-1 px-3 ml-3 rounded bg-gray-500 hover:bg-gray-700 float-right"
                        @click="closeModal">Cancel</button>
                    <button
                        class="text-white font-bold py-1 px-3 ml-3 rounded bg-red-500 hover:bg-red-700 float-right"
                        @click="deleteTrip">Delete Trip</button>
                </div>
            </div>
        </Modal>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Modal from '@/Components/Modal.vue';
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import {ref} from "vue";
import {Inertia} from "@inertiajs/inertia";

defineProps(['trips']);

const confirmDelete = ref(false);
const tripToDelete = ref(null);

function questionDelete(tripId) {
    confirmDelete.value = true
    tripToDelete.value = tripId
}

function deleteTrip() {
    Inertia.delete(route('trips.destroy', tripToDelete.value), {
        onSuccess: () => closeModal()
    })
}

function closeModal() {
    confirmDelete.value = false
}
</script>

<style scoped>

</style>
