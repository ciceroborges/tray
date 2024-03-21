<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import DangerButton from '@/Components/DangerButton.vue';
import DialogModal from '@/Components/DialogModal.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';

const props = defineProps({
    seller: Object,
});

const confirmingSellerDeletion = ref(false);

const form = useForm({
    _method: 'DELETE',
});

const destroySeller = () => {
    form.delete(`seller/${props.seller.id}`, {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onFinish: ()  => form.reset(),
    });
};

const confirmSellerDeletion = () => {
    confirmingSellerDeletion.value = true;
};

const closeModal = () => {
    confirmingSellerDeletion.value = false;
};
</script>

<template>
    <DangerButton @click="confirmSellerDeletion">
        Excluir
    </DangerButton>

    <!-- Delete Seller Confirmation Modal -->
    <DialogModal :show="confirmingSellerDeletion" @close="closeModal">
        <template #title>
            Excluir vendedor(a)
        </template>

        <template #content>
            Tem certeza de que deseja excluir o(a) vendedor(a)? 
            <br>
            <br>
            Ao fazer isso todas as vendas atreladas a ele(a) serão excluídas.
        </template>

        <template #footer>
            <SecondaryButton @click="closeModal">
                Cancelar
            </SecondaryButton>

            <DangerButton
                class="ms-3"
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
                @click="destroySeller"
            >
                Excluir vendedor(a)
            </DangerButton>
        </template>
    </DialogModal>
</template>
