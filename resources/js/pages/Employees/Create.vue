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

const form = useForm({
    full_name: '',
    email: '',
    password: '',
    personal_email: '',
    phone_number: '',
    date_of_birth: '',
    blood_group: '',
    residential_address: '',
    permanent_address: '',
    basic_salary: '',
    allowances: '',
    bonus_eligibility: '',
    payment_method: '',
    bank_name: '',
    account_number: '',
    tax_identification_number: '',
    provident_fund_status: '',
    designation: '',
    department: '',
    employee_status: '',
    employee_type: '',
    work_location: '',
    join_date: '',
    probation_end_date: '',
    confirmation_date: '',
    annual_leave_balance: '',
    sick_leave_balance: '',
    casual_leave_balance: '',
    emergency_leave_balance: '',
    nid_card: null as File | null,
    profile_photo: null as File | null,
    education_documents: null as File | null,
    resume: null as File | null,
});

const submit = () => {
    form.post('/employees/store', {
        forceFormData: true,
        onSuccess: () => {
            form.reset();
        },
        onError: () => {
            console.log(form.errors);
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

    form.resume = file;
}

const mainDropify = () => {
    $('.mainImage').dropify({
        height: 120,
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

    <div class="bg-white text-gray-500 m-7 p-5 rounded">

        <!-- Header -->
        <div class="flex items-center justify-between border-b pb-3">
            <h1 class="text-xl font-medium">Employees Create</h1>
            <LinkButton label="Back" url="/employees" />
        </div>

        <div class="p-5">
            <form @submit.prevent="submit">

                <!-- Main Fields -->
                <div class="mb-3 space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3">
                        <div>
                            <InputLabel label="Full Name" v-model="form.full_name" type="text" />
                            <span class="text-red-500 text-sm" v-if="form.errors.full_name">
                                {{ form.errors.full_name }}
                            </span>
                        </div>

                        <div>
                            <InputLabel label="Email" v-model="form.email" type="email" />
                            <span class="text-red-500 text-sm" v-if="form.errors.email">
                                {{ form.errors.email }}
                            </span>
                        </div>

                        <div>
                            <InputLabel label="Password" v-model="form.password" type="password" />
                            <span class="text-red-500 text-sm" v-if="form.errors.password">
                                {{ form.errors.password }}
                            </span>
                        </div>

                        <div>
                            <InputLabel label="Personal Email" v-model="form.personal_email" type="email" />
                            <span class="text-red-500 text-sm" v-if="form.errors.personal_email">
                                {{ form.errors.personal_email }}
                            </span>
                        </div>

                        <div>
                            <InputLabel label="Phone Number" v-model="form.phone_number" type="text" />
                            <span class="text-red-500 text-sm" v-if="form.errors.phone_number">
                                {{ form.errors.phone_number }}
                            </span>
                        </div>

                        <div>
                            <InputLabel label="Date of Birth" v-model="form.date_of_birth" type="date" />
                            <span class="text-red-500 text-sm" v-if="form.errors.date_of_birth">
                                {{ form.errors.date_of_birth }}
                            </span>
                        </div>

                        <div>
                            <InputLabel label="Blood Group" v-model="form.blood_group" type="text" />
                            <span class="text-red-500 text-sm" v-if="form.errors.blood_group">
                                {{ form.errors.blood_group }}
                            </span>
                        </div>

                        <div>
                            <InputLabel label="Residential Address" v-model="form.residential_address" type="text" />
                            <span class="text-red-500 text-sm" v-if="form.errors.residential_address">
                                {{ form.errors.residential_address }}
                            </span>
                        </div>

                        <div>
                            <InputLabel label="Permanent Address" v-model="form.permanent_address" type="text" />
                            <span class="text-red-500 text-sm" v-if="form.errors.permanent_address">
                                {{ form.errors.permanent_address }}
                            </span>
                        </div>

                        <div>
                            <InputLabel label="Basic Salary" v-model="form.basic_salary" type="number" />
                            <span class="text-red-500 text-sm" v-if="form.errors.basic_salary">
                                {{ form.errors.basic_salary }}
                            </span>
                        </div>

                        <div>
                            <InputLabel label="Allowances" v-model="form.allowances" type="number" />
                            <span class="text-red-500 text-sm" v-if="form.errors.allowances">
                                {{ form.errors.allowances }}
                            </span>
                        </div>

                        <div>
                            <Label label="Bonus Eligibility" />
                            <select class="border border-gray-300 rounded px-3 py-2 w-full mt-1 text-sm"
                                v-model="form.bonus_eligibility">
                                <option value="">Select Bonus Eligibility</option>
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                            <span class="text-red-500 text-sm" v-if="form.errors.bonus_eligibility">
                                {{ form.errors.bonus_eligibility }}
                            </span>
                        </div>

                        <div>
                            <InputLabel label="Payment Method" v-model="form.payment_method" type="text" />
                            <span class="text-red-500 text-sm" v-if="form.errors.payment_method">
                                {{ form.errors.payment_method }}
                            </span>
                        </div>

                        <div>
                            <InputLabel label="Bank Name" v-model="form.bank_name" type="text" />
                            <span class="text-red-500 text-sm" v-if="form.errors.bank_name">
                                {{ form.errors.bank_name }}
                            </span>
                        </div>

                        <div>
                            <InputLabel label="Account Number" v-model="form.account_number" type="text" />
                            <span class="text-red-500 text-sm" v-if="form.errors.account_number">
                                {{ form.errors.account_number }}
                            </span>
                        </div>

                        <div>
                            <InputLabel label="Tax identification number" v-model="form.tax_identification_number"
                                type="number" />
                            <span class="text-red-500 text-sm" v-if="form.errors.tax_identification_number">
                                {{ form.errors.tax_identification_number }}
                            </span>
                        </div>

                        <div>
                            <Label label="Provident fund status" />
                            <select class="border border-gray-300 rounded px-3 py-2 w-full mt-1 text-sm"
                                v-model="form.provident_fund_status">
                                <option value="">Select provident fund status</option>
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                            <span class="text-red-500 text-sm" v-if="form.errors.provident_fund_status">
                                {{ form.errors.provident_fund_status }}
                            </span>
                        </div>

                        <div>
                            <InputLabel label="Designation" v-model="form.designation" type="text" />
                            <span class="text-red-500 text-sm" v-if="form.errors.designation">
                                {{ form.errors.designation }}
                            </span>
                        </div>

                        <div>
                            <InputLabel label="Department" v-model="form.department" type="text" />
                            <span class="text-red-500 text-sm" v-if="form.errors.department">
                                {{ form.errors.department }}
                            </span>
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
                            <span class="text-red-500 text-sm" v-if="form.errors.employee_status">
                                {{ form.errors.employee_status }}
                            </span>
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
                            <span class="text-red-500 text-sm" v-if="form.errors.employee_type">
                                {{ form.errors.employee_type }}
                            </span>
                        </div>

                        <div>
                            <InputLabel label="Work location" v-model="form.work_location" type="text" />
                            <span class="text-red-500 text-sm" v-if="form.errors.work_location">
                                {{ form.errors.work_location }}
                            </span>
                        </div>

                        <div>
                            <InputLabel label="Join Date" v-model="form.join_date" type="date" />
                            <span class="text-red-500 text-sm" v-if="form.errors.join_date">
                                {{ form.errors.join_date }}
                            </span>
                        </div>

                        <div>
                            <InputLabel label="Probation End Date" v-model="form.probation_end_date" type="date" />
                            <span class="text-red-500 text-sm" v-if="form.errors.probation_end_date">
                                {{ form.errors.probation_end_date }}
                            </span>
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
                    <Button label="Submit" type="submit" />
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
