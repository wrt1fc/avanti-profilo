<script setup>
import { computed } from 'vue';
import AvantiIcon from './avanti_icon.vue';

const props = defineProps({
    /** primary — заливка акцентом; outline — обводка; ghost — нейтральная рамка */
    variant: { type: String, default: 'primary' },
    /** sm — 36px, md — 44px */
    size: { type: String, default: 'md' },
    /** Если задан href — рендерится ссылка */
    href: { type: String, default: null },
    type: { type: String, default: 'button' },
    icon: { type: String, default: null },
    block: { type: Boolean, default: false },
    disabled: { type: Boolean, default: false },
});

const tag = computed(() => (props.href && !props.disabled ? 'a' : 'button'));

const classes = computed(() => [
    'av-btn',
    `av-btn--${props.variant}`,
    `av-btn--${props.size}`,
    { 'av-btn--block': props.block },
]);
</script>

<template>
    <component
        :is="tag"
        :class="classes"
        :href="tag === 'a' ? href : undefined"
        :type="tag === 'button' ? type : undefined"
        :disabled="tag === 'button' ? disabled : undefined"
    >
        <AvantiIcon v-if="icon" :name="icon" :size="18" class="av-btn__icon" />
        <span class="av-btn__label"><slot /></span>
    </component>
</template>

<style scoped>
.av-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 0 18px;
    border-radius: var(--av-radius-sm);
    border: 1.5px solid transparent;
    font-weight: 600;
    font-size: 14px;
    line-height: 1;
    white-space: nowrap;
    cursor: pointer;
    transition:
        background-color var(--av-dur-fast) var(--av-ease),
        border-color var(--av-dur-fast) var(--av-ease),
        color var(--av-dur-fast) var(--av-ease);
}

.av-btn--md {
    height: 44px;
}

.av-btn--sm {
    height: 36px;
    padding: 0 14px;
}

.av-btn--block {
    display: flex;
    width: 100%;
}

.av-btn--primary {
    background: var(--av-accent);
    color: #fff;
}

.av-btn--primary:hover {
    background: var(--av-accent-hover);
}

.av-btn--outline {
    background: var(--av-surface);
    border-color: var(--av-accent);
    color: var(--av-accent);
}

.av-btn--outline:hover {
    background: var(--av-accent-soft);
}

.av-btn--ghost {
    background: var(--av-surface);
    border-color: var(--av-border);
    color: var(--av-text);
}

.av-btn--ghost:hover {
    border-color: var(--av-border-strong);
}

.av-btn:disabled {
    opacity: 0.5;
    cursor: not-allowed;
}

.av-btn__icon {
    margin-left: -2px;
}
</style>
