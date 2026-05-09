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
                title: 'Model Built List',
                href: '/model-built',
            },
        ],
    },
});


const props = defineProps<{
    modelBuilt: {
        id: number;
        title: string;
        svg_icon: string
        description: string
    }[];
    flash: {
        message?: string;
    };
}>()

const columns = [
    { label: 'ID', key: 'id' },
    { label: 'Title', key: 'title' },
    { label: 'Image', key: 'image' },
    { label: 'Action', key: 'action' },
]

const data = ref(props.modelBuilt);

function deleteModelBuilt(id: number) {
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
            router.delete(`/model-built/destroy/${id}`, {
                preserveScroll: true,
                onSuccess: () => {
                    data.value = props.modelBuilt;
                }
            });
        }
    })
}

</script>

<template>

    <Head title="Model Built" />

    <FlashMessage :message="props.flash.message" />
    <div class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-7">
        <FilterTable :rows="data" :columns="columns" title="Model Built List" :create-btn="true" create-text="Create"
            create-url="/model-built/create">

            <template #title="{ item }">
                <span>{{ item.title }}</span>
            </template>

            <template #image="{ item }">
                <img :src="`/ModelBuilt/${item.svg_icon}`" alt="" class="w-16 h-16">
            </template>

            <template #action="{ item }">
                <div class="flex items-center gap-2">
                    <Link :href="`/model-built/edit/${item.id}`"
                        class="bg-[#0AB39C] text-sm cursor-pointer text-white rounded font-medium hover:bg-[#0AB39C] py-2 px-3">
                        <SquarePenIcon class="w-4.5 h-4.5" />
                    </Link>
                    <button @click="deleteModelBuilt(item.id)"
                        class="bg-[#F06548] text-sm cursor-pointer text-white rounded font-medium py-2 px-3">
                        <Trash2Icon class="w-4.5 h-4.5" />
                    </button>
                </div>
            </template>
        </FilterTable>
    </div>
</template>
