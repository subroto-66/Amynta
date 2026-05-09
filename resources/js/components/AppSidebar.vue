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
import { BriefcaseMedical, Cast, CreditCard, FileQuestion, House, ImageIcon, LayoutGrid, Mail, Settings, StepForwardIcon, Users2Icon } from 'lucide-vue-next';

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
                title: 'Specialty Risks',
                href: '/specialty-risk',
            },
            {
                title: 'Divisions',
                href: '/our-divisions',
            },
            {
                title: 'Underwrite',
                href: '/how-we-underwrite',
            },
            {
                title: 'Backed Strength',
                href: '/backed-strength',
            },
            {
                title: 'Specialists',
                href: '/specialists',
            },
            {
                title: 'Structure',
                href: '/our-structure',
            },
            {
                title: 'Get In Touch',
                href: '/get-in-touch',
            }
        ]
    },
    {
        title: 'Credits',
        icon: CreditCard,
        subMenu: [
            {
                title: 'Corporate Credit',
                href: '/corporate-credit',
            },
            {
                title: 'Portfolio Credit',
                href: '/portfolio-credit',
            },
            {
                title: 'Structured Solution',
                href: '/structured-solution',
            },
            {
                title: 'Mortgage Credit',
                href: '/mortgage-credit',
            },
            {
                title: 'Team Overview',
                href: '/team-overview',
            }
        ]
    },
    {
        title: 'Contingency',
        icon: StepForwardIcon,
        subMenu: [
            {
                title: 'Core Coverage',
                href: '/core-coverage',
            },
            {
                title: 'Underwriting Approach',
                href: '/underwriting-approach',
            },
            {
                title: 'Contingency Leadership',
                href: '/contingency-leadership',
            }
        ]
    },
    {
        title: 'Medical Stop Loss',
        icon: BriefcaseMedical,
        subMenu: [
            {
                title: 'Our Process',
                href: '/our-process',
            },
            {
                title: 'Model Built',
                href: '/model-built',
            },
            {
                title: 'Review',
                href: '/review',
            },
            {
                title: 'Working Plan',
                href: '/working-plan',
            }
        ]
    },
    {
        title: 'Excess Reinsurance',
        icon: Cast,
        subMenu: [
            {
                title: 'Core Reinsurance Solution',
                href: '/core-reinsurance-solution',
            },
            {
                title: 'Our Philosophy',
                href: '/our-philosophy',
            },
            {
                title: 'Market Experience',
                href: '/market-experience',
            },
            {
                title: 'Long Term Commitment',
                href: '/long-term-commitment',
            }

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
                title: 'Backed by Amynta',
                href: '/backed-amynta-group',
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
    },
    {
        title: 'Settings',
        href: '/others-settings',
        icon: Settings,
    },

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
