<script setup>
import { computed, ref } from 'vue';
import AvantiCard from './avanti_card.vue';
import AvantiBadge from './avanti_badge.vue';
import AvantiIconButton from './avanti_icon_button.vue';
import AvantiChecklistItem from './avanti_checklist_item.vue';
import AvantiProgressSegments from './avanti_progress_segments.vue';

const props = defineProps({
    /** [{ key, title, icon, status, href? }] */
    steps: { type: Array, default: () => [] },
});

const open = ref(true);
const completed = computed(() => props.steps.filter((s) => s.status === 'done').length);
</script>

<template>
    <AvantiCard elevation="panel" :padded="false" class="av-checklist">
        <header class="av-checklist__head">
            <div class="av-checklist__heading">
                <p class="av-checklist__kicker">Completa tutti gli step</p>
                <h2 class="av-checklist__title">Per il prelievo dei fondi, completa tutti gli step</h2>
            </div>
            <AvantiBadge class="av-checklist__badge">{{ completed }} / {{ steps.length }} completati</AvantiBadge>
            <AvantiIconButton
                :icon="open ? 'chevron-up' : 'chevron-down'"
                :label="open ? 'Nascondi gli step' : 'Mostra gli step'"
                variant="outline"
                size="sm"
                :icon-size="14"
                :stroke-width="2.5"
                :aria-expanded="open"
                aria-controls="av-checklist-body"
                @click="open = !open"
            />
        </header>

        <div v-show="open" id="av-checklist-body" class="av-checklist__body">
            <AvantiChecklistItem
                v-for="step in steps"
                :key="step.key"
                :title="step.title"
                :icon="step.icon"
                :status="step.status"
                :href="step.href"
            />
            <div class="av-checklist__progress">
                <AvantiProgressSegments :total="steps.length" :completed="completed" label="Step completati" />
            </div>
        </div>
    </AvantiCard>
</template>

<style scoped>
.av-checklist__head {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 20px 20px 16px;
}

.av-checklist__heading {
    flex: 1 1 auto;
    min-width: 0;
}

.av-checklist__kicker {
    margin-bottom: 4px;
    font-size: 11px;
    font-weight: 600;
    letter-spacing: 0.06em;
    text-transform: uppercase;
    color: var(--av-accent);
}

.av-checklist__title {
    font-size: 13px;
    font-weight: 600;
    line-height: 1.35;
    text-wrap: balance;
}

.av-checklist__progress {
    padding: 20px;
}

@media (max-width: 767px) {
    .av-checklist__head {
        padding: 16px 16px 14px;
    }

    .av-checklist__badge {
        display: none;
    }

    .av-checklist__progress {
        padding: 16px;
    }
}
</style>
