<script setup lang="ts">
import NavMain from '@/components/NavMain.vue';
import {
    Sidebar,
    SidebarContent,
    SidebarHeader,
    SidebarMenu,
    SidebarMenuItem,
} from '@/components/ui/sidebar';
import { Link } from '@inertiajs/vue3';
import { FileQuestion, LayoutGrid, User2Icon, Users2Icon } from 'lucide-vue-next';

import type { NavItem } from '@/types';

const mainNavItems: NavItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
        icon: LayoutGrid,
    },
    {
        title: 'Faq',
        href: '/faqs',
        icon: FileQuestion,
    },
    {
        title: 'Teams',
        href: '/teams',
        icon: Users2Icon,
    },
    {
        title: 'Home',
        icon: User2Icon,
        subMenu: [
            {
                title: 'Specialists',
                href: '/specialists',
            },
        ]
    },
];

</script>

<template>
    <Sidebar collapsible="icon" variant="inset">
        <SidebarHeader>
            <SidebarMenu>
                <SidebarMenuItem>
                    <Link href="/dashboard">
                            <div class="flex gap-2">
                                <!-- <div class="flex aspect-square size-9 items-center justify-center rounded-md mt-3">
                                <img class="w-14" src="/assets/images/fabicon.png" alt="icon">
                            </div> -->
                                <div class="grid flex-1 text-left text-sm mt-4">
                                    <img class="w-28" src="/assets/images/sanmo.jpg" alt="">
                                </div>
                            </div>
                        </Link>
                </SidebarMenuItem>
            </SidebarMenu>
        </SidebarHeader>

        <SidebarContent>
            <NavMain :items="mainNavItems" />
        </SidebarContent>
    </Sidebar>
    <slot />
</template>
