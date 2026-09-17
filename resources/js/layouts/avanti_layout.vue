<script setup>
import AvantiHeader from '../components/avanti_header.vue';
import AvantiBottomNav from '../components/avanti_bottom_nav.vue';

defineProps({
    nav: { type: Array, default: () => [] },
    activeKey: { type: String, default: '' },
    notifications: { type: Number, default: 0 },
    supportHref: { type: String, default: '#' },
    user: { type: Object, required: true },
});
</script>

<template>
    <div class="av-layout">
        <AvantiHeader
            :nav="nav"
            :active-key="activeKey"
            :notifications="notifications"
            :support-href="supportHref"
            :user="user"
        />

        <main class="av-layout__main">
            <slot />
        </main>

        <AvantiBottomNav :nav="nav" :active-key="activeKey" :support-href="supportHref" />
    </div>
</template>

<style scoped>
.av-layout {
    min-height: 100vh;
}

.av-layout__main {
    max-width: var(--av-container);
    margin: 0 auto;
    padding: 24px 32px 48px;
}

@media (max-width: 767px) {
    .av-layout__main {
        padding: 16px 16px calc(var(--av-bottom-nav-h) + 24px + env(safe-area-inset-bottom));
    }
}
</style>
