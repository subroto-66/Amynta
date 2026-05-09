<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import BarChart from '@/components/custom/BarChart.vue';
import Card from '@/components/custom/Card.vue';
// import LineChart from '@/components/custom/LineChart.vue';
// import PieChart from '@/components/custom/PieChart.vue';
// import Table from '@/components/custom/Table.vue';
import { dashboard } from '@/routes';

defineOptions({
    layout: {
        breadcrumbs: [
            {
                title: 'Dashboard',
                href: dashboard(),
            },
        ],
    },
});


interface Props {
    faq_count: number;
    team_count: number;
    contact_count: number;
    specialist_count: number;
}

const props = defineProps<Props>();

// const column = [
//     {
//         label: 'Name',
//         key: 'name',
//     },
//     {
//         label: 'Email',
//         key: 'email',
//     },
// ]

// const data = [
//     {
//         name: 'John Doe',
//         email: 'qBZQ5@example.com',
//     },
// ]

</script>

<template>

    <Head title="Dashboard" />

    <div class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
        <div class="w-full bg-gray-100 rounded-md overflow-hidden">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 divide-x divide-gray-300">

                <Card title="Total FAQ" :value="props.faq_count">
                    <template #icon>💳</template>
                </Card>

                <Card title="Total Team Memberts" :value="props.team_count">
                    <template #icon>👥</template>
                </Card>

                <Card title="Total Contacts" :value="props.contact_count">
                    <template #icon>🏢</template>
                </Card>

                <Card title="Total Specialist" :value="props.specialist_count">
                    <template #icon>👤 </template>
                </Card>

            </div>
        </div>
        <!-- <div class="flex items-center justify-center space-x-4">
            <div class="w-full h-[44vh] rounded-xl border border-sidebar-border/70 p-5 bg-white dark:bg-sidebar">
                <BarChart />
            </div>
            <div class="w-full h-[44vh] rounded-xl border border-sidebar-border/70 p-5 bg-white dark:bg-sidebar">
                <LineChart />
            </div>
        </div>

        <div class="flex items-center justify-center space-x-4">
            <div class="w-full h-[44vh] rounded-xl border border-sidebar-border/70 p-5 bg-white dark:bg-sidebar">
                <Table :columns="column" title="Users" :rows="data" />
            </div>
            <div class="w-full h-[44vh] rounded-xl border border-sidebar-border/70 p-5 bg-white dark:bg-sidebar">
                <PieChart />
            </div>
        </div> -->

    </div>
</template>
