<script setup lang="ts">
import Button from '@/components/custom/Button.vue';
import InputLabel from '@/components/custom/InputLabel.vue';
import Label from '@/components/custom/Label.vue';
import LinkButton from '@/components/custom/LinkButton.vue';
import Textarea from '@/components/custom/Textarea.vue';
import { Head, useForm } from '@inertiajs/vue3';
import 'dropify';
import 'dropify/dist/css/dropify.min.css';
import $ from 'jquery';
import { onMounted } from 'vue';

defineOptions({
    layout: {
        breadcrumbs: [
            {
                title: 'Model Built List',
                href: '/model-built',
            },
        ],
    },
});

const props = defineProps<{
    modelBuilt: any;
}>()

const form = useForm({
    title: props.modelBuilt.title,
    description: props.modelBuilt.description,
    svg_icon: null as File | null,
});


const svg_icon = (e: Event) => {
    const file = (e.target as HTMLInputElement).files?.[0];

    if (!file) {
        return;
    }

    form.svg_icon = file;
}

const submit = () => {
    form.post('/model-built/update/' + props.modelBuilt.id, {
        forceFormData: true,
    });
};

onMounted(() => {
    $('#svg_icon').dropify({
        defaultFile: `/ModelBuilt/${props.modelBuilt.svg_icon}`,
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

    <Head title="Model Built Update" />

    <div class="bg-white text-gray-500 m-7 p-5 rounded">
        <!-- Header -->
        <div class="flex items-center justify-between border-b pb-3">
            <h1 class="text-xl font-medium">Model Built Update</h1>
            <LinkButton label="Back" url="/model-built" />
        </div>

        <div class="p-5">
            <form @submit.prevent="submit" class="space-y-3">


                <!-- Title -->
                <div>
                    <InputLabel label="Title" v-model="form.title" type="text" />
                    <span class="text-red-500 text-sm" v-if="form.errors.title">
                        {{ form.errors.title }}
                    </span>
                </div>

                <div>
                    <Label label="Image" />
                    <input type="file" id="svg_icon" @change="svg_icon" class="dropify" />

                    <span class="text-red-500 text-sm" v-if="form.errors.svg_icon">
                        {{ form.errors.svg_icon }}
                    </span>
                </div>

                <div>

                    <Textarea label="Description" v-model="form.description" type="text" />
                    <span class="text-red-500 text-sm" v-if="form.errors.description">
                        {{ form.errors.description }}
                    </span>

                </div>
                <!-- Submit -->
                <div class="mt-5 border-t pt-4">
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
