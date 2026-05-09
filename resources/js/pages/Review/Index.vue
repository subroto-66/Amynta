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
                title: 'Review',
                href: '/review',
            },
        ],
    },
});


const props = defineProps<{
    reviews: {
        id: number;
        reviewer_name: string;
        reviewer_position: string;
    }[];
    flash: {
        message?: string;
    };
}>()

const columns = [
    { label: 'ID', key: 'id' },
    { label: 'Name', key: 'reviewer_name' },
    { label: 'Position', key: 'reviewer_position' },
    { label: 'Action', key: 'action' },
]

const data = ref(props.reviews);

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
            router.delete(`/review/destroy/${id}`, {
                preserveScroll: true,
                onSuccess: () => {
                    data.value = props.reviews;
                }
            });
        }
    })
}

</script>

<template>

    <Head title="Review" />

    <FlashMessage :message="props.flash.message" />
    <div class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-7">
        <FilterTable :rows="data" :columns="columns" title="Review List" :create-btn="true"
            create-text="Create" create-url="/review/create">

            <template #title="{ item }">
                <span>{{ item.reviewer_name }}</span>
            </template>

            <template #position="{ item }">
                <span>{{ item.reviewer_position }}</span>
            </template>

            <template #action="{ item }">
                <div class="flex items-center gap-2">
                    <Link :href="`/review/edit/${item.id}`"
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
