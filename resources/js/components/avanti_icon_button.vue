<script setup>
import { computed } from 'vue';
import AvantiIcon from './avanti_icon.vue';

const props = defineProps({
    icon: { type: String, required: true },
    /** Обязательная подпись для скринридеров — у кнопки нет текста */
    label: { type: String, required: true },
    /** ghost — без рамки; outline — с рамкой */
    variant: { type: String, default: 'ghost' },
    /** sm — 28px, md — 36px */
    size: { type: String, default: 'md' },
    /** Если задан href — рендерится ссылка */
    href: { type: String, default: null },
    iconSize: { type: Number, default: 18 },
    strokeWidth: { type: Number, default: 1.75 },
    disabled: { type: Boolean, default: false },
});

const tag = computed(() => (props.href && !props.disabled ? 'a' : 'button'));
</script>

<template>
    <component
        :is="tag"
        class="av-icon-btn"
        :class="[`av-icon-btn--${variant}`, `av-icon-btn--${size}`]"
        :href="tag === 'a' ? href : undefined"
        :type="tag === 'button' ? 'button' : undefined"
        :disabled="tag === 'button' ? disabled : undefined"
        :aria-label="label"
    >
        <AvantiIcon :name="icon" :size="iconSize" :stroke-width="strokeWidth" />
        <slot />
    </component>
</template>

<style scoped>
.av-icon-btn {
    position: relative;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 0;
    border: 1px solid transparent;
    border-radius: var(--av-radius-sm);
    background: transparent;
    color: var(--av-text-secondary);
    cursor: pointer;
    flex-shrink: 0;
    transition:
        background-color var(--av-dur-fast) var(--av-ease),
        border-color var(--av-dur-fast) var(--av-ease);
}

.av-icon-btn--sm {
    width: 28px;
    height: 28px;
}

.av-icon-btn--md {
    width: 36px;
    height: 36px;
}

.av-icon-btn--ghost:hover:not(:disabled) {
    background: var(--av-accent-soft);
}

.av-icon-btn--outline {
    border-color: var(--av-border);
    background: var(--av-surface);
}

.av-icon-btn--outline:hover:not(:disabled) {
    border-color: var(--av-border-strong);
}

.av-icon-btn:disabled {
    cursor: default;
    opacity: 0.6;
}
</style>
