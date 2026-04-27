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
                title: 'Hero List',
                href: '/hero',
            },
        ],
    },
});


const props = defineProps<{
    heroes: {
        id: number;
        title_one: string
        title_two: string
        highlight_text: string
        description_one: string
        description_two: string
        primary_button_text: string
        primary_button_link: string
        secondary_button_text: string
        secondary_button_link: string
        page_name: string
        feature_one_title: string
        feature_two_title: string
        feature_three_title: string
        short_title_one: string
        short_title_two: string
        short_description_one: string
        short_description_two: string
    }[];
    flash: {
        message?: string;
    };
}>()

const columns = [
    { label: 'ID', key: 'id' },
    { label: 'Title One', key: 'title_one' },
    { label: 'Page Name', key: 'page_name' },
    { label: 'Action', key: 'action' },
]

const data = ref(props.heroes);

function deleteHero(id: number) {
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
            router.delete(`/hero/destroy/${id}`, {
                preserveScroll: true,
                onSuccess: () => {
                    data.value = props.heroes;
                }
            });
        }
    })
}

</script>

<template>

    <Head title="Hero" />

    <FlashMessage :message="props.flash.message" />
    <div class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-7">
        <FilterTable :rows="data" :columns="columns" title="Hero List" :create-btn="true" create-text="Create"
            create-url="/hero/create">

            <template #title="{ item }">
                <span>{{ item.title_one.slice(0, 100) }}</span>
            </template>

            <template #page_name="{ item }">
                <span class="capitalize">{{ item.page_name }}</span>
            </template>

            <template #action="{ item }">
                <div class="flex items-center gap-2">
                    <Link :href="`/hero/edit/${item.id}`"
                        class="bg-[#0AB39C] text-sm cursor-pointer text-white rounded font-medium hover:bg-[#0AB39C] py-2 px-3">
                        <SquarePenIcon class="w-4.5 h-4.5" />
                    </Link>
                    <button @click="deleteHero(item.id)"
                        class="bg-[#F06548] text-sm cursor-pointer text-white rounded font-medium py-2 px-3">
                        <Trash2Icon class="w-4.5 h-4.5" />
                    </button>
                </div>
            </template>
        </FilterTable>
    </div>
</template>
