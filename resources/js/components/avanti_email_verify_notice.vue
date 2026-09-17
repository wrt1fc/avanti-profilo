<script setup>
import AvantiIcon from './avanti_icon.vue';
import AvantiBadge from './avanti_badge.vue';
import AvantiButton from './avanti_button.vue';

defineProps({
    verified: { type: Boolean, default: false },
    actionHref: { type: String, default: '#' },
});
</script>

<template>
    <div class="av-verify" :class="{ 'av-verify--ok': verified }">
        <div class="av-verify__head">
            <span class="av-verify__icon">
                <AvantiIcon :name="verified ? 'check' : 'question'" :size="16" :stroke-width="1.75" />
            </span>
            <span class="av-verify__title">Verifica email</span>
            <AvantiBadge class="av-verify__badge">{{ verified ? 'Verificata' : 'Non verificata' }}</AvantiBadge>
        </div>

        <div v-if="!verified" class="av-verify__body">
            <p class="av-verify__text">Verifica il tuo indirizzo email per proteggere il tuo account.</p>
            <AvantiButton :href="actionHref" size="sm" class="av-verify__action">Invia codice</AvantiButton>
        </div>
    </div>
</template>

<style scoped>
.av-verify {
    margin-top: 16px;
    padding: 14px 16px 16px;
    border-radius: var(--av-radius-md);
    background: var(--av-accent-soft);
}

.av-verify__head {
    display: flex;
    align-items: center;
    gap: 8px;
}

.av-verify__icon {
    display: inline-flex;
    color: var(--av-text-secondary);
}

.av-verify__title {
    font-size: 13px;
    font-weight: 600;
}

.av-verify__badge {
    margin-left: 4px;
}

.av-verify__body {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
    margin-top: 12px;
}

.av-verify__text {
    font-size: 13px;
    color: var(--av-text-secondary);
}

@media (max-width: 767px) {
    .av-verify {
        padding: 14px 14px 16px;
    }

    .av-verify__icon {
        width: 24px;
        height: 24px;
        align-items: center;
        justify-content: center;
        border: 1px solid var(--av-text-secondary);
        border-radius: 50%;
    }

    .av-verify__title {
        font-size: 15px;
    }

    .av-verify__badge {
        margin-left: auto;
    }

    .av-verify__body {
        flex-direction: column;
        align-items: stretch;
        gap: 12px;
    }

    .av-verify__text {
        font-size: 14px;
    }

    .av-verify__action {
        display: flex;
        width: 100%;
        height: 40px;
    }
}
</style>
