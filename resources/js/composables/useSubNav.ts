import { FunctionalComponent, reactive } from 'vue';

export type SubNavItem = {
    entryKey: string;
    label: string;
    href: string;
    active?: boolean;
    as?: 'button' | 'link';
    method?: 'get' | 'post' | 'put' | 'delete';
    icon?: FunctionalComponent | null;
};

const state = reactive({
  items: [] as SubNavItem[],
});

export function addSubNavItem(item: SubNavItem) {
  const idx = state.items.findIndex(i => i.entryKey === item.entryKey);
  if (idx !== -1) {
    state.items[idx] = item;
  } else {
    state.items.push(item);
  }
}

export function removeSubNavItem(entryKey: string) {
  const idx = state.items.findIndex(i => i.entryKey === entryKey);
  if (idx !== -1) state.items.splice(idx, 1);
}

export function useSubNavState() {
  return state;
}
