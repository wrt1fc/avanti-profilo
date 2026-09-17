<script setup>
import AvantiIconButton from './avanti_icon_button.vue';
import { useClipboard } from '../composables/use_clipboard.js';

const props = defineProps({
    label: { type: String, required: true },
    value: { type: String, default: null },
    placeholder: { type: String, default: '-' },
});

const { copied, copy } = useClipboard();

function onCopy() {
    copy(props.value);
}
</script>

<template>
    <div class="av-copy-field">
        <span class="av-copy-field__label">{{ label }}</span>
        <div class="av-copy-field__box">
            <span class="av-copy-field__value" :class="{ 'av-copy-field__value--empty': !value }">
                {{ value || placeholder }}
            </span>
            <AvantiIconButton
                :icon="copied ? 'check' : 'copy'"
                :label="copied ? 'Copiato' : `Copia ${label}`"
                size="sm"
                class="av-copy-field__btn"
                :disabled="!value"
                @click="onCopy"
            />
        </div>
    </div>
</template>

<style scoped>
.av-copy-field {
    display: flex;
    flex-direction: column;
    gap: 6px;
}

.av-copy-field__label {
    font-size: 13px;
    color: var(--av-text-secondary);
}

.av-copy-field__box {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    height: 44px;
    padding: 0 12px 0 14px;
    border: 1px solid var(--av-border);
    border-radius: var(--av-radius-sm);
    background: var(--av-bg);
}

.av-copy-field__value {
    font-size: 14px;
    font-weight: 500;
    font-variant-numeric: tabular-nums;
}

.av-copy-field__value--empty {
    color: var(--av-text);
}

.av-copy-field__btn {
    color: var(--av-accent);
}

/* В макете иконка копирования всегда акцентная, даже при пустом IBAN */
.av-copy-field__btn:disabled {
    opacity: 1;
}
</style>
