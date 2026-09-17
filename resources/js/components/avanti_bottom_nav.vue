<script setup>
import AvantiNavLink from './avanti_nav_link.vue';
import AvantiButton from './avanti_button.vue';

defineProps({
    nav: { type: Array, default: () => [] },
    activeKey: { type: String, default: '' },
    supportHref: { type: String, default: '#' },
});
</script>

<template>
    <nav class="av-bottom-nav" aria-label="Navigazione principale">
        <div class="av-bottom-nav__inner">
            <AvantiNavLink
                v-for="item in nav"
                :key="item.key"
                :href="item.href"
                :icon="item.icon"
                :label="item.label"
                :active="item.key === activeKey"
                layout="bar"
            />
            <AvantiButton :href="supportHref" icon="chat" size="sm" class="av-bottom-nav__support">ASSISTENZA</AvantiButton>
        </div>
    </nav>
</template>

<style scoped>
.av-bottom-nav {
    display: none;
    position: fixed;
    inset: auto 0 0 0;
    z-index: 20;
    background: var(--av-surface);
    border-top: 2px solid var(--av-accent);
    padding-bottom: env(safe-area-inset-bottom);
}

.av-bottom-nav__inner {
    display: flex;
    align-items: center;
    justify-content: space-between;
    height: var(--av-bottom-nav-h);
    padding: 0 16px;
}

.av-bottom-nav__support {
    flex-direction: column;
    gap: 2px;
    height: 48px;
    padding: 0 14px;
    font-size: 12px;
}

.av-bottom-nav__support :deep(.av-btn__icon) {
    margin: 0;
}

@media (max-width: 767px) {
    .av-bottom-nav {
        display: block;
    }
}
</style>
