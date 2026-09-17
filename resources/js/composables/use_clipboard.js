import { ref } from 'vue';

/** Копирование в буфер с коротким флагом «скопировано» для UI. */
export function useClipboard(resetAfterMs = 1500) {
    const copied = ref(false);
    let timer = null;

    async function copy(text) {
        if (!text) return false;
        try {
            await navigator.clipboard.writeText(String(text));
            copied.value = true;
            clearTimeout(timer);
            timer = setTimeout(() => (copied.value = false), resetAfterMs);
            return true;
        } catch {
            return false;
        }
    }

    return { copied, copy };
}
