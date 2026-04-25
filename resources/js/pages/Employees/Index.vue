<script setup lang="ts">
import { Head, Link, router } from '@inertiajs/vue3';
import { EyeIcon, SquarePenIcon, Trash2Icon } from 'lucide-vue-next';
import Swal from 'sweetalert2';
import { ref } from 'vue';
import FilterTable from '@/components/custom/FilterTable.vue';
import FlashMessage from '@/components/custom/FlashMessage.vue';

defineOptions({
    layout: {
        breadcrumbs: [
            {
                title: 'Employees List',
                href: '/employees',
            },
        ],
    },
});

type Employee = {
    id: number
    full_name: string
    employee_id: string
    email: string
    phone_number: string
    date_of_birth: string
}

const props = defineProps<{
    employees: Employee[];
    flash: {
        message?: string;
    };
}>()

const columns = [
    { label: 'ID', key: 'id' },
    { label: 'Full Name', key: 'full_name' },
    { label: 'Email', key: 'email' },
    { label: 'Company Email', key: 'email' },
    { label: 'Phone Number', key: 'phone_number' },
    { label: 'Date of Birth', key: 'date_of_birth' },
    { label: 'Blood Group', key: 'blood_group' },
    { label: 'Action', key: 'action' },
]

const data = ref(props.employees);


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
            router.delete(`/employees/${id}`, {
                preserveScroll: true,
                onSuccess: () => {
                    data.value = props.employees;
                }
            });
        }
    })
}

</script>

<template>

    <Head title="Employees" />
    <FlashMessage :message="props.flash.message" />
    <div class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-7">
        <FilterTable :rows="data" :columns="columns" title="Employees List" create-btn create-text="Create"
            create-url="/employees/create">

            <!-- <template #published_at="{ item }">
                {{ item.published_at.replace('T', ' ').slice(0, 10) }}
            </template> -->

            <template #action="{ item }">
                <div class="flex items-center gap-2">
                    <Link :href="`/employees/edit/${item.id}`"
                        class="bg-[#0AB39C] text-sm cursor-pointer text-white rounded font-medium hover:bg-[#0AB39C] py-2 px-3">
                        <SquarePenIcon class="w-4.5 h-4.5" />
                    </Link>
                    <button @click="deleteEmployee(item.id)"
                        class="bg-[#F06548] text-sm cursor-pointer text-white rounded font-medium py-2 px-3">
                        <Trash2Icon class="w-4.5 h-4.5" />
                    </button>
                     <Link :href="`/employees/profile/${item.id}`"
                        class="bg-[#405189] text-sm cursor-pointer text-white rounded font-medium hover:bg-[#364574] py-2 px-3">
                        <EyeIcon class="w-4.5 h-4.5" />
                    </Link>
                </div>
            </template>
        </FilterTable>
    </div>
</template>
