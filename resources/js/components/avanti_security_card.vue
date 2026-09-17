<script setup>
import AvantiCard from './avanti_card.vue';
import AvantiIcon from './avanti_icon.vue';
import AvantiSecurityRow from './avanti_security_row.vue';
import AvantiEmailVerifyNotice from './avanti_email_verify_notice.vue';

defineProps({
    emailVerified: { type: Boolean, default: false },
    links: { type: Object, default: () => ({}) },
});
</script>

<template>
    <AvantiCard class="av-security">
        <header class="av-security__head">
            <span class="av-security__icon">
                <AvantiIcon name="shield" :size="18" :stroke-width="1.75" />
            </span>
            <h2 class="av-security__title">Sicurezza</h2>
        </header>

        <AvantiSecurityRow
            text="Cambia la password del tuo account."
            action-label="Cambia password"
            :action-href="links.changePassword"
        />
        <AvantiSecurityRow
            text="Cambia l'indirizzo email del tuo account."
            action-label="Cambia email"
            :action-href="links.changeEmail"
        />

        <AvantiEmailVerifyNotice :verified="emailVerified" :action-href="links.verifyEmail" />
    </AvantiCard>
</template>

<style scoped>
.av-security__head {
    display: flex;
    align-items: center;
    gap: 12px;
    padding-bottom: 16px;
    border-bottom: 1px solid var(--av-border);
}

.av-security__icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
    border-radius: var(--av-radius-sm);
    background: var(--av-accent-soft);
    color: var(--av-accent);
}

.av-security__title {
    font-size: 15px;
    font-weight: 600;
}

@media (max-width: 767px) {
    .av-security__title {
        font-size: 17px;
    }
}
</style>
