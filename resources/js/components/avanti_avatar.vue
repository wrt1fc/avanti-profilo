<script setup>
import { computed } from 'vue';

const props = defineProps({
    src: { type: String, default: null },
    name: { type: String, default: '' },
    /** sm — 32px, md — 40px, lg — 56px */
    size: { type: String, default: 'md' },
    /** Индикатор «онлайн» в левом нижнем углу (как в макете виджета консультанта) */
    online: { type: Boolean, default: false },
});

const initials = computed(() =>
    props.name
        .split(/\s+/)
        .filter(Boolean)
        .slice(0, 2)
        .map((word) => word[0].toUpperCase())
        .join(''),
);
</script>

<template>
    <span class="av-avatar" :class="`av-avatar--${size}`">
        <img v-if="src" :src="src" :alt="name" class="av-avatar__img" />
        <span v-else class="av-avatar__initials">{{ initials }}</span>
        <span v-if="online" class="av-avatar__dot" role="img" aria-label="online"></span>
    </span>
</template>

<style scoped>
.av-avatar {
    position: relative;
    display: inline-block;
    border-radius: 50%;
    background: var(--av-accent-soft);
    color: var(--av-accent);
    flex-shrink: 0;
}

.av-avatar--sm {
    width: 32px;
    height: 32px;
    font-size: 12px;
}

.av-avatar--md {
    width: 40px;
    height: 40px;
    font-size: 15px;
}

.av-avatar--lg {
    width: 56px;
    height: 56px;
    font-size: 20px;
}

.av-avatar__img {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    object-fit: cover;
}

.av-avatar__initials {
    display: flex;
    width: 100%;
    height: 100%;
    align-items: center;
    justify-content: center;
    font-weight: 600;
}

.av-avatar__dot {
    position: absolute;
    left: -2px;
    bottom: -2px;
    width: 14px;
    height: 14px;
    border: 2.5px solid #fff;
    border-radius: 50%;
    background: transparent;
}
</style>
