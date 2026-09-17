<script setup>
import AvantiAvatar from './avanti_avatar.vue';
import AvantiBadge from './avanti_badge.vue';

defineProps({
    consultant: { type: Object, required: true },
});
</script>

<template>
    <a :href="consultant.href" class="av-consultant">
        <AvantiAvatar :src="consultant.avatar" :name="consultant.name" size="lg" :online="consultant.online" class="av-consultant__avatar" />
        <span class="av-consultant__text">
            <span class="av-consultant__name">{{ consultant.name }}</span>
            <span class="av-consultant__message">{{ consultant.lastMessage }}</span>
        </span>
        <AvantiBadge v-if="consultant.unread" variant="count" class="av-consultant__unread">{{ consultant.unread }}</AvantiBadge>
    </a>
</template>

<style scoped>
.av-consultant {
    position: relative;
    display: flex;
    align-items: center;
    gap: 16px;
    padding: 18px 20px;
    border-radius: var(--av-radius-lg);
    background: var(--av-accent);
    color: #fff;
    box-shadow: var(--av-shadow-float);
    transition: background-color var(--av-dur-fast) var(--av-ease);
}

.av-consultant:hover {
    background: var(--av-accent-hover);
}

.av-consultant__text {
    display: flex;
    flex: 1 1 auto;
    flex-direction: column;
    gap: 2px;
    min-width: 0;
    padding-right: 16px;
}

.av-consultant__name {
    font-size: 20px;
    font-weight: 700;
    letter-spacing: -0.01em;
}

.av-consultant__message {
    font-size: 15px;
    opacity: 0.92;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.av-consultant__unread {
    position: absolute;
    top: 14px;
    right: 14px;
}
</style>
