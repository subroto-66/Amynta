<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3';
import $ from 'jquery';
import { onMounted } from 'vue';
import 'dropify/dist/css/dropify.min.css';
import 'dropify';
import Button from '@/components/custom/Button.vue';
import InputLabel from '@/components/custom/InputLabel.vue';
import Label from '@/components/custom/Label.vue';

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

defineProps<{
    users: {
        id: number;
        full_name: string;
        profile_photo: string;
    }[];
}>()

const form = useForm({
    title: '',
    description: '',
    deadline: '',
    priority: '',
    assigned_to: [],
    attachment: null as File | null,
});

const image = (e: Event) => {
    const file = (e.target as HTMLInputElement).files?.[0];

    if (!file) {
        return;
    }

    form.attachment = file;
}

const submit = () => {
    form.post('/projects/store', {
        forceFormData: true,
    });
};

onMounted(() => {
    $('#image').dropify({
        height: 90,
        messages: {
            default: 'Drag and drop a file here or click',
            replace: 'Drag and drop or click to replace',
            remove: 'Remove',
            error: 'Ooops, something wrong happened.'
        }
    });
});
</script>

<template>

    <Head title="Projects Create" />

    <div class="bg-white m-7 p-5 rounded">
        <!-- Header -->
        <div class="flex items-center justify-between border-b pb-3">
            <h1 class="text-xl font-medium">Projects Create</h1>
            <LinkButton label="Back" url="/about-cms" />
        </div>

        <div class="p-5">
            <form @submit.prevent="submit" class="space-y-3">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Title -->
                    <div>
                        <InputLabel label="Title" v-model="form.title" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.title">
                            {{ form.errors.title }}
                        </span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <Label label="Priority" />
                            <select v-model="form.priority"
                                class="border border-gray-300 rounded px-3 py-2 w-full mt-1 text-sm">
                                <option value="">Select priority</option>
                                <option value="low">Low</option>
                                <option value="medium">Medium</option>
                                <option value="high">High</option>
                            </select>
                            <span class="text-red-500 text-sm" v-if="form.errors.title">
                                {{ form.errors.title }}
                            </span>
                        </div>

                        <div>
                            <InputLabel label="Deadline" v-model="form.deadline" type="date" />
                            <span class="text-red-500 text-sm" v-if="form.errors.deadline">
                                {{ form.errors.deadline }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Description -->
                    <div>
                        <Label label="Description" />
                        <textarea v-model="form.description" rows="4"
                            class="w-full border border-gray-300 text-sm rounded-lg p-2.5"></textarea>

                        <span class="text-red-500 text-sm" v-if="form.errors.description">
                            {{ form.errors.description }}
                        </span>
                    </div>

                    <!-- Attachment Upload -->
                    <div>
                        <Label label="Attachment (Optional)" />
                        <input type="file" id="image" @change="image" class="dropify" />

                        <span class="text-red-500 text-sm" v-if="form.errors.attachment">
                            {{ form.errors.attachment }}
                        </span>
                    </div>
                </div>

                <div>
                    <Label label="Assigned to" />
                    <div class="mt-2 grid grid-cols-6 gap-4">
                        <div v-for="user in users" :key="user.id" class="form-check flex items-center">
                            <input class="form-check-input w-3.5 h-3.5 accent-[#352063] cursor-pointer" type="checkbox"
                                :value="user.id" :id="'user-' + user.id" v-model="form.assigned_to" />

                            <label class="form-check-label flex items-center cursor-pointer" :for="'user-' + user.id">
                                <p class="flex-grow-1 ms-2 text-sm">
                                    {{ user.full_name }}
                                </p>
                            </label>
                        </div>

                    </div>
                </div>

                <!-- Submit -->
                <div class="mt-5 border-t pt-4">
                    <Button label="Create" type="submit" />
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