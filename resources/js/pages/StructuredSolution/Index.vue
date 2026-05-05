<script setup lang="ts">
import FilterTable from '@/components/custom/FilterTable.vue';
import FlashMessage from '@/components/custom/FlashMessage.vue';
import { Head, Link, router } from '@inertiajs/vue3';
import { SquarePenIcon, Trash2Icon } from 'lucide-vue-next';
import Swal from 'sweetalert2';
import { ref } from 'vue';

defineOptions({
    layout: {
        breadcrumbs: [
            {
                title: 'Structured Solution',
                href: '/structured-solution',
            },
        ],
    },
});


const props = defineProps<{
    structuredSolutions: {
        id: number;
        title: string;
        description: string;
        svg_icon: string;
    }[];
    flash: {
        message?: string;
    };
}>()

const columns = [
    { label: 'ID', key: 'id' },
    { label: 'Title', key: 'title' },
    { label: 'Description', key: 'description' },
    { label: 'Action', key: 'action' },
]

const data = ref(props.structuredSolutions);

function deleteStructuredSolution(id: number) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            router.delete(`/structured-solution/destroy/${id}`, {
                preserveScroll: true,
                onSuccess: () => {
                    data.value = props.structuredSolutions;
                }
            });
        }
    })
}

</script>

<template>

    <Head title="Structured Solution" />

    <FlashMessage :message="props.flash.message" />
    <div class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-7">
        <FilterTable :rows="data" :columns="columns" title="Structured Solution List" :create-btn="true"
            create-text="Create" create-url="/structured-solution/create">

            <template #title="{ item }">
                <span>{{ item.title }}</span>
            </template>

            <template #description="{ item }">
                <span>{{ item.description.slice(0, 100) }}</span>
            </template>

            <template #action="{ item }">
                <div class="flex items-center gap-2">
                    <Link :href="`/structured-solution/edit/${item.id}`"
                        class="bg-[#0AB39C] text-sm cursor-pointer text-white rounded font-medium hover:bg-[#0AB39C] py-2 px-3">
                        <SquarePenIcon class="w-4.5 h-4.5" />
                    </Link>
                    <button @click="deleteStructuredSolution(item.id)"
                        class="bg-[#F06548] text-sm cursor-pointer text-white rounded font-medium py-2 px-3">
                        <Trash2Icon class="w-4.5 h-4.5" />
                    </button>
                </div>
            </template>
        </FilterTable>
    </div>
</template>
