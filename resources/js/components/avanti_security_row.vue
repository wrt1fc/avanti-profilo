<script setup>
import AvantiButton from './avanti_button.vue';

defineProps({
    text: { type: String, required: true },
    actionLabel: { type: String, required: true },
    actionHref: { type: String, default: '#' },
});
</script>

<template>
    <div class="av-security-row">
        <p class="av-security-row__text">{{ text }}</p>
        <AvantiButton :href="actionHref" variant="outline" size="sm" class="av-security-row__action">{{ actionLabel }}</AvantiButton>
    </div>
</template>

<style scoped>
.av-security-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
    padding: 16px 0;
}

.av-security-row + .av-security-row {
    border-top: 1px solid var(--av-border);
}

.av-security-row__text {
    font-size: 13px;
    color: var(--av-text-secondary);
}

@media (max-width: 767px) {
    .av-security-row {
        flex-direction: column;
        align-items: stretch;
        gap: 10px;
        padding: 14px 0;
    }

    .av-security-row__text {
        font-size: 14px;
    }

    .av-security-row__action {
        display: flex;
        width: 100%;
        height: 40px;
    }
}
</style>
