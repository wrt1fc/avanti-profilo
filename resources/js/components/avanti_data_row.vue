<script setup>
defineProps({
    label: { type: String, required: true },
    value: { type: [String, Number], default: '' },
});
</script>

<template>
    <div class="av-data-row">
        <dt class="av-data-row__label">{{ label }}</dt>
        <dd class="av-data-row__value">
            <slot>{{ value }}</slot>
        </dd>
    </div>
</template>

<style scoped>
.av-data-row {
    display: flex;
    align-items: baseline;
    justify-content: space-between;
    gap: 16px;
    min-height: 30px;
}

.av-data-row__label {
    font-size: 13px;
    color: var(--av-text-secondary);
}

.av-data-row__value {
    margin: 0;
    font-size: 13px;
    font-weight: 600;
    text-align: right;
    font-variant-numeric: tabular-nums;
    overflow-wrap: anywhere;
}

@media (max-width: 767px) {
    .av-data-row {
        min-height: 26px;
    }

    .av-data-row__label,
    .av-data-row__value {
        font-size: 14px;
    }
}
</style>
