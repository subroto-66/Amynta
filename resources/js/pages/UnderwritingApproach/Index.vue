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
                title: 'Underwriting Approach List',
                href: '/underwriting-approach',
            },
        ],
    },
});


const props = defineProps<{
    underwritingApproaches: {
        id: number;
        number: string;
        title: string;
        image: string
    }[];
    flash: {
        message?: string;
    };
}>()

const columns = [
    { label: 'ID', key: 'id' },
    { label: 'Number', key: 'number' },
    { label: 'Title', key: 'title' },
    { label: 'Image', key: 'image' },
    { label: 'Action', key: 'action' },
]

const data = ref(props.underwritingApproaches);

function deleteUnderwritingApproach(id: number) {
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
            router.delete(`/underwriting-approach/destroy/${id}`, {
                preserveScroll: true,
                onSuccess: () => {
                    data.value = props.underwritingApproaches;
                }
            });
        }
    })
}

</script>

<template>

    <Head title="Underwriting Approach" />

    <FlashMessage :message="props.flash.message" />
    <div class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-7">
        <FilterTable :rows="data" :columns="columns" title="Underwriting Approach List" :create-btn="true" create-text="Create"
            create-url="/underwriting-approach/create">

            <template #number="{ item }">
                <span>{{ item.number }}</span>
            </template>

            <template #title="{ item }">
                <span>{{ item.title }}</span>
            </template>

            <template #image="{ item }">
                <img :src="`/underwritingApproach/${item.image}`" alt="" class="w-16 h-16">
            </template>

            <template #action="{ item }">
                <div class="flex items-center gap-2">
                    <Link :href="`/underwriting-approach/edit/${item.id}`"
                        class="bg-[#0AB39C] text-sm cursor-pointer text-white rounded font-medium hover:bg-[#0AB39C] py-2 px-3">
                        <SquarePenIcon class="w-4.5 h-4.5" />
                    </Link>
                    <button @click="deleteUnderwritingApproach(item.id)"
                        class="bg-[#F06548] text-sm cursor-pointer text-white rounded font-medium py-2 px-3">
                        <Trash2Icon class="w-4.5 h-4.5" />
                    </button>
                </div>
            </template>
        </FilterTable>
    </div>
</template>
