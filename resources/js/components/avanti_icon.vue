<script setup>
import { computed } from 'vue';

/**
 * Единый набор SVG-иконок (24×24, stroke). Имя → набор path.
 * Добавляя иконку, держи стиль: stroke 2, round caps/joins.
 */
const ICONS = {
    home: ['M3 10.5 12 3l9 7.5', 'M5 9.5V21h14V9.5', 'M10 21v-6h4v6'],
    document: ['M7 3h7l5 5v13H7z', 'M14 3v5h5', 'M10 13h5', 'M10 17h5'],
    user: ['M12 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8z', 'M4 21a8 8 0 0 1 16 0'],
    chat: ['M21 12a8 8 0 0 1-11.6 7.1L4 21l1.9-5.4A8 8 0 1 1 21 12z'],
    bell: ['M6 9a6 6 0 1 1 12 0v5l2 3H4l2-3z', 'M10 20a2 2 0 0 0 4 0'],
    check: ['m5 12 5 5 9-10'],
    upload: ['M12 16V5', 'm7 10 5-5 5 5', 'M4 19h16'],
    pen: ['m4 20 4-1L20 7l-3-3L5 16z', 'm14 6 4 4'],
    shield: ['M12 3 4 6v6c0 5 3.5 8 8 9 4.5-1 8-4 8-9V6z', 'm9 12 2 2 4-4'],
    chart: ['M4 20h16', 'M8 17v-5', 'M12 17V7', 'M16 17v-8'],
    'arrow-right': ['M5 12h14', 'm13 6 6 6-6 6'],
    'chevron-up': ['m6 15 6-6 6 6'],
    'chevron-down': ['m6 9 6 6 6-6'],
    copy: ['M9 9h11v11H9z', 'M5 15V4h11'],
    question: ['M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18z', 'M9.5 9.5a2.5 2.5 0 1 1 3.5 2.3c-.7.3-1 .8-1 1.5', 'M12 17h.01'],
};

const props = defineProps({
    name: { type: String, required: true },
    size: { type: [Number, String], default: 20 },
    strokeWidth: { type: [Number, String], default: 2 },
});

const paths = computed(() => ICONS[props.name] ?? []);
</script>

<template>
    <svg
        class="av-icon"
        :width="size"
        :height="size"
        viewBox="0 0 24 24"
        fill="none"
        stroke="currentColor"
        :stroke-width="strokeWidth"
        stroke-linecap="round"
        stroke-linejoin="round"
        aria-hidden="true"
        focusable="false"
    >
        <path v-for="(d, i) in paths" :key="i" :d="d" />
    </svg>
</template>

<style scoped>
.av-icon {
    display: inline-block;
    flex-shrink: 0;
    vertical-align: middle;
}
</style>
