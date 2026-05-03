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
                title: 'Reach Out List',
                href: '/reach-out',
            },
        ],
    },
});

const props = defineProps<{
    reachOut: any;
}>()

const form = useForm({
    title: props.reachOut.title,
    address_one: props.reachOut.address_one,
    address_two: props.reachOut.address_two,
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
    form.post('/reach-out/update/' + props.reachOut.id, {
        forceFormData: true,
    });
};

onMounted(() => {
    $('#image').dropify({
        defaultFile: `/reachOut/${props.reachOut.image}`,
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

    <Head title="Reach Out Update" />

    <div class="bg-white text-gray-500 m-7 p-5 rounded">
        <!-- Header -->
        <div class="flex items-center justify-between border-b pb-3">
            <h1 class="text-xl font-medium">Reach Out Update</h1>
            <LinkButton label="Back" url="/reach-out" />
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

                    <div>
                        <InputLabel label="Address One" v-model="form.address_one" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.address_one">
                            {{ form.errors.address_one }}
                        </span>
                    </div>

                    <div>
                        <InputLabel label="Address Two" v-model="form.address_two" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.address_two">
                            {{ form.errors.address_two }}
                        </span>
                    </div>


                </div>

                <div>
                    <Label label="Image" />
                    <input type="file" id="image" @change="image" class="dropify" />

                    <span class="text-red-500 text-sm" v-if="form.errors.image">
                        {{ form.errors.image }}
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
