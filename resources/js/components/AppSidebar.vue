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
import { FileQuestion, House, ImageIcon, LayoutGrid, Mail, User2Icon, Users2Icon } from 'lucide-vue-next';

import type { NavItem } from '@/types';

const mainNavItems: NavItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
        icon: LayoutGrid,
    },
    {
        title: 'Hero',
        href: '/hero',
        icon: ImageIcon,
    },
    {
        title: 'Home',
        icon: House,
        subMenu: [
            {
                title: 'Divisions',
                href: '/our-divisions',
            },
            {
                title: 'Specialists',
                href: '/specialists',
            },
            {
                title: 'Specialty Risks',
                href: '/specialty-risk',
            },
        ]
    },
    {
        title: 'About',
        icon: Users2Icon,
        subMenu: [
            {
                title: 'Work',
                href: '/works',
            },
            {
                title: 'Commitment',
                href: '/commitment',
            }
        ]
    },
    {
        title: 'Contact',
        icon: Mail,
        subMenu: [
            {
                title: 'Contact',
                href: '/contact',
            },
            {
                title: 'Reach Us',
                href: '/reach-out',
            }
        ]
    },
    {
        title: 'FAQS',
        href: '/faqs',
        icon: FileQuestion,
    },
    {
        title: 'Teams',
        href: '/teams',
        icon: Users2Icon,
    }

];

</script>

<template>
    <Sidebar collapsible="icon" variant="inset">
        <SidebarHeader>
            <SidebarMenu>
                <SidebarMenuItem>
                    <Link href="/dashboard">
                            <div class="flex ">
                                <!-- <div class="flex aspect-square size-9 items-center justify-center rounded-md mt-3">
                                <img class="w-14" src="/assets/images/fabicon.png" alt="icon">
                            </div> -->
                                <div class="grid flex-1 items-center text-sm mt-4">
                                    <img class="w-28" src="/assets/images/amynta.png" alt="amynta">
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
