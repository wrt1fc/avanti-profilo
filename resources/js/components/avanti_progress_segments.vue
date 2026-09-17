<script setup>
defineProps({
    total: { type: Number, required: true },
    completed: { type: Number, default: 0 },
    label: { type: String, default: 'Avanzamento' },
});
</script>

<template>
    <div
        class="av-progress"
        role="progressbar"
        :aria-label="label"
        :aria-valuemin="0"
        :aria-valuemax="total"
        :aria-valuenow="completed"
    >
        <span
            v-for="i in total"
            :key="i"
            class="av-progress__seg"
            :class="{
                'av-progress__seg--done': i <= completed,
                'av-progress__seg--next': i === completed + 1,
            }"
        ></span>
    </div>
</template>

<style scoped>
.av-progress {
    display: flex;
    gap: 6px;
}

.av-progress__seg {
    flex: 1 1 0;
    height: 4px;
    border-radius: 2px;
    background: var(--av-border);
}

.av-progress__seg--done {
    background: var(--av-accent);
}

/* Следующий шаг — плавный «хвост» от акцента к серому, как в макете */
.av-progress__seg--next {
    background: linear-gradient(90deg, var(--av-accent) 0%, var(--av-border) 100%);
}
</style>
