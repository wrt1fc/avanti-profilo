<script setup>
defineProps({
    href: { type: String, default: '/' },
    /** Высота знака в px; ширина берётся из пропорций */
    height: { type: Number, default: 36 },
});
</script>

<template>
    <a :href="href" class="av-logo" aria-label="Avanti — home">
        <svg class="av-logo__mark" :height="height" viewBox="0 0 50 38" fill="none" aria-hidden="true">
            <path d="M48.1 18.2C32.8 8.6 23.6 5 6.5 .9L36.3 18.2 5.7 38.4C23.3 32.5 32.5 27.8 48.1 18.2Z" fill="#2491AA" />
            <path d="M16.8 11.1c5.3 2.3 8.1 3.8 12.8 7.1C18.2 25.3 11.7 29 0 35.4l23.9-17.2-7.1-7.1Z" fill="#245CAA" />
        </svg>
        <span class="av-logo__word">Avanti</span>
    </a>
</template>

<style scoped>
.av-logo {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: var(--av-text);
}

.av-logo__word {
    font-size: 26px;
    font-weight: 700;
    letter-spacing: -0.02em;
    line-height: 1;
}

.av-logo__mark {
    width: auto;
}
</style>
