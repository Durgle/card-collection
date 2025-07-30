import { defineStore } from 'pinia';
import { ref } from 'vue';

export const useUiStore = defineStore('ui', () => {

    const navExtended = ref(false)
    const openItemId = ref<string | null>(null)

    /**
     * Toggles the navigation extended state.
     */
    function toggleNav() {
        navExtended.value = !navExtended.value
        if (!navExtended.value) openItemId.value = null
    }

    /**
     * Sets or resets the currently open dropdown menu.
     * If the given ID is already open, it closes it.
     */
    function setOpenItem(id: string | null) {
        openItemId.value = openItemId.value === id ? null : id
        if (id && !navExtended.value) navExtended.value = true
    }
    
    /**
     * Sets the navigation extended state.
     * @param extended Sets the navigation extended state.
     */
    function setNavExtended(extended: boolean) {
        navExtended.value = extended
        if (!extended) openItemId.value = null
    }

    return {
        navExtended,
        openItemId,
        toggleNav,
        setOpenItem,
        setNavExtended
    }
});