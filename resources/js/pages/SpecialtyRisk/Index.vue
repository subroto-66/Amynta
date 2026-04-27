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
                title: 'Specialty Risks',
                href: '/specialty-risk',
            },
        ],
    },
});


const props = defineProps<{
    specialtyRisks: {
        id: number;
        index: number;
        title: string;
    }[];
    flash: {
        message?: string;
    };
}>()

const columns = [
    { label: 'ID', key: 'id' },
    { label: 'Index', key: 'index' },
    { label: 'Title', key: 'title' },
    { label: 'Action', key: 'action' },
]

const data = ref(props.specialtyRisks);

function deleteSpecialtyRisk(id: number) {
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
            router.delete(`/specialty-risk/${id}`, {
                preserveScroll: true,
                onSuccess: () => {
                    data.value = props.specialtyRisks;
                }
            });
        }
    })
}

</script>

<template>

    <Head title="Specialty Risks" />

    <FlashMessage :message="props.flash.message" />
    <div class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-7">
        <FilterTable :rows="data" :columns="columns" title="Specialty Risks List" :create-btn="true" create-text="Create"
            create-url="/specialty-risk/create">

            <template #title="{ item }">
                <span>{{ item.title.slice(0, 100) }}</span>
            </template>

            <template #action="{ item }">
                <div class="flex items-center gap-2">
                    <Link :href="`/specialty-risk/${item.id}/edit`"
                        class="bg-[#0AB39C] text-sm cursor-pointer text-white rounded font-medium hover:bg-[#0AB39C] py-2 px-3">
                        <SquarePenIcon class="w-4.5 h-4.5" />
                    </Link>
                    <button @click="deleteSpecialtyRisk(item.id)"
                        class="bg-[#F06548] text-sm cursor-pointer text-white rounded font-medium py-2 px-3">
                        <Trash2Icon class="w-4.5 h-4.5" />
                    </button>
                </div>
            </template>
        </FilterTable>
    </div>
</template>
