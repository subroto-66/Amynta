<script setup lang="ts">
import Button from '@/components/custom/Button.vue';
import FlashMessage from '@/components/custom/FlashMessage.vue';
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
                title: 'Team Overview List',
                href: '/team-overview',
            },
        ],
    },
});

const props = defineProps<{
    teamOverview: any;
    flash: {
        message?: string;
    };
}>()

const form = useForm({

    title: props.teamOverview.title,
    description_one: props.teamOverview.description_one,
    description_two: props.teamOverview.description_two,
    image_text: props.teamOverview.image_text,
    primary_button_text: props.teamOverview.primary_button_text,
    primary_button_link: props.teamOverview.primary_button_link,
    secondary_button_text: props.teamOverview.secondary_button_text,
    secondary_button_link: props.teamOverview.secondary_button_link,
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
    form.post('/team-overview/update', {
        forceFormData: true,
    });
};


onMounted(() => {

    $('#image').dropify({
        defaultFile: `/credit/${props.teamOverview.image}`,
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

    <Head title="Team Overview Update" />
    <FlashMessage :message="props.flash.message" />
    <div class="bg-white text-gray-500 m-7 p-5 rounded">
        <!-- Header -->
        <div class="flex items-center justify-between border-b pb-3">
            <h1 class="text-xl font-medium">Team Overview Update</h1>
            <LinkButton label="Back" url="/team-overview" />
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
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <Textarea label="Description One" v-model="form.description_one" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.description_one">
                            {{ form.errors.description_one }}
                        </span>
                    </div>
                    <div>
                        <Textarea label="Description Two" v-model="form.description_two" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.description_two">
                            {{ form.errors.description_two }}
                        </span>
                    </div>

                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <Label label="Image" />
                        <input type="file" id="image" @change="image" class="dropify" />

                        <span class="text-red-500 text-sm" v-if="form.errors.image">
                            {{ form.errors.image }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Image Text" v-model="form.image_text" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.image_text">
                            {{ form.errors.image_text }}
                        </span>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <div>
                        <InputLabel label="Primary Button Text" v-model="form.primary_button_text" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.primary_button_text">
                            {{ form.errors.primary_button_text }}
                        </span>
                    </div>

                    <div>
                        <InputLabel label="Primary Button Link" v-model="form.primary_button_link" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.primary_button_link">
                            {{ form.errors.primary_button_link }}
                        </span>
                    </div>

                    <div>
                        <InputLabel label="Secondary Button Text" v-model="form.secondary_button_text" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.secondary_button_text">
                            {{ form.errors.secondary_button_text }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Secondary Button Link" v-model="form.secondary_button_link" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.secondary_button_link">
                            {{ form.errors.secondary_button_link }}
                        </span>
                    </div>

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
