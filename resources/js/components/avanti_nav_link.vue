<script setup>
import { Link } from '@inertiajs/vue3';
import AvantiIcon from './avanti_icon.vue';

defineProps({
    href: { type: String, required: true },
    icon: { type: String, required: true },
    label: { type: String, required: true },
    active: { type: Boolean, default: false },
    /** tab — пилюля в шапке (десктоп); bar — колонка иконка+текст (мобильная панель) */
    layout: { type: String, default: 'tab' },
});
</script>

<template>
    <Link
        :href="href"
        class="av-nav-link"
        :class="[`av-nav-link--${layout}`, { 'av-nav-link--active': active }]"
        :aria-current="active ? 'page' : undefined"
    >
        <AvantiIcon :name="icon" :size="layout === 'tab' ? 18 : 20" :stroke-width="1.75" />
        <span class="av-nav-link__label">{{ label }}</span>
    </Link>
</template>

<style scoped>
.av-nav-link {
    display: inline-flex;
    align-items: center;
    color: var(--av-text);
    font-weight: 500;
    transition:
        background-color var(--av-dur-fast) var(--av-ease),
        color var(--av-dur-fast) var(--av-ease);
}

.av-nav-link--tab {
    gap: 10px;
    height: 44px;
    padding: 0 20px;
    border-radius: var(--av-radius-md);
    background: var(--av-surface-nav);
    font-size: 15px;
}

.av-nav-link--tab:hover {
    background: var(--av-accent-soft);
}

.av-nav-link--tab.av-nav-link--active {
    background: var(--av-accent-soft);
    color: var(--av-accent);
}

.av-nav-link--bar {
    flex-direction: column;
    gap: 4px;
    min-width: 56px;
    padding: 4px 6px;
    font-size: 14px;
    color: var(--av-text);
}

.av-nav-link--bar.av-nav-link--active {
    color: var(--av-accent);
}
</style>
