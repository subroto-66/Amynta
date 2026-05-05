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
                title: 'Underwriting Approach List',
                href: '/underwriting-approach',
            },
        ],
    },
});

const props = defineProps<{
    underwritingApproach: any;
}>()

const form = useForm({
    title: props.underwritingApproach.title,
    number: props.underwritingApproach.number,
    description: props.underwritingApproach.description,
    image: null as File | null,
});


const image = (e: Event) => {
    const file = (e.target as HTMLInputElement).files?.[0];

    if (!file) {
        return;
    }

    form.image = file;
}

const submit = () => {
    form.post('/underwriting-approach/update/' + props.underwritingApproach.id, {
        forceFormData: true,
    });
};

onMounted(() => {
    $('#image').dropify({
        defaultFile: `/underwriting-approach/${props.underwritingApproach.image}`,
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

    <Head title="Underwriting Approach Update" />

    <div class="bg-white text-gray-500 m-7 p-5 rounded">
        <!-- Header -->
        <div class="flex items-center justify-between border-b pb-3">
            <h1 class="text-xl font-medium">Underwriting Approach Update</h1>
            <LinkButton label="Back" url="/underwriting-approach" />
        </div>

        <div class="p-5">
            <form @submit.prevent="submit" class="space-y-3">

                <!-- Number -->
                <div>
                    <InputLabel label="Number" v-model="form.number" type="text" />
                    <span class="text-red-500 text-sm" v-if="form.errors.number">
                        {{ form.errors.number }}
                    </span>
                </div>


                <!-- Title -->
                <div>
                    <InputLabel label="Title" v-model="form.title" type="text" />
                    <span class="text-red-500 text-sm" v-if="form.errors.title">
                        {{ form.errors.title }}
                    </span>
                </div>

                <div>
                    <Label label="Image" />
                    <input type="file" id="image" @change="image" class="dropify" />

                    <span class="text-red-500 text-sm" v-if="form.errors.image">
                        {{ form.errors.image }}
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
