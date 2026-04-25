<script setup lang="ts">
import { Head, Link, router } from '@inertiajs/vue3';
import { SquarePenIcon, Trash2Icon } from 'lucide-vue-next';
import Swal from 'sweetalert2';
import { ref } from 'vue';
import FilterTable from '@/components/custom/FilterTable.vue';
import FlashMessage from '@/components/custom/FlashMessage.vue';

defineOptions({
    layout: {
        breadcrumbs: [
            {
                title: 'Projects List',
                href: '/projects',
            },
        ],
    },
});


const props = defineProps<{
    projects: {
        id: number;
        title: string
        description: string
        deadline: string
        status: string
    }[];
    flash: {
        message?: string;
    };
}>()

const columns = [
    { label: 'ID', key: 'id' },
    { label: 'Title', key: 'title' },
    { label: 'Description', key: 'description' },
    { label: 'Deadline', key: 'deadline' },
    { label: 'Status', key: 'status' },
    { label: 'Action', key: 'action' },
]

const data = ref(props.projects);

function deleteEmployee(id: number) {
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
            router.delete(`/projects/${id}`, {
                preserveScroll: true,
                onSuccess: () => {
                    data.value = props.projects;
                }
            });
        }
    })
}

</script>

<template>

    <Head title="Projects" />

    <FlashMessage :message="props.flash.message" />
    <div class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-7">
        <FilterTable :rows="data" :columns="columns" title="Projects List" :create-btn="true" create-text="Create"
            create-url="/projects/create">

            <template #title="{ item }">
                <span>{{ item.title.slice(0, 100) }}</span>
            </template>

            <template #action="{ item }">
                <div class="flex items-center gap-2">
                    <Link :href="`/projects/edit/${item.id}`"
                        class="bg-[#0AB39C] text-sm cursor-pointer text-white rounded font-medium hover:bg-[#0AB39C] py-2 px-3">
                        <SquarePenIcon class="w-4.5 h-4.5" />
                    </Link>
                    <button @click="deleteEmployee(item.id)"
                        class="bg-[#F06548] text-sm cursor-pointer text-white rounded font-medium py-2 px-3">
                        <Trash2Icon class="w-4.5 h-4.5" />
                    </button>
                </div>
            </template>
        </FilterTable>
    </div>
</template>
