<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import Destroy from '@/Pages/Seller/Partials/Destroy.vue';
import { Link } from '@inertiajs/vue3';
import { helpers } from '@/helpers.js';

const props = defineProps({
    sellers: Array
});

</script>

<template>
    <AppLayout title="Tray | Vendedores">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Vendedores
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="sm:px-6 w-full">
                        <div class="bg-white  dark:bg-gray-800 py-4 md:py-7 px-4 md:px-8 xl:px-10">
                            <div class="sm:flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="max-w-xl text-sm text-gray-600 dark:text-gray-400">
                                        Listagem de Vendedores:
                                    </div>
                                </div>
                                <Link :href="route('seller.create')">
                                    <PrimaryButton>
                                        Criar Vendedor(a)
                                    </PrimaryButton>
                                </Link>
                            </div>
                            <div class="overflow-x-auto py-8">
                                <table class="w-full whitespace-nowrap">
                                    <tbody>
                                        <tr class="border-b border-gray-200 dark:border-gray-700 p-10">
                                            <td class="py-2 ">
                                                <div class="ml-0">
                                                    <div class="max-w-xl text-sm text-gray-600 dark:text-gray-400 ">
                                                        #ID
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="ml-0">
                                                    <div class="max-w-xl text-sm text-gray-600 dark:text-gray-400">
                                                        Nome
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="ml-0">
                                                    <div class="max-w-xl text-sm text-gray-600 dark:text-gray-400">
                                                        E-mail  
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="ml-0 text-center">
                                                    <div class="max-w-xl text-sm text-gray-600 dark:text-gray-400">
                                                        Total em Comissões
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="ml-0 text-center">
                                                    <div class="max-w-xl text-sm text-gray-600 dark:text-gray-400">
                                                        Total em Vendas
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="ml-0 text-center">
                                                    <div class="max-w-xl text-sm text-gray-600 dark:text-gray-400">
                                                        Vendas Feitas
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="ml-0">
                                                    <div class="max-w-xl text-sm text-gray-600 dark:text-gray-400">
                                                        Ações
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr v-for="(seller, index) in sellers" :key ="index" class="pt-4 border-b border-gray-200 dark:border-gray-700 p-10">
                                            <td class="py-4 ">
                                                <div class="ml-0">
                                                    <div class="max-w-xl text-sm text-gray-600 dark:text-gray-400">
                                                        #{{ seller.id }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="ml-0">
                                                    <div class="max-w-xl text-sm text-gray-600 dark:text-gray-400">
                                                        {{ seller.name }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="ml-0">
                                                    <div class="max-w-xl text-sm text-gray-600 dark:text-gray-400">
                                                        {{ seller.email }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="ml-0 text-center">
                                                    <div class="max-w-xl text-sm text-gray-600 dark:text-gray-400">
                                                        {{ helpers.getMoney(seller.total_commissions) }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="ml-0 text-center">
                                                    <div class="max-w-xl text-sm text-gray-600 dark:text-gray-400">
                                                        {{  helpers.getMoney(seller.total_sales) }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="ml-0 text-center">
                                                    <div class="max-w-xl text-sm text-gray-600 dark:text-gray-400">
                                                        {{ seller.sales.length }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="ml-0">
                                                    <div class="max-w-xl text-sm text-gray-600 dark:text-gray-400">
                                                        <Link :href="route('sale', {id: seller.id})">
                                                            <SecondaryButton>
                                                                Vendas
                                                            </SecondaryButton>
                                                        </Link>
                                                        &nbsp;
                                                        <Destroy :seller="seller"/>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
