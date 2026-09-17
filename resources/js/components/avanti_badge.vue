<script setup>
defineProps({
    /** soft — светлая подложка с акцентным текстом; count — красный кружок счётчика */
    variant: { type: String, default: 'soft' },
});
</script>

<template>
    <span class="av-badge" :class="`av-badge--${variant}`"><slot /></span>
</template>

<style scoped>
.av-badge {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    white-space: nowrap;
    font-weight: 600;
    line-height: 1;
}

.av-badge--soft {
    height: 24px;
    padding: 0 10px;
    border-radius: var(--av-radius-pill);
    background: var(--av-accent-soft);
    color: var(--av-accent);
    font-size: 12px;
}

.av-badge--count {
    min-width: 18px;
    height: 18px;
    padding: 0 5px;
    border-radius: var(--av-radius-pill);
    background: var(--av-danger);
    color: #fff;
    font-size: 11px;
    font-variant-numeric: tabular-nums;
}
</style>
