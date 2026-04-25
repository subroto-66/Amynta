<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { CalendarIcon, MapPinIcon, PenBoxIcon } from 'lucide-vue-next';
import { ref } from 'vue'

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

const props = defineProps<{
    user: any;
    totalLeave: number;
    projects: any[];
    totalProjects: number
    pendingProjects: number
}>()


const activeTab = ref<'projects' | 'leave' | 'documents'>('projects')

const projects = ref(props.projects);

const documents = ref({
    nid_card: props.user.nid_card,
    education_documents: props.user.education_documents,
    resume: props.user.resume
})

const getTaskColor = (index: number) => {
    const hue = (index * 137.508) % 360;

    return `hsl(${hue}, 70%, 50%)`;
};


</script>

<template>

    <Head title="Employees" />

    <div class="relative h-70 bg-cover bg-center z-40"
        style="background-image: linear-gradient(rgba(45, 55, 115, 0.8), rgba(45, 55, 115, 0.8)), url('https://images.unsplash.com/photo-1556910103-1c02745aae4d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');">
        <div class="container mx-auto px-6 pt-10">
            <div class="flex items-center space-x-4">
                <div
                    class="h-22 w-22 rounded-md border-2 border-white overflow-hidden flex items-center justify-center bg-blue-900 text-white text-3xl font-bold">
                    <img v-if="props.user.profile_photo" :src="props.user.profile_photo" alt="Profile"
                        class="w-full h-full object-cover" />

                    <span v-else>
                        {{ props.user.full_name?.charAt(0) || 'U' }}
                    </span>
                </div>
                <div class="space-y-1">
                    <h1 class="text-white text-xl font-semibold">{{ props.user.full_name }}</h1>
                    <p class="text-white font-medium">{{ props.user.job_info?.designation }}</p>
                    <p class="text-gray-300 text-sm">
                        <MapPinIcon class="inline mr-1 w-5 h-5" /> {{ props.user.residential_address }}
                    </p>
                </div>
            </div>
            <div class="absolute bottom-25 right-10">
                <button
                    class="bg-teal-500 hover:bg-teal-600 text-white px-4 py-2 rounded flex items-center text-sm transition cursor-pointer">
                    <Link :href="`/profile/edit`" class="flex items-center">
                        <PenBoxIcon class="mr-2 w-4 h-4" /> Edit Profile
                    </Link>
                </button>
            </div>
        </div>
    </div>

    <div class="container mx-auto -mt-20 pb-12 z-50">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-6">

            <div class="md:col-span-3 bg-white rounded-lg shadow-sm p-6">
                <h2 class="text-gray-700 font-bold mb-6 border-b pb-2">Info</h2>

                <div class="space-y-4 text-sm">

                    <div class="flex justify-between">
                        <span class="text-gray-500 font-semibold">E-mail :</span>
                        <span class="text-gray-700">{{ props.user.email || '-' }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-500 font-semibold">Personal Email :</span>
                        <span class="text-gray-700">{{ props.user.personal_email || '-' }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-500 font-semibold">Phone :</span>
                        <span class="text-gray-700">{{ props.user.phone_number || '-' }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-500 font-semibold">Date of Birth :</span>
                        <span class="text-gray-700">{{ props.user.date_of_birth || '-' }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-500 font-semibold">Blood Group :</span>
                        <span class="text-gray-700">{{ props.user.blood_group || '-' }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-500 font-semibold">Location :</span>
                        <span class="text-gray-700">{{ props.user.job_info?.work_location || '-' }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-500 font-semibold">Department :</span>
                        <span class="text-gray-700">{{ props.user.job_info?.department || '-' }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-500 font-semibold">Employee Status :</span>
                        <span class="text-gray-700">{{ props.user.job_info?.employee_status || '-' }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-500 font-semibold">Employee Type :</span>
                        <span class="text-gray-700">{{ props.user.job_info?.employee_type || '-' }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-500 font-semibold">Join Date :</span>
                        <span class="text-gray-700">{{ props.user.job_info?.join_date || '-' }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-500 font-semibold">Salary :</span>
                        <span class="text-gray-700">
                            {{ props.user.salary?.basic_salary ? props.user.salary.basic_salary + ' ৳' : '-' }}
                        </span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-500 font-semibold">Allowances :</span>
                        <span class="text-gray-700">
                            {{ props.user.salary?.allowances ? props.user.salary.allowances + ' ৳' : '-' }}
                        </span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-500 font-semibold">Payment Method :</span>
                        <span class="text-gray-700">{{ props.user.salary?.payment_method || '-' }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-500 font-semibold">Bank :</span>
                        <span class="text-gray-700">{{ props.user.salary?.bank_name || '-' }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-500 font-semibold">Account Number :</span>
                        <span class="text-gray-700">{{ props.user.salary?.account_number || '-' }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-500 font-semibold">TIN :</span>
                        <span class="text-gray-700">{{ props.user.salary?.tax_identification_number || '-' }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-500 font-semibold">PF Status :</span>
                        <span class="text-gray-700">
                            {{ props.user.salary?.provident_fund_status ? 'Active' : 'Inactive' }}
                        </span>
                    </div>

                    <!-- Leave -->
                    <div class="flex justify-between pt-2">
                        <span class="text-gray-500 font-semibold">Annual Leave :</span>
                        <span class="text-gray-700">{{ props.user.leave?.annual_leave_balance || '-' }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-500 font-semibold">Sick Leave :</span>
                        <span class="text-gray-700">{{ props.user.leave?.sick_leave_balance || '-' }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-500 font-semibold">Emergency Leave :</span>
                        <span class="text-gray-700">{{ props.user.leave?.emergency_leave_balance || '-' }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-500 font-semibold">Casual Leave :</span>
                        <span class="text-gray-700">{{ props.user.leave?.casual_leave_balance || '-' }}</span>
                    </div>

                </div>
            </div>

            <div class="md:col-span-9 space-y-6">

                <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h2 class="text-gray-700 font-bold">Project Assign</h2>
                        <div class="mt-1">
                            <p class="text-gray-600 text-xl font-semibold">
                                {{ props.totalProjects }}
                            </p>
                            <p class="text-gray-600 text-sm">
                                Pending Project: {{ props.pendingProjects }}
                            </p>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h2 class="text-gray-700 font-bold">Total Leave</h2>
                        <div class="mt-1">
                            <p class="text-gray-600 text-xl font-semibold">{{ totalLeave }}</p>
                            <p class="text-gray-600 text-sm">Leave Applied: 08</p>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h2 class="text-gray-700 font-bold">About</h2>
                        <div class="mt-1">
                            <p class="text-gray-600 text-sm">Designation :</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm overflow-hidden">

                    <div class="p-4 border-b flex justify-between items-center">

                        <div class="bg-gray-100 p-1 rounded-full flex">
                            <button @click="activeTab = 'projects'" :class="activeTab === 'projects'
                                ? 'bg-white shadow text-[#00BBA7]'
                                : 'text-gray-500'"
                                class="px-4 py-1.5 rounded-full text-sm font-medium transition cursor-pointer">
                                Projects
                            </button>

                            <button @click="activeTab = 'leave'" :class="activeTab === 'leave'
                                ? 'bg-white shadow text-[#00BBA7]'
                                : 'text-gray-500'"
                                class="px-4 py-1.5 rounded-full text-sm font-medium transition cursor-pointer">
                                Leave
                            </button>

                            <button @click="activeTab = 'documents'" :class="activeTab === 'documents'
                                ? 'bg-white shadow text-[#00BBA7]'
                                : 'text-gray-500'"
                                class="px-4 py-1.5 rounded-full text-sm font-medium transition cursor-pointer">
                                Documents
                            </button>
                        </div>

                    </div>

                    <div class="p-6">

                        <!-- projects -->
                        <div v-if="activeTab === 'projects'">

                            <div class="grid md:grid-cols-3 gap-4">

                                <div v-for="(task, index) in projects" :key="task.id"
                                    class="bg-white p-5 rounded-lg border border-gray-200 border-l-4"
                                    :style="{ borderLeftColor: getTaskColor(index) }">
                                    <div class="flex justify-between items-start">
                                        <h3
                                            class="font-semibold text-gray-800 group-hover:text-blue-600 transition text-base">
                                            {{ task.title }}
                                        </h3>

                                        <span class="text-xs px-2 py-1 rounded-full font-medium" :class="{
                                            'bg-green-100 text-green-600': task.priority === 'low',
                                            'bg-yellow-100 text-yellow-600': task.priority === 'medium',
                                            'bg-red-100 text-red-600': task.priority === 'high'
                                        }">
                                            {{ task.priority }}
                                        </span>
                                    </div>

                                    <p class="text-gray-500 text-sm mt-2 line-clamp-2">
                                        {{ task.description.slice(0, 100) }}
                                    </p>


                                    <div class="flex justify-between items-center mt-4">

                                        <div class="text-xs text-gray-500 flex items-center gap-1">
                                            <CalendarIcon class="w-4 h-4" /> {{ task.deadline }}
                                        </div>

                                        <!-- Status -->
                                        <span class="text-xs px-2 py-1 rounded-full font-medium" :class="{
                                            'bg-gray-100 text-gray-600': task.pivot?.status === 'pending',
                                            'bg-blue-100 text-blue-600': task.pivot?.status === 'in_progress',
                                            'bg-green-100 text-green-600': task.pivot?.status === 'completed',
                                            'bg-red-100 text-red-600': task.pivot?.status === 'delayed'
                                        }">
                                            {{ task.pivot?.status || task.status }}
                                        </span>
                                    </div>

                                    <!-- Actions -->
                                    <div class="flex justify-between mt-2">
                                        <!-- Members -->
                                        <div class="flex items-center -space-x-2">
                                            <template v-for="member in task.users" :key="member.id">
                                                <img v-if="member.profile_photo" :src="member.profile_photo"
                                                    class="w-7 h-7 rounded-full border-2 border-white" />

                                                <div v-else
                                                    class="w-7 h-7 rounded-full bg-gray-300 text-xs flex items-center justify-center border-2 border-white">
                                                    {{ member.full_name.charAt(0).toUpperCase() }}
                                                </div>
                                            </template>
                                        </div>

                                        <button @click="$inertia.visit(`/projects/view/${task.id}`)"
                                            class="text-sm text-blue-600 hover:text-blue-800 font-medium cursor-pointer">
                                            View →
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- LEAVE -->
                        <div v-else-if="activeTab === 'leave'" class="text-center py-10 text-gray-500">
                            <p class="text-lg font-semibold">Leave Management</p>
                            <p class="text-sm mt-1">Coming soon...</p>
                        </div>

                        <!-- documents -->
                        <div v-else class="text-center text-gray-500">
                            <div v-if="!documents.nid_card && !documents.education_documents && !documents.resume"
                                class="text-center text-gray-500">

                                <p class="text-lg font-semibold">No Documents Available</p>
                                <p class="text-sm mt-1">Coming soon...</p>
                            </div>

                            <div v-else class="grid md:grid-cols-3 gap-4">

                                <!-- NID -->
                                <div v-if="documents.nid_card" class="p-4 border rounded-xl">
                                    <p class="font-semibold text-gray-700 mb-2">NID Card</p>
                                    <a :href="documents.nid_card" target="_blank"
                                        class="text-blue-600 text-sm hover:underline">
                                        View Document
                                    </a>
                                </div>

                                <!-- Education -->
                                <div v-if="documents.education_documents" class="p-4 border rounded-xl">
                                    <p class="font-semibold text-gray-700 mb-2">Education</p>
                                    <a :href="documents.education_documents" target="_blank"
                                        class="text-blue-600 text-sm hover:underline">
                                        View Document
                                    </a>
                                </div>

                                <!-- Resume -->
                                <div v-if="documents.resume" class="p-4 border rounded-xl">
                                    <p class="font-semibold text-gray-700 mb-2">Resume</p>
                                    <a :href="documents.resume" target="_blank"
                                        class="text-blue-600 text-sm hover:underline">
                                        View Document
                                    </a>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</template>
