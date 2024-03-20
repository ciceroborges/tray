<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import SectionBorder from '@/Components/SectionBorder.vue';
import ListAndForm from '@/Pages/Sale/ListAndForm.vue';

const props = defineProps({
    seller: Object,
    sales: Array,
});

</script>

<template>
    <AppLayout title="Profile">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Vendas de {{ seller.name }}
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <div>
                    <ListAndForm :seller="seller" :sales="sales" :user="$page.props.auth.user" />

                    <SectionBorder />
                </div>

            </div>
        </div>
    </AppLayout>
</template>
