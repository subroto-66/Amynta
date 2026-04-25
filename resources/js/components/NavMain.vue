<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { ChevronRightIcon } from 'lucide-vue-next';
import { ref, watchEffect } from 'vue';

import {
    SidebarGroup,
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem,
} from '@/components/ui/sidebar';
import { useCurrentUrl } from '@/composables/useCurrentUrl';
import type { NavItem } from '@/types';

type Props = {
    items: NavItem[];
};

const props = defineProps<Props>();

const { isCurrentUrl } = useCurrentUrl();
const openMenus = ref<Record<string, boolean>>({});

function toggleMenu(title: string) {
    openMenus.value[title] = !openMenus.value[title];
}

function hasActiveSubMenu(item: NavItem): boolean {
    return item.subMenu?.some(sub => isCurrentUrl(sub.href!)) ?? false;
}

watchEffect(() => {
    props.items.forEach((item) => {
        if (item.subMenu && hasActiveSubMenu(item)) {
            openMenus.value[item.title] = true;
        }
    });
});
</script>



<template>
    <SidebarGroup class="px-2 py-0">
        <SidebarMenu class="mt-5">
            <template v-for="item in items" :key="item.title">
                <!-- Item with Submenu -->
                <SidebarMenuItem v-if="item.subMenu && item.subMenu.length">
                    <SidebarMenuButton :tooltip="item.title" @click="toggleMenu(item.title)"
                        class="flex justify-between items-center w-full">
                        <div class="flex items-center gap-2">
                            <component :is="item.icon" class="h-5 w-5" />
                            <span class="text-[16px]">{{ item.title }}</span>
                        </div>
                        <ChevronRightIcon class="w-4 h-4 transition-transform duration-200"
                            :class="{ 'rotate-90': openMenus[item.title] }" />
                    </SidebarMenuButton>

                    <transition name="fade" mode="out-in">
                        <SidebarMenu v-show="openMenus[item.title]" class="pl-4 transition-all duration-200">
                            <SidebarMenuItem v-for="sub in item.subMenu" :key="sub.title">
                                <SidebarMenuButton as-child :is-active="isCurrentUrl(sub.href!)" :tooltip="sub.title">
                                    <Link :href="sub.href!" class="flex items-center mt-1">
                                        <component :is="sub.icon" class="h-5 w-5" />
                                        <span class="text-[15px]">{{ sub.title }}</span>
                                    </Link>
                                </SidebarMenuButton>
                            </SidebarMenuItem>
                        </SidebarMenu>
                    </transition>
                </SidebarMenuItem>

                <!-- Single Item -->
                <SidebarMenuItem v-else>
                    <SidebarMenuButton as-child :is-active="isCurrentUrl(item.href!)" :tooltip="item.title">
                        <Link :href="item.href!" class="flex items-center gap-2">
                            <component :is="item.icon" class="h-5 w-5"/>
                            <span class="text-[15px]">{{ item.title }}</span>
                        </Link>
                    </SidebarMenuButton>
                </SidebarMenuItem>
            </template>
        </SidebarMenu>
    </SidebarGroup>
</template>

<style scoped></style>
