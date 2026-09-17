<script setup>
import { computed } from 'vue';
import AvantiCard from './avanti_card.vue';
import AvantiButton from './avanti_button.vue';
import AvantiDataRow from './avanti_data_row.vue';
import AvantiCopyField from './avanti_copy_field.vue';
import { formatEuro } from '../composables/use_currency.js';

const props = defineProps({
    user: { type: Object, required: true },
    editHref: { type: String, default: null },
    /** compact — короткая версия (только фамилия/имя) для правой колонки */
    compact: { type: Boolean, default: false },
});

const rows = computed(() => {
    const base = [
        { label: 'Cognome', value: props.user.company },
        { label: 'Nome', value: `${props.user.firstName} ${props.user.lastName}` },
    ];
    if (props.compact) return base;
    return [
        ...base,
        { label: 'Email', value: props.user.email },
        { label: 'Importo approvato', value: formatEuro(props.user.approvedAmount) },
        { label: 'Tipo di documento', value: props.user.documentType },
        { label: 'Tipo di documento', value: props.user.documentNumber },
    ];
});
</script>

<template>
    <AvantiCard class="av-personal" :class="{ 'av-personal--compact': compact }">
        <header class="av-personal__head">
            <h2 class="av-personal__title">Dati personali</h2>
            <AvantiButton v-if="!compact && editHref" :href="editHref" variant="ghost" size="sm">Modifica nome</AvantiButton>
        </header>

        <dl class="av-personal__list">
            <AvantiDataRow v-for="(row, i) in rows" :key="i" :label="row.label" :value="row.value" />
        </dl>

        <AvantiCopyField v-if="!compact" class="av-personal__iban" label="IBAN" :value="user.iban" />
    </AvantiCard>
</template>

<style scoped>
.av-personal__head {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
    margin-bottom: 12px;
}

.av-personal__title {
    font-size: 15px;
    font-weight: 600;
}

.av-personal__list {
    margin: 0;
}

.av-personal__iban {
    margin-top: 6px;
}

.av-personal--compact .av-personal__head {
    margin-bottom: 4px;
}

@media (max-width: 767px) {
    .av-personal__head {
        margin-bottom: 16px;
    }

    .av-personal__title {
        font-size: 17px;
    }

    .av-personal__iban {
        margin-top: 4px;
    }
}
</style>
