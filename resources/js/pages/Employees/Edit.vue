<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3';
import $ from 'jquery';
import { onMounted } from 'vue';
import Button from '@/components/custom/Button.vue';
import InputLabel from '@/components/custom/InputLabel.vue';
import Label from '@/components/custom/Label.vue';
import LinkButton from '@/components/custom/LinkButton.vue';
import 'dropify/dist/css/dropify.min.css';
import 'dropify';

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
}>()

const form = useForm({
    full_name: props.user.full_name || '',
    email: props.user.email || '',
    password: '',
    personal_email: props.user.personal_email || '',
    phone_number: props.user.phone_number || '',
    date_of_birth: props.user.date_of_birth || '',
    blood_group: props.user.blood_group || '',
    residential_address: props.user.residential_address || '',
    permanent_address: props.user.permanent_address || '',

    basic_salary: props.user.salary?.basic_salary || '',
    allowances: props.user.salary?.allowances || '',
    bonus_eligibility: props.user.salary?.bonus_eligibility || 0,
    payment_method: props.user.salary?.payment_method || '',
    bank_name: props.user.salary?.bank_name || '',
    account_number: props.user.salary?.account_number || '',
    tax_identification_number: props.user.salary?.tax_identification_number || '',
    provident_fund_status: props.user.salary?.provident_fund_status || 0,

    designation: props.user.job_info?.designation || '',
    department: props.user.job_info?.department || '',
    employee_status: props.user.job_info?.employee_status || '',
    employee_type: props.user.job_info?.employee_type || '',
    work_location: props.user.job_info?.work_location || '',
    join_date: props.user.job_info?.join_date || '',
    probation_end_date: props.user.job_info?.probation_end_date || '',
    confirmation_date: props.user.job_info?.confirmation_date || '',
    annual_leave_balance: props.user.leave?.annual_leave_balance || '',
    sick_leave_balance: props.user.leave?.sick_leave_balance || '',
    casual_leave_balance: props.user.leave?.casual_leave_balance || '',
    emergency_leave_balance: props.user.leave?.emergency_leave_balance || '',
    nid_card: null as File | null,
    profile_photo: null as File | null,
    education_documents: null as File | null,
    resume: null as File | null,
});

const submit = () => {
    form.post('/employees/update/' + props.user.id, {
        forceFormData: true,
        onSuccess: () => {
            form.reset();
        }
    });
};

const profileImage = (e: Event) => {
    const file = (e.target as HTMLInputElement).files?.[0];

    if (!file) {
        return;
    }

    form.profile_photo = file;
}

const eduImage = (e: Event) => {
    const file = (e.target as HTMLInputElement).files?.[0];

    if (!file) {
        return;
    }

    form.education_documents = file;
}

const nidImage = (e: Event) => {
    const file = (e.target as HTMLInputElement).files?.[0];

    if (!file) {
        return;
    }

    form.nid_card = file;
}

const resumeImage = (e: Event) => {
    const file = (e.target as HTMLInputElement).files?.[0];

    if (!file) {
        return;
    }

    form.nid_card = file;
}

const mainDropify = () => {
    $('.mainImage').dropify({
        height: 120,
        defaultFile: props.user.profile_photo,
        messages: {
            default: 'Drag and drop or click',
            replace: 'Replace',
            remove: 'Remove',
            error: 'Error'
        }
    });
};

const educationDropify = () => {
    $('.educationImage').dropify({
        height: 120,
        defaultFile: props.user.education_documents,
        messages: {
            default: 'Drag and drop or click',
            replace: 'Replace',
            remove: 'Remove',
            error: 'Error'
        }
    });
};

const nidDropify = () => {
    $('.nidImage').dropify({
        height: 120,
        defaultFile: props.user.nid_card,
        messages: {
            default: 'Drag and drop or click',
            replace: 'Replace',
            remove: 'Remove',
            error: 'Error'
        }
    });
};

const resumeDropify = () => {
    $('.resumeImage').dropify({
        height: 120,
        defaultFile: props.user.resume,
        messages: {
            default: 'Drag and drop or click',
            replace: 'Replace',
            remove: 'Remove',
            error: 'Error'
        }
    });
};

onMounted(() => {
    mainDropify();
    educationDropify();
    nidDropify();
    resumeDropify();
});

</script>

<template>

    <Head title="Employees" />

    <div class="bg-white m-7 p-5 rounded">

        <!-- Header -->
        <div class="flex items-center justify-between border-b pb-3">
            <h1 class="text-xl font-medium">Employees Update</h1>
            <LinkButton label="Back" url="/employees" />
        </div>

        <div class="p-5">
            <form @submit.prevent="submit">

                <!-- Main Fields -->
                <div class="mb-3 space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3">
                        <div>
                            <InputLabel label="Full Name" v-model="form.full_name" type="text" />
                        </div>

                        <div>
                            <InputLabel label="Email" v-model="form.email" type="email" />
                        </div>

                        <div>
                            <InputLabel label="Password" v-model="form.password" type="password" />
                        </div>

                        <div>
                            <InputLabel label="Personal Email" v-model="form.personal_email" type="email" />
                        </div>

                        <div>
                            <InputLabel label="Phone Number" v-model="form.phone_number" type="text" />
                        </div>

                        <div>
                            <InputLabel label="Date of Birth" v-model="form.date_of_birth" type="date" />
                        </div>

                        <div>
                            <InputLabel label="Blood Group" v-model="form.blood_group" type="text" />
                        </div>

                        <div>
                            <InputLabel label="Residential Address" v-model="form.residential_address" type="text" />
                        </div>

                        <div>
                            <InputLabel label="Permanent Address" v-model="form.permanent_address" type="text" />
                        </div>

                        <div>
                            <InputLabel label="Basic Salary" v-model="form.basic_salary" type="number" />
                        </div>

                        <div>
                            <InputLabel label="Allowances" v-model="form.allowances" type="number" />
                        </div>

                        <div>
                            <Label label="Bonus Eligibility" />
                            <select class="border border-gray-300 rounded px-3 py-2 w-full mt-1 text-sm"
                                v-model="form.bonus_eligibility">
                                <option value="">Select Bonus Eligibility</option>
                                <option :value="0">No</option>
                                <option :value="1">Yes</option>
                            </select>
                        </div>

                        <div>
                            <InputLabel label="Payment Method" v-model="form.payment_method" type="text" />
                        </div>

                        <div>
                            <InputLabel label="Bank Name" v-model="form.bank_name" type="text" />
                        </div>

                        <div>
                            <InputLabel label="Account Number" v-model="form.account_number" type="text" />
                        </div>

                        <div>
                            <InputLabel label="Tax identification number" v-model="form.tax_identification_number"
                                type="number" />
                        </div>

                        <div>
                            <Label label="Provident fund status" />
                            <select class="border border-gray-300 rounded px-3 py-2 w-full mt-1 text-sm"
                                v-model="form.provident_fund_status">
                                <option value="">Select provident fund status</option>
                                <option :value="0">No</option>
                                <option :value="1">Yes</option>
                            </select>
                        </div>

                        <div>
                            <InputLabel label="Designation" v-model="form.designation" type="text" />
                        </div>

                        <div>
                            <InputLabel label="Department" v-model="form.department" type="text" />
                        </div>

                        <div>
                            <Label label="Employee status" />
                            <select class="border border-gray-300 rounded px-3 py-2 w-full mt-1 text-sm"
                                v-model="form.employee_status">
                                <option value="">Select employee status</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                                <option value="resigned">Resigned</option>
                                <option value="terminated">Terminated</option>
                            </select>
                        </div>
                        <div>
                            <Label label="Employee type" />
                            <select class="border border-gray-300 rounded px-3 py-2 w-full mt-1 text-sm"
                                v-model="form.employee_type">
                                <option value="">Select employee type</option>
                                <option value="full_time">
                                    Full time</option>
                                <option value="part_time">Part time</option>
                                <option value="contract">Contract</option>
                                <option value="intern">Intern</option>
                            </select>
                        </div>

                        <div>
                            <InputLabel label="Work location" v-model="form.work_location" type="text" />
                        </div>

                        <div>
                            <InputLabel label="Join Date" v-model="form.join_date" type="date" />
                        </div>

                        <div>
                            <InputLabel label="Probation End Date" v-model="form.probation_end_date" type="date" />
                        </div>

                        <div class="grid grid-cols-5 gap-4 col-span-4">
                            <div>
                                <InputLabel label="Confirmation Date" v-model="form.confirmation_date" type="date" />
                                <span class="text-red-500 text-sm" v-if="form.errors.confirmation_date">
                                    {{ form.errors.confirmation_date }}
                                </span>
                            </div>

                            <div>
                                <InputLabel label="Annual Leave Balance" v-model="form.annual_leave_balance"
                                    type="number" />
                                <span class="text-red-500 text-sm" v-if="form.errors.annual_leave_balance">
                                    {{ form.errors.annual_leave_balance }}
                                </span>
                            </div>

                            <div>
                                <InputLabel label="Sick Leave Balance" v-model="form.sick_leave_balance"
                                    type="number" />
                                <span class="text-red-500 text-sm" v-if="form.errors.sick_leave_balance">
                                    {{ form.errors.sick_leave_balance }}
                                </span>
                            </div>

                            <div>
                                <InputLabel label="Casual Leave Balance" v-model="form.casual_leave_balance"
                                    type="number" />
                                <span class="text-red-500 text-sm" v-if="form.errors.casual_leave_balance">
                                    {{ form.errors.casual_leave_balance }}
                                </span>
                            </div>

                            <div>
                                <InputLabel label="Emergency Leave Balance" v-model="form.emergency_leave_balance"
                                    type="number" />
                                <span class="text-red-500 text-sm" v-if="form.errors.emergency_leave_balance">
                                    {{ form.errors.emergency_leave_balance }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3">
                        <div class="">
                            <Label label="Profile Picture (optional)" />
                            <input type="file" class="mainImage" @change="profileImage">
                        </div>

                        <div class="">
                            <Label label="Nid" />
                            <input type="file" class="nidImage" @change="nidImage">
                        </div>

                        <div class="">
                            <Label label="Education documents" />
                            <input type="file" class="educationImage" @change="eduImage">
                        </div>

                        <div class="">
                            <Label label="Resume" />
                            <input type="file" class="resumeImage" @change="resumeImage">
                        </div>
                    </div>

                </div>

                <!-- Submit -->
                <div class="border-t pt-4 border-dashed">
                    <Button label="Update" type="submit" />
                </div>

            </form>
        </div>

    </div>
</template>

<style>
.dropify-wrapper .dropify-preview .dropify-render img {
    width: 100% !important;
    height: auto !important;
    object-fit: contain;
}

.dropify-wrapper .dropify-message p {
    font-size: 16px;
    text-align: center;
}
</style>
