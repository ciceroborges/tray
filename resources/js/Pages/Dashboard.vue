<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
</script>

<template>
    <AppLayout title="Tray | Vendas">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Vendas
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-8">Sales Data</h1>
        <div class="overflow-x-auto">
            <table class="table-auto w-full border-collapse">
                <thead>
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Product</th>
                        <th class="px-4 py-2">Price</th>
                        <th class="px-4 py-2">Quantity</th>
                        <th class="px-4 py-2">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-gray-800">
                        <td class="border px-4 py-2">1</td>
                        <td class="border px-4 py-2">Product A</td>
                        <td class="border px-4 py-2">$100</td>
                        <td class="border px-4 py-2">5</td>
                        <td class="border px-4 py-2">$500</td>
                    </tr>
                    <tr class="bg-gray-700">
                        <td class="border px-4 py-2">2</td>
                        <td class="border px-4 py-2">Product B</td>
                        <td class="border px-4 py-2">$150</td>
                        <td class="border px-4 py-2">3</td>
                        <td class="border px-4 py-2">$450</td>
                    </tr>
                    <!-- More rows here -->
                </tbody>
            </table>
        </div>
    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
