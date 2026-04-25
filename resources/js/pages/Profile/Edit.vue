<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3'
import $ from 'jquery';
import { CameraIcon } from 'lucide-vue-next';
import { ref, onMounted } from 'vue'
import 'dropify/dist/css/dropify.min.css';
import 'dropify';
import Button from '@/components/custom/Button.vue';
import FlashMessage from '@/components/custom/FlashMessage.vue';
import Label from '@/components/custom/Label.vue';
import DeleteUser from '@/components/DeleteUser.vue';
import Security from '../settings/Security.vue';

defineOptions({
    layout: {
        breadcrumbs: [
            {
                title: 'Profile settings',
                href: '/profile/edit',
            },
        ],
    },
});

const props = defineProps<{
    user: {
        id: number;
        full_name: string;
        email: string;
        password: string;
        personal_email: string;
        phone_number: string;
        date_of_birth: string;
        blood_group: string;
        residential_address: string;
        permanent_address: string;
        nid_card: string | null;
        profile_photo: string | null;
        education_documents: string | null;
        resume: string | null;
    };

    flash: {
        message?: string;
    };

}>()


const form = useForm({
    full_name: props.user.full_name,
    email: props.user.email,
    personal_email: props.user.personal_email,
    phone_number: props.user.phone_number,
    date_of_birth: props.user.date_of_birth,
    blood_group: props.user.blood_group,
    residential_address: props.user.residential_address,
    permanent_address: props.user.permanent_address,
    nid_card: null as File | null,
    profile_photo: null as File | null,
    education_documents: null as File | null,
    resume: null as File | null,
})

const activeTab = ref<'personal' | 'security' | 'password'>('personal')

const imageForm = useForm({
    profile_photo: null as File | null
})

const uploadPhoto = () => {
    imageForm.post(`/profile/photo/upload`, {
        forceFormData: true
    })
}

// submit
const submit = () => {
    form.post(`/profile/update`, {
        forceFormData: true
    })
}

// image preview
const preview = ref<string | null>(props.user.profile_photo)

const handleImage = (e: any) => {
    const file = e.target.files[0]

    if (file) {
        imageForm.profile_photo = file
        preview.value = URL.createObjectURL(file)

        uploadPhoto()
    }
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

const educationDropify = () => {
    $('.educationImage').dropify({
        height: 100,
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
        height: 100,
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
        height: 100,
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
    educationDropify();
    nidDropify();
    resumeDropify();
});
</script>

<template>
    <FlashMessage :message="props.flash.message" />

    <Head title="Profile settings" />
    <div class="p-6 grid grid-cols-12 gap-6 bg-gray-100 min-h-screen">

        <!-- LEFT -->
        <div class="col-span-12 lg:col-span-3 space-y-6">

            <!-- Profile -->
            <div class="bg-white rounded-lg shadow p-6 text-center">
                <div class="relative w-30 h-30 mx-auto">

                    <img :src="preview || 'https://via.placeholder.com/150'"
                        class="rounded-full border-4 border-yellow-400 w-full h-full object-cover" />

                    <form @submit.prevent="uploadPhoto">
                        <input type="file" accept="image/*" @change="handleImage" class="hidden" id="fileInput" />
                    </form>

                    <label for="fileInput"
                        class="absolute bottom-1 right-1 bg-white p-2 rounded-full shadow hover:bg-gray-100 cursor-pointer">
                        <CameraIcon class="w-5 h-5 text-gray-700" />
                    </label>

                </div>

                <h2 class="mt-4 text-lg font-semibold">
                    {{ form.full_name }}
                </h2>

                <p class="text-gray-500 text-sm">
                    {{ form.email }}
                </p>
            </div>

        </div>

        <!-- RIGHT -->
        <div class="col-span-12 lg:col-span-9">
            <div class="bg-white rounded-lg shadow p-6">

                <!-- Tabs -->
                <div class="flex space-x-6 border-b mb-6 text-sm">
                    <button @click="activeTab = 'personal'" :class="activeTab === 'personal'
                        ? 'pb-2 border-b-2 border-purple-500 text-purple-500'
                        : 'text-gray-500'" class="px-2 py-1.5 text-sm font-medium transition cursor-pointer">
                        Personal Details
                    </button>

                    <button @click="activeTab = 'password'" :class="activeTab === 'password'
                        ? 'pb-2 border-b-2 border-purple-500 text-purple-500'
                        : 'text-gray-500'" class="px-2 py-1.5 text-sm font-medium transition cursor-pointer">
                        Password
                    </button>
                    <button @click="activeTab = 'security'" :class="activeTab === 'security'
                        ? 'pb-2 border-b-2 border-purple-500 text-purple-500'
                        : 'text-gray-500'" class="px-2 py-1.5 text-sm font-medium transition cursor-pointer">
                        Security
                    </button>
                </div>


                <div v-if="activeTab === 'personal'">
                    <form @submit.prevent="submit" class="grid grid-cols-12 gap-4 text-sm">

                        <!-- Full Name -->
                        <div class="col-span-6">
                            <label class="block mb-1">Full Name</label>
                            <input v-model="form.full_name" class="w-full border rounded-lg p-2" />
                        </div>

                        <!-- Email -->
                        <div class="col-span-6">
                            <label class="block mb-1">Email</label>
                            <input v-model="form.email" class="w-full border rounded-lg p-2" />
                        </div>

                        <!-- Personal Email -->
                        <div class="col-span-6">
                            <label class="block mb-1">Personal Email</label>
                            <input v-model="form.personal_email" class="w-full border rounded-lg p-2" />
                        </div>

                        <!-- Phone -->
                        <div class="col-span-6">
                            <label class="block mb-1">Phone</label>
                            <input v-model="form.phone_number" class="w-full border rounded-lg p-2" />
                        </div>

                        <!-- DOB -->
                        <div class="col-span-6">
                            <label class="block mb-1">Date of Birth</label>
                            <input type="date" v-model="form.date_of_birth" class="w-full border rounded-lg p-2" />
                        </div>

                        <!-- Blood Group -->
                        <div class="col-span-6">
                            <label class="block mb-1">Blood Group</label>
                            <input v-model="form.blood_group" class="w-full border rounded-lg p-2" />
                        </div>

                        <!-- Address -->
                        <div class="col-span-6">
                            <label class="block mb-1">Residential Address</label>
                            <input v-model="form.residential_address" class="w-full border rounded-lg p-2" />
                        </div>

                        <div class="col-span-6">
                            <label class="block mb-1">Permanent Address</label>
                            <input v-model="form.permanent_address" class="w-full border rounded-lg p-2" />
                        </div>

                        <div class="col-span-4">
                            <Label label="Nid" />
                            <input type="file" class="nidImage" @change="nidImage">
                        </div>

                        <div class="col-span-4">
                            <Label label="Education documents" />
                            <input type="file" class="educationImage" @change="eduImage">
                        </div>

                        <div class="col-span-4">
                            <Label label="Resume" />
                            <input type="file" class="resumeImage" @change="resumeImage">
                        </div>

                        <!-- Buttons -->
                        <div class="col-span-12 flex justify-end gap-3 mt-4 border-t pt-4 border-dashed">
                            <Button label="Update" type="submit" />
                        </div>

                    </form>
                </div>

                <!-- password -->
                <div v-else-if="activeTab === 'password'" class="text-center py-10 text-gray-500">
                    <Security />
                </div>

                <!-- security -->
                <div v-else-if="activeTab === 'security'" class="text-center py-10 text-gray-500">
                    <DeleteUser />
                </div>

            </div>
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