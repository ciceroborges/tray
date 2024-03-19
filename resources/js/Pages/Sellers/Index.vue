<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import { Link } from '@inertiajs/vue3';
// import Welcome from '@/Components/Welcome.vue';
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
<!--- more free and premium Tailwind CSS components at https://tailwinduikit.com/ --->

            <div class="bg-white  dark:bg-gray-800 py-4 md:py-7 px-4 md:px-8 xl:px-10">
                <div class="sm:flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="max-w-xl text-sm text-gray-600 dark:text-gray-400">
                            Listagem de Vendedores:
                        </div>
                    </div>
                    <PrimaryButton>
                    Criar Vendedor
                    </PrimaryButton>
                    <!-- <button onclick="popuphandler(true)" class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-3 bg-indigo-700 hover:bg-indigo-600 focus:outline-none rounded">
                        <p class="text-sm font-medium leading-none text-white">Add Task</p>
                    </button> -->
                </div>
                <div class="overflow-x-auto py-8">
                    <!-- <div class="py-6"><div class="border-t border-gray-200 dark:border-gray-700"></div></div> -->
                    <table class="w-full whitespace-nowrap">
                        <tbody>
                            <tr class="border-b border-gray-200 dark:border-gray-700 p-10">
                                <td class="py-2 ">
                                    <div class="ml-5">
                                        <div class="max-w-xl text-sm text-gray-600 dark:text-gray-400 ">
                                            #ID
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="ml-5">
                                        <div class="max-w-xl text-sm text-gray-600 dark:text-gray-400">
                                            Nome
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="ml-5">
                                        <div class="max-w-xl text-sm text-gray-600 dark:text-gray-400">
                                            E-mail  
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="ml-5">
                                        <div class="max-w-xl text-sm text-gray-600 dark:text-gray-400">
                                            Ação
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="pt-4 border-b border-gray-200 dark:border-gray-700 p-10">
                                <td class="py-4 ">
                                    <div class="ml-5">
                                        <div class="max-w-xl text-sm text-gray-600 dark:text-gray-400">
                                            #1
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="ml-5">
                                        <div class="max-w-xl text-sm text-gray-600 dark:text-gray-400">
                                            Cícero Borges
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="ml-5">
                                        <div class="max-w-xl text-sm text-gray-600 dark:text-gray-400">
                                            ciceropborges@gmail.com
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="ml-5">
                                        <div class="max-w-xl text-sm text-gray-600 dark:text-gray-400">
                                            <Link :href="route('sales', {email: 'ciceropborges@gmail.com'})">
                                                <SecondaryButton>
                                                    Gerenciar Vendas
                                                </SecondaryButton>
                                            </Link>
                                            
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="pt-4  border-b border-gray-200 dark:border-gray-700 p-10">
                                <td class="py-4 ">
                                    <div class="ml-5">
                                        <div class="max-w-xl text-sm text-gray-600 dark:text-gray-400">
                                            #2
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="ml-5">
                                        <div class="max-w-xl text-sm text-gray-600 dark:text-gray-400">
                                            Luizito da Silva
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="ml-5">
                                        <div class="max-w-xl text-sm text-gray-600 dark:text-gray-400">
                                            luzito-da-silva@gmail.com
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="ml-5">
                                        <div class="max-w-xl text-sm text-gray-600 dark:text-gray-400">
                                            <SecondaryButton>
                                            Gerenciar Vendas
                                            </SecondaryButton>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
                    <!-- <Welcome /> -->
                </div>
            </div>
        </div>
    </AppLayout>
</template>
