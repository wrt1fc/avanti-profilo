<script setup>
import { computed } from 'vue';
import AvantiCard from './avanti_card.vue';
import AvantiStepperStep from './avanti_stepper_step.vue';

const props = defineProps({
    /** [{ key, short, icon, status }] */
    steps: { type: Array, default: () => [] },
});

const completed = computed(() => props.steps.filter((s) => s.status === 'done').length);
const currentIndex = computed(() => {
    const idx = props.steps.findIndex((s) => s.status === 'current');
    return (idx === -1 ? completed.value : idx) + 1;
});
</script>

<template>
    <AvantiCard class="av-stepper">
        <div class="av-stepper__head">
            <p class="av-stepper__title">Passo {{ currentIndex }} di {{ steps.length }}</p>
            <p class="av-stepper__count">{{ completed }} / {{ steps.length }} completati</p>
        </div>
        <ol class="av-stepper__list" :class="`av-stepper__list--${steps.length}`">
            <AvantiStepperStep
                v-for="(step, i) in steps"
                :key="step.key"
                :label="step.short"
                :icon="step.icon"
                :status="step.status"
                :connector="i > 0"
            />
        </ol>
    </AvantiCard>
</template>

<style scoped>
.av-stepper {
    padding: 20px 24px 24px;
}

.av-stepper__head {
    display: flex;
    justify-content: space-between;
    align-items: baseline;
    margin-bottom: 20px;
}

.av-stepper__title {
    font-weight: 600;
    font-size: 14px;
}

.av-stepper__count {
    font-size: 13px;
    color: var(--av-text-secondary);
    font-variant-numeric: tabular-nums;
}

.av-stepper__list {
    display: flex;
    align-items: flex-start;
    margin: 0;
    padding: 0;
    list-style: none;
}

/* Для 5 шагов выносим крайние кружки к краям карточки, как в макете:
   m = (dot/2 − C/(2n))·n/(n−1); C — ширина контента, n = 5 */
.av-stepper__list--5 {
    margin: 0 calc(20px - 12.5%);
}

@media (max-width: 767px) {
    .av-stepper {
        padding: 14px 16px 18px;
    }

    .av-stepper__head {
        margin-bottom: 12px;
    }

    .av-stepper__title {
        font-size: 12px;
    }

    .av-stepper__count {
        font-size: 11px;
    }

    .av-stepper__list--5 {
        margin: 0 calc(15px - 12.5%);
    }
}
</style>
