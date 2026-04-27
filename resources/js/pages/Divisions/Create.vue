<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3';
import $ from 'jquery';
import { onMounted } from 'vue';
import 'dropify/dist/css/dropify.min.css';
import 'dropify';
import Button from '@/components/custom/Button.vue';
import InputLabel from '@/components/custom/InputLabel.vue';
import Label from '@/components/custom/Label.vue';
import LinkButton from '@/components/custom/LinkButton.vue';

defineOptions({
    layout: {
        breadcrumbs: [
            {
                title: 'Divisions List',
                href: '/divisions',
            },
        ],
    },
});

const form = useForm({
    title: '',
    description: '',
    image: null as File | null,
    button_text: '',
    button_link: '',
});

const image = (e: Event) => {
    const file = (e.target as HTMLInputElement).files?.[0];

    if (!file) {
        return;
    }

    form.image = file;
}

const submit = () => {
    form.post('/divisions/store', {
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

    <Head title="Divisions Create" />

    <div class="bg-white m-7 p-5 rounded">
        <!-- Header -->
        <div class="flex items-center justify-between border-b pb-3">
            <h1 class="text-xl font-medium">Divisions Create</h1>
            <LinkButton label="Back" url="/our-divisions" />
        </div>

        <div class="p-5">
            <form @submit.prevent="submit" class="space-y-3">

                <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
                    <!-- Title -->
                    <div>
                        <InputLabel label="Title" v-model="form.title" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.title">
                            {{ form.errors.title }}
                        </span>
                    </div>

                    <!-- image Upload -->
                    <div>
                        <Label label="Image" />
                        <input type="file" id="image" @change="image" class="dropify" />

                        <span class="text-red-500 text-sm" v-if="form.errors.image">
                            {{ form.errors.image }}
                        </span>
                    </div>

                    <div>
              
                        <Label label="Description" />
                        <textarea v-model="form.description" rows="4" class="w-full border border-gray-300 text-sm rounded-lg p-2.5"></textarea>
                        <span class="text-red-500 text-sm" v-if="form.errors.description">
                            {{ form.errors.description }}
                        </span>
                
                    </div>
            
                <div>
                    <InputLabel label="Button Text" v-model="form.button_text" type="text" />
                    <span class="text-red-500 text-sm" v-if="form.errors.button_text">
                        {{ form.errors.button_text }}
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