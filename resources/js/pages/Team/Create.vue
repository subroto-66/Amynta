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
                title: 'specialists List',
                href: '/specialists',
            },
        ],
    },
});

const form = useForm({
    name: '',
    position: '',
    status: '',
    image: null as File | null,
    mail: '',
    description: '',
    instagram_link: '',
    twitter_link: '',
    linkedin_link: '',
});

const image = (e: Event) => {
    const file = (e.target as HTMLInputElement).files?.[0];

    if (!file) {
        return;
    }

    form.image = file;
}

const submit = () => {
    form.post('/teams/store', {
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

    <Head title="Team Create" />

    <div class="bg-white m-7 p-5 rounded">
        <!-- Header -->
        <div class="flex items-center justify-between border-b pb-3">
            <h1 class="text-xl font-medium">Team Create</h1>
            <LinkButton label="Back" url="/teams" />
        </div>

        <div class="p-5">
            <form @submit.prevent="submit" class="space-y-3">

                <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
                    <!-- Title -->
                    <div>
                        <InputLabel label="Name" v-model="form.name" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.name">
                            {{ form.errors.name }}
                        </span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">


                        <div>
                            <InputLabel label="Position" v-model="form.position" type="text" />
                            <span class="text-red-500 text-sm" v-if="form.errors.position">
                                {{ form.errors.position }}
                            </span>
                        </div>


                        <div>
                            <Label label="Status" />
                            <select v-model="form.status"
                                class="border border-gray-300 rounded px-3 py-2 w-full mt-1 text-sm">
                                <option value="">Select status</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                            <span class="text-red-500 text-sm" v-if="form.errors.status">
                                {{ form.errors.status }}
                            </span>
                        </div>


                    </div>
              
                <!-- image Upload -->
                <div>
                    <Label label="Image" />
                    <input type="file" id="image" @change="image" class="dropify" />

                    <span class="text-red-500 text-sm" v-if="form.errors.image">
                        {{ form.errors.image }}
                    </span>
                </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">


                        <div>
                            <InputLabel label="Mail" v-model="form.mail" type="text" />
                            <span class="text-red-500 text-sm" v-if="form.errors.mail">
                                {{ form.errors.mail }}
                            </span>
                        </div>
                        <div>
                            <InputLabel label="Instagram Link" v-model="form.instagram_link" type="text" />
                            <span class="text-red-500 text-sm" v-if="form.errors.instagram_link">
                                {{ form.errors.instagram_link }}
                            </span>
                        </div>
                        <div>
                            <InputLabel label="twitter_link" v-model="form.twitter_link" type="text" />
                            <span class="text-red-500 text-sm" v-if="form.errors.twitter_link">
                                {{ form.errors.twitter_link }}
                            </span>
                        </div>
                        <div>
                            <InputLabel label="linkedin_link" v-model="form.linkedin_link" type="text" />
                            <span class="text-red-500 text-sm" v-if="form.errors.linkedin_link">
                                {{ form.errors.linkedin_link }}
                            </span>
                        </div>

                    </div>

                    <div>
                        <Label label="Description" />
                        <textarea v-model="form.description" rows="4"
                            class="w-full border border-gray-300 text-sm rounded-lg p-2.5"></textarea>

                        <span class="text-red-500 text-sm" v-if="form.errors.description">
                            {{ form.errors.description }}
                        </span>
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