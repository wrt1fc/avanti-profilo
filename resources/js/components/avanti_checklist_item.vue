<script setup>
import { computed } from 'vue';
import AvantiIcon from './avanti_icon.vue';

const props = defineProps({
    title: { type: String, required: true },
    icon: { type: String, default: 'check' },
    /** done | current | pending */
    status: { type: String, default: 'pending' },
    href: { type: String, default: null },
});

const subtitle = computed(() => {
    if (props.status === 'done') return 'Completato';
    if (props.status === 'current') return 'Step attuale • Azione richiesta';
    return 'In attesa';
});

const tag = computed(() => (props.href && props.status !== 'pending' ? 'a' : 'div'));
</script>

<template>
    <component :is="tag" :href="tag === 'a' ? href : undefined" class="av-check-item" :class="`av-check-item--${status}`">
        <span class="av-check-item__icon">
            <AvantiIcon :name="icon" :size="20" :stroke-width="1.75" />
        </span>

        <span class="av-check-item__text">
            <span class="av-check-item__title">{{ title }}</span>
            <span class="av-check-item__subtitle">{{ subtitle }}</span>
        </span>

        <span class="av-check-item__state">
            <AvantiIcon :name="status === 'done' ? 'check' : 'arrow-right'" :size="14" :stroke-width="2.5" />
        </span>
    </component>
</template>

<style scoped>
.av-check-item {
    display: flex;
    align-items: center;
    gap: 16px;
    padding: 14px 20px;
    border-top: 1px solid var(--av-border);
    color: inherit;
    transition: background-color var(--av-dur-fast) var(--av-ease);
}

a.av-check-item:hover {
    background: var(--av-bg);
}

.av-check-item--current {
    background: var(--av-accent-soft);
}

a.av-check-item--current:hover {
    background: #dfeef2;
}

.av-check-item__icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    flex-shrink: 0;
}

.av-check-item--done .av-check-item__icon {
    background: var(--av-accent);
    color: #fff;
    box-shadow: var(--av-shadow-accent);
}

.av-check-item--current .av-check-item__icon {
    background: var(--av-surface);
    border: 1.5px solid var(--av-accent);
    color: var(--av-accent);
}

.av-check-item--pending .av-check-item__icon {
    background: var(--av-surface-muted);
    color: var(--av-text-muted);
}

.av-check-item__text {
    display: flex;
    flex: 1 1 auto;
    flex-direction: column;
    gap: 2px;
    min-width: 0;
}

.av-check-item__title {
    font-size: 14px;
    font-weight: 600;
}

.av-check-item__subtitle {
    font-size: 12px;
    color: var(--av-accent);
}

.av-check-item--pending .av-check-item__title {
    font-weight: 500;
    color: var(--av-text-secondary);
}

.av-check-item--pending .av-check-item__subtitle {
    color: var(--av-text-muted);
}

.av-check-item__state {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 24px;
    height: 24px;
    border-radius: 50%;
    flex-shrink: 0;
}

.av-check-item--done .av-check-item__state,
.av-check-item--current .av-check-item__state {
    background: var(--av-accent);
    color: #fff;
}

.av-check-item--pending .av-check-item__state {
    background: var(--av-surface-muted);
    color: var(--av-text-muted);
}

@media (max-width: 767px) {
    .av-check-item {
        padding: 12px 16px;
    }
}
</style>
