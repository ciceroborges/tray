<script setup>
import { Link, useForm } from '@inertiajs/vue3';
import ActionMessage from '@/Components/ActionMessage.vue';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import MoneyInput from '@/Components/MoneyInput.vue';
import { helpers } from '@/helpers.js';

const props = defineProps({
    seller: Object,
    sales: Array,
});

const form = useForm({
    _method: 'POST',
    seller_id: props.seller.id,
    value: '0',
});

const storeSale = () => {
    // removendo mascara antes de enviar para a API
    form.value = parseInt(form.value.replace(/\D/g, ''))

    form.post(route('sale.store'), {
        errorBag: 'storeSale',
        preserveScroll: true,
        onSuccess: () => (form.value = '0'),
    });
};

</script>

<template>
    <FormSection @submitted="storeSale">
        <template #description>
            Para lançar uma nova venda, preencha o valor no formulário e clique em salvar.

            <div class="px-4 py-5 sm:p-6 bg-white dark:bg-gray-800 shadow sm:rounded-lg mt-6">

                <div class="max-w-xl text-sm text-gray-600 dark:text-gray-400">
                    Leve em consideração que as vendas mais recentes aparecerão sempre no topo desta lista:
                </div>
 
                <div v-for="(sale, index) in sales" :key="index" class="mt-5 space-y-6">
                    <div class="flex items-center">
                        <div class="text-xl text-gray-400">
                            #{{ sale.id }}
                        </div>
                        <div  class="ms-3">
                            <div class="text-xs text-gray-300">
                                <span class="text-green-500 font-semibold">Nome:</span> {{ sale.name }}
                            </div>
                            <div class="text-xs text-gray-300">
                                <span class="text-green-500 font-semibold">Email:</span> {{ sale.email }}
                            </div>
                            <div class="text-xs text-gray-300">
                                <span class="text-green-500 font-semibold">Comissão:</span> {{ helpers.getMoney(sale.commission) }}
                            </div>
                            <div class="text-xs text-gray-300">
                                <span class="text-green-500 font-semibold">Valor:</span> {{ helpers.getMoney(sale.value) }}
                            </div>
                            <div class="text-xs text-gray-300">
                                <span class="text-green-500 font-semibold">Data:</span> {{ helpers.getDate(sale.created_at) }}
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="seller_id" value="#ID do(a) Vendendor(a)" />
                <TextInput
                    id="seller_id"
                    v-model="form.seller_id"
                    type="number"
                    class="mt-1 block w-full"
                    required
                    disabled
                />
                <InputError :message="form.errors.seller_id" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="value" value="Valor da Venda" />
                <MoneyInput
                    id="value"
                    v-model="form.value"
                    class="mt-1 block w-full"
                    required
                />
                <InputError :message="form.errors.value" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <ActionMessage :on="form.recentlySuccessful" class="me-3">
                Salvo.
            </ActionMessage>
                
            <Link :href="route('seller')">
                <SecondaryButton>
                    Voltar
                </SecondaryButton>
            </Link>
            &nbsp;&nbsp;&nbsp;
            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Salvar
            </PrimaryButton>
        </template>
    </FormSection>
</template>
