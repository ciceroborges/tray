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
        <!-- <template #title>
            Gerenciamento de Vendas:
        </template> -->

        <template #description>
            Para lançar uma nova venda, preencha o valor no formulário ao lado e clique em salvar.

   
            
            <!-- <div v-for="(sale, index) in sales" :key="index" class="mt-2 mb-2">
                {{ sale }}
            </div> -->

            <div class="px-4 py-5 sm:p-6 bg-white dark:bg-gray-800 shadow sm:rounded-lg mt-6">
   <div class="max-w-xl text-sm text-gray-600 dark:text-gray-400"> Leve em consideração que as vendas mais recentes aparecerão sempre no topo desta lista:  </div>
   <!-- Other Browser Sessions -->
   <div v-for="(sale, index) in sales" :key="index" class="mt-5 space-y-6">
      <div class="flex items-center">
         <div class="text-xl text-gray-400">
            #{{ sale.id }}
            <!-- <svg class="w-8 h-8 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
               <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25"></path>
            </svg> -->
         </div>
            <div  class="ms-3">


                <div class="text-xs text-gray-300"><span class="text-green-500 font-semibold">Nome:</span> {{ sale.nome }}</div>
                <div class="text-xs text-gray-300"><span class="text-green-500 font-semibold">Email:</span> {{ sale.email }}</div>
                <div class="text-xs text-gray-300"><span class="text-green-500 font-semibold">Comissão:</span> {{ getMoney(sale.comissao) }}</div>
                <div class="text-xs text-gray-300"><span class="text-green-500 font-semibold">Valor:</span> {{ getMoney(sale.valor) }}</div>
                <div class="text-xs text-gray-300"><span class="text-green-500 font-semibold">Data:</span> {{ getDate(sale.data) }}</div>
            
            </div>
            <br>
      </div>
   </div>


</div>
        </template>

        <template #form>
            <!-- Name -->
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
