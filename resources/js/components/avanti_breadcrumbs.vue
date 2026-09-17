<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    /** [{ label, href? }] — последний элемент без href считается текущим */
    items: { type: Array, default: () => [] },
});
</script>

<template>
    <nav class="av-breadcrumbs" aria-label="Percorso">
        <ol class="av-breadcrumbs__list">
            <li v-for="(item, i) in items" :key="i" class="av-breadcrumbs__item">
                <Link v-if="item.href" :href="item.href" class="av-breadcrumbs__link">{{ item.label }}</Link>
                <span v-else class="av-breadcrumbs__current" aria-current="page">{{ item.label }}</span>
                <span v-if="i < items.length - 1" class="av-breadcrumbs__sep" aria-hidden="true">/</span>
            </li>
        </ol>
    </nav>
</template>

<style scoped>
.av-breadcrumbs__list {
    display: flex;
    gap: 8px;
    margin: 0;
    padding: 0;
    list-style: none;
    font-size: 14px;
}

.av-breadcrumbs__item {
    display: inline-flex;
    gap: 8px;
}

.av-breadcrumbs__link {
    color: var(--av-text-secondary);
}

.av-breadcrumbs__link:hover {
    color: var(--av-text);
}

.av-breadcrumbs__sep {
    color: var(--av-text-muted);
}

.av-breadcrumbs__current {
    font-weight: 600;
}
</style>
