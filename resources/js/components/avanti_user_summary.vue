<script setup>
import AvantiAvatar from './avanti_avatar.vue';

defineProps({
    user: { type: Object, required: true },
});
</script>

<template>
    <div class="av-user-summary">
        <AvantiAvatar :src="user.avatar" :name="`${user.firstName} ${user.lastName}`" size="md" />
        <div class="av-user-summary__text">
            <p class="av-user-summary__name">{{ user.firstName }} {{ user.lastName }}</p>
            <p class="av-user-summary__email">{{ user.email }}</p>
        </div>
    </div>
</template>

<style scoped>
.av-user-summary {
    display: flex;
    align-items: center;
    gap: 12px;
}

.av-user-summary__name {
    font-weight: 600;
    font-size: 14px;
    line-height: 1.3;
}

.av-user-summary__email {
    font-size: 12px;
    color: var(--av-text-secondary);
}
</style>
