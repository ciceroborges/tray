<script setup>
import { ref } from 'vue';
import { Link, router, useForm } from '@inertiajs/vue3';
import ActionMessage from '@/Components/ActionMessage.vue';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const props = defineProps({
    user: Object,
    sales: Array,
});

const form = useForm({
    _method: 'PUT',
    name: props.user.name,
    email: props.user.email,
    photo: null,
});

const verificationLinkSent = ref(null);
const photoPreview = ref(null);
const photoInput = ref(null);

const updateProfileInformation = () => {
    if (photoInput.value) {
        form.photo = photoInput.value.files[0];
    }

    form.post(route('user-profile-information.update'), {
        errorBag: 'updateProfileInformation',
        preserveScroll: true,
        onSuccess: () => clearPhotoFileInput(),
    });
};

const sendEmailVerification = () => {
    verificationLinkSent.value = true;
};

const selectNewPhoto = () => {
    photoInput.value.click();
};

const updatePhotoPreview = () => {
    const photo = photoInput.value.files[0];

    if (! photo) return;

    const reader = new FileReader();

    reader.onload = (e) => {
        photoPreview.value = e.target.result;
    };

    reader.readAsDataURL(photo);
};

const deletePhoto = () => {
    router.delete(route('current-user-photo.destroy'), {
        preserveScroll: true,
        onSuccess: () => {
            photoPreview.value = null;
            clearPhotoFileInput();
        },
    });
};

const clearPhotoFileInput = () => {
    if (photoInput.value?.value) {
        photoInput.value.value = null;
    }
};

const getMoney = (value) => {
    return (value / 100).toLocaleString('pt-BR', {
        style: 'currency',
        currency: 'BRL',
    });   
}

const getDate = (date) => {
    return new Date(date).toLocaleString('pt-BR', {
        timeZone: 'America/Sao_Paulo',
        day: 'numeric',
        month: 'numeric',
        year: 'numeric',
        hour: 'numeric',
        minute: 'numeric',
        second: 'numeric',
    });
}
</script>

<template>
    <FormSection @submitted="updateProfileInformation">
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
                                <span class="text-green-500 font-semibold">Nome:</span> {{ sale.nome }}
                            </div>
                            <div class="text-xs text-gray-300">
                                <span class="text-green-500 font-semibold">Email:</span> {{ sale.email }}
                            </div>
                            <div class="text-xs text-gray-300">
                                <span class="text-green-500 font-semibold">Comissão:</span> {{ getMoney(sale.comissao) }}
                            </div>
                            <div class="text-xs text-gray-300">
                                <span class="text-green-500 font-semibold">Valor:</span> {{ getMoney(sale.valor) }}
                            </div>
                            <div class="text-xs text-gray-300">
                                <span class="text-green-500 font-semibold">Data:</span> {{ getDate(sale.data) }}
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="value" value="Valor da Venda" />
                <TextInput
                    id="value"
                    v-model="form.value"
                    type="text"
                    class="mt-1 block w-full"
                    required
                />
                <InputError :message="form.errors.name" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <ActionMessage :on="form.recentlySuccessful" class="me-3">
                Salvo.
            </ActionMessage>

            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Salvar
            </PrimaryButton>
        </template>
    </FormSection>
</template>
