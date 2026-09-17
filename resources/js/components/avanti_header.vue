<script setup>
import AvantiLogo from './avanti_logo.vue';
import AvantiNavLink from './avanti_nav_link.vue';
import AvantiButton from './avanti_button.vue';
import AvantiBadge from './avanti_badge.vue';
import AvantiAvatar from './avanti_avatar.vue';
import AvantiIconButton from './avanti_icon_button.vue';

defineProps({
    nav: { type: Array, default: () => [] },
    activeKey: { type: String, default: '' },
    notifications: { type: Number, default: 0 },
    supportHref: { type: String, default: '#' },
    user: { type: Object, required: true },
});
</script>

<template>
    <header class="av-header">
        <div class="av-header__inner">
            <AvantiLogo class="av-header__logo" />

            <nav class="av-header__nav" aria-label="Sezioni">
                <AvantiNavLink
                    v-for="item in nav"
                    :key="item.key"
                    :href="item.href"
                    :icon="item.icon"
                    :label="item.label"
                    :active="item.key === activeKey"
                />
            </nav>

            <div class="av-header__support">
                <AvantiButton :href="supportHref" icon="chat" size="md">ASSISTENZA</AvantiButton>
                <AvantiBadge v-if="notifications" variant="count" class="av-header__count">{{ notifications }}</AvantiBadge>
            </div>

            <div class="av-header__mobile">
                <AvantiIconButton icon="bell" label="Notifiche" href="#" :icon-size="24" class="av-header__bell">
                    <AvantiBadge v-if="notifications" variant="count" class="av-header__bell-count">{{ notifications }}</AvantiBadge>
                </AvantiIconButton>
                <a href="/profilo" class="av-header__user" aria-label="Profilo">
                    <AvantiAvatar :src="user.avatar" :name="`${user.firstName} ${user.lastName}`" size="sm" />
                    <span class="av-header__initials">{{ user.firstName[0] }}{{ user.lastName[0] }}</span>
                </a>
            </div>
        </div>
    </header>
</template>

<style scoped>
.av-header {
    position: sticky;
    top: 0;
    z-index: 20;
    background: var(--av-surface);
    border-bottom: 1px solid var(--av-border);
}

.av-header__inner {
    display: flex;
    align-items: center;
    gap: 24px;
    max-width: var(--av-container);
    height: var(--av-header-h);
    margin: 0 auto;
    padding: 0 32px;
}

.av-header__nav {
    display: flex;
    gap: 16px;
    margin-left: 40px;
}

.av-header__support {
    position: relative;
    margin-left: auto;
}

.av-header__count {
    position: absolute;
    top: -8px;
    right: -6px;
    box-shadow: 0 0 0 2px var(--av-surface);
}

.av-header__mobile {
    display: none;
    align-items: center;
    gap: 16px;
    margin-left: auto;
}

.av-header__bell {
    color: var(--av-text);
}

.av-header__bell-count {
    position: absolute;
    top: -6px;
    right: -6px;
    box-shadow: 0 0 0 2px var(--av-surface);
}

.av-header__user {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-weight: 600;
    font-size: 14px;
}

@media (max-width: 767px) {
    .av-header__inner {
        height: var(--av-header-h-mobile);
        padding: 0 16px;
    }

    .av-header__logo :deep(.av-logo__word) {
        font-size: 20px;
    }

    .av-header__logo :deep(.av-logo__mark) {
        height: 26px;
    }

    .av-header__nav,
    .av-header__support {
        display: none;
    }

    .av-header__mobile {
        display: flex;
    }
}
</style>
