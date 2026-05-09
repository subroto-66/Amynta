<script setup lang="ts">
import Button from '@/components/custom/Button.vue';
import InputLabel from '@/components/custom/InputLabel.vue';
import Label from '@/components/custom/Label.vue';
import LinkButton from '@/components/custom/LinkButton.vue';
import { Head, useForm } from '@inertiajs/vue3';
import 'dropify';
import 'dropify/dist/css/dropify.min.css';
import $ from 'jquery';
import { onMounted } from 'vue';

defineOptions({
    layout: {
        breadcrumbs: [
            {
                title: 'Our Process List',
                href: '/our-process',
            },
        ],
    },
});

const props = defineProps<{
    ourProcess: any;
}>()

const form = useForm({
    number: props.ourProcess.number,
    title: props.ourProcess.title,
    description: props.ourProcess.description,
    svg_icon: props.ourProcess.svg_icon,
});


const image = (e: Event) => {
    const file = (e.target as HTMLInputElement).files?.[0];

    if (!file) {
        return;
    }

    form.svg_icon = file;
}

const submit = () => {
    form.post('/our-process/update/' + props.ourProcess.id, {
        forceFormData: true,
    });
};

onMounted(() => {
    $('#svg_icon').dropify({
        defaultFile: ` our-process/${props.ourProcess.svg_icon}`,
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

    <Head title="Our Process Update" />

    <div class="bg-white text-gray-500 m-7 p-5 rounded">
        <!-- Header -->
        <div class="flex items-center justify-between border-b pb-3">
            <h1 class="text-xl font-medium">Our Process Update</h1>
            <LinkButton label="Back" url="/our-process" />
        </div>

        <div class="p-5">
            <form @submit.prevent="submit" class="space-y-3">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <div>
                        <InputLabel label="Title" v-model="form.title" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.title">
                            {{ form.errors.title }}
                        </span>
                    </div>

                    <!-- Title -->
                    <div>
                        <InputLabel label="Number" v-model="form.number" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.number">
                            {{ form.errors.number }}
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

                <div>
                    <Label label="Image" />
                    <input type="file" id="svg_icon" @change="image" class="dropify" />

                    <span class="text-red-500 text-sm" v-if="form.errors.svg_icon">
                        {{ form.errors.svg_icon }}
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
