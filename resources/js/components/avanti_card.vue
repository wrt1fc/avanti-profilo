<script setup>
defineProps({
    /** card — лёгкая тень; panel — более глубокая (правая колонка) */
    elevation: { type: String, default: 'card' },
    padded: { type: Boolean, default: true },
});
</script>

<template>
    <section class="av-card" :class="[`av-card--${elevation}`, { 'av-card--padded': padded }]">
        <slot />
    </section>
</template>

<style scoped>
.av-card {
    background: var(--av-surface);
    border: 1px solid var(--av-border);
    border-radius: var(--av-radius-lg);
}

.av-card--card {
    box-shadow: var(--av-shadow-card);
}

.av-card--panel {
    box-shadow: var(--av-shadow-panel);
}

.av-card--padded {
    padding: 24px;
}

@media (max-width: 767px) {
    .av-card--padded {
        padding: 16px;
    }
}
</style>
