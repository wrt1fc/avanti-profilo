<script setup>
import { computed } from 'vue';
import AvantiIcon from './avanti_icon.vue';

const props = defineProps({
    label: { type: String, required: true },
    icon: { type: String, default: 'check' },
    /** done | current | pending */
    status: { type: String, default: 'pending' },
    /** Линия к предыдущему шагу (у первого — нет) */
    connector: { type: Boolean, default: true },
});

const iconName = computed(() => (props.status === 'done' ? 'check' : props.icon));
</script>

<template>
    <li class="av-step" :class="`av-step--${status}`">
        <span v-if="connector" class="av-step__line" aria-hidden="true"></span>
        <span class="av-step__dot">
            <AvantiIcon :name="iconName" :size="16" :stroke-width="2.5" />
        </span>
        <span class="av-step__label">{{ label }}</span>
    </li>
</template>

<style scoped>
.av-step {
    position: relative;
    display: flex;
    flex: 1 1 0;
    flex-direction: column;
    align-items: center;
    gap: 8px;
    min-width: 0;
}

/* Линия от центра предыдущей колонки до центра текущей; кружки лежат поверх */
.av-step__line {
    position: absolute;
    top: 15px;
    right: 50%;
    left: -50%;
    height: 2px;
    background: var(--av-border);
}

.av-step--done .av-step__line,
.av-step--current .av-step__line {
    background: var(--av-accent);
}

.av-step__dot {
    position: relative;
    z-index: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
    border-radius: 50%;
    border: 2px solid var(--av-border-strong);
    background: var(--av-surface-muted);
    color: var(--av-text-muted);
}

.av-step--done .av-step__dot {
    border-color: var(--av-accent);
    background: var(--av-accent);
    color: #fff;
}

.av-step--current .av-step__dot {
    border-color: var(--av-accent);
    background: var(--av-surface);
    color: var(--av-accent);
}

.av-step__label {
    font-size: 12px;
    font-weight: 600;
    color: var(--av-accent);
    white-space: nowrap;
}

.av-step--pending .av-step__label {
    font-weight: 400;
    color: var(--av-text-muted);
}

@media (max-width: 767px) {
    .av-step {
        gap: 6px;
    }

    .av-step__line {
        top: 11px;
    }

    .av-step__dot {
        width: 24px;
        height: 24px;
    }

    .av-step__dot :deep(.av-icon) {
        width: 13px;
        height: 13px;
    }

    .av-step__label {
        font-size: 11px;
    }
}
</style>
