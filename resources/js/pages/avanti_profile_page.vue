<script setup>
import { Head } from '@inertiajs/vue3';
import AvantiLayout from '../layouts/avanti_layout.vue';
import AvantiUserSummary from '../components/avanti_user_summary.vue';
import AvantiBreadcrumbs from '../components/avanti_breadcrumbs.vue';
import AvantiStepper from '../components/avanti_stepper.vue';
import AvantiPersonalDataCard from '../components/avanti_personal_data_card.vue';
import AvantiSecurityCard from '../components/avanti_security_card.vue';
import AvantiChecklistCard from '../components/avanti_checklist_card.vue';
import AvantiConsultantWidget from '../components/avanti_consultant_widget.vue';

/**
 * Props приходят из Inertia: общие (nav, notifications, supportHref) — из HandleInertiaRequests,
 * страничные — из ProfileController::show().
 */
defineProps({
    nav: { type: Array, default: () => [] },
    notifications: { type: Number, default: 0 },
    supportHref: { type: String, default: '#' },
    activeNav: { type: String, default: 'profile' },
    user: { type: Object, required: true },
    breadcrumbs: { type: Array, default: () => [] },
    steps: { type: Array, default: () => [] },
    consultant: { type: Object, default: null },
    links: { type: Object, default: () => ({}) },
});
</script>

<template>
    <Head title="Profilo" />

    <AvantiLayout
        :nav="nav"
        :active-key="activeNav"
        :notifications="notifications"
        :support-href="supportHref"
        :user="user"
    >
        <div class="av-profile__topbar">
            <AvantiUserSummary :user="user" />
            <AvantiBreadcrumbs :items="breadcrumbs" />
        </div>

        <div class="av-profile__grid">
            <div class="av-profile__col av-profile__col--main">
                <AvantiStepper :steps="steps" />
                <AvantiPersonalDataCard :user="user" :edit-href="links.editName" />
                <AvantiSecurityCard :email-verified="user.emailVerified" :links="links" />
            </div>

            <aside class="av-profile__col av-profile__col--side">
                <AvantiPersonalDataCard :user="user" compact class="av-profile__desktop-only" />
                <AvantiChecklistCard :steps="steps" />
                <AvantiConsultantWidget v-if="consultant" :consultant="consultant" class="av-profile__desktop-only" />
            </aside>
        </div>
    </AvantiLayout>
</template>

<style scoped>
.av-profile__topbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
    margin-bottom: 18px;
}

.av-profile__grid {
    display: grid;
    grid-template-columns: minmax(0, 1fr) 496px;
    gap: 24px 16px;
    align-items: start;
}

.av-profile__col {
    display: flex;
    flex-direction: column;
    gap: 24px;
    min-width: 0;
}

@media (max-width: 1199px) {
    .av-profile__grid {
        grid-template-columns: minmax(0, 1fr) minmax(320px, 40%);
    }
}

@media (max-width: 1023px) {
    .av-profile__grid {
        grid-template-columns: minmax(0, 1fr);
    }
}

@media (max-width: 767px) {
    .av-profile__topbar,
    .av-profile__desktop-only {
        display: none;
    }

    .av-profile__grid {
        gap: 16px;
    }

    .av-profile__col {
        gap: 16px;
    }
}
</style>
