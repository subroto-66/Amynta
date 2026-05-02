<script setup lang="ts">
import Button from '@/components/custom/Button.vue';
import InputLabel from '@/components/custom/InputLabel.vue';
import Label from '@/components/custom/Label.vue';
import LinkButton from '@/components/custom/LinkButton.vue';
import Textarea from '@/components/custom/Textarea.vue';
import { Head, useForm } from '@inertiajs/vue3';

defineOptions({
    layout: {
        breadcrumbs: [
            {
                title: 'Get in Touch Settings List',
                href: '/get-in-touch',
            },
        ],
    },
});

const props = defineProps<{
    getInTouch: any;
}>()

const form = useForm({

    commitment_title: props.getInTouch.commitment_title,
    commitment_desc_one: props.getInTouch.commitment_desc_one,
    commitment_desc_two: props.getInTouch.commitment_desc_two,
    get_in_touch_title: props.getInTouch.get_in_touch_title,
    get_in_touch_desc_one: props.getInTouch.get_in_touch_desc_one,
    get_in_touch_desc_two: props.getInTouch.get_in_touch_desc_two,
    get_in_touch_primary_button_text: props.getInTouch.get_in_touch_primary_button_text,
    get_in_touch_primary_button_url: props.getInTouch.get_in_touch_primary_button_url,
    get_in_touch_secondary_button_text: props.getInTouch.get_in_touch_secondary_button_text,
    get_in_touch_secondary_button_url: props.getInTouch.get_in_touch_secondary_button_url,

});


const submit = () => {
    form.post('/get-in-touch/update', {
        forceFormData: true,
    });
};



</script>

<template>

    <Head title="Get In Touch Update" />

    <div class="bg-white m-7 p-5 rounded">
        <!-- Header -->
        <div class="flex items-center justify-between border-b pb-3">
            <h1 class="text-xl font-medium">Get In Touch Update</h1>
            <LinkButton label="Back" url="/get-in-touch" />
        </div>

        <div class="p-5">
            <form @submit.prevent="submit" class="space-y-3">
                <!-- Title -->
                <div>
                    <InputLabel label="Commitment Title" v-model="form.commitment_title" type="text" />
                    <span class="text-red-500 text-sm" v-if="form.errors.commitment_title">
                        {{ form.errors.commitment_title }}
                    </span>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <Textarea label="Commitment Description One" v-model="form.commitment_desc_one" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.commitment_desc_one">
                            {{ form.errors.commitment_desc_one }}
                        </span>
                    </div>
                    <div>
                        <Textarea label="Commitment Description Two" v-model="form.commitment_desc_two" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.commitment_desc_two">
                            {{ form.errors.commitment_desc_two }}
                        </span>
                    </div>

                </div>
                <div>
                    <InputLabel label="Get In Touch Title" v-model="form.get_in_touch_title" type="text" />
                    <span class="text-red-500 text-sm" v-if="form.errors.get_in_touch_title">
                        {{ form.errors.get_in_touch_title }}
                    </span>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <Textarea label="Get In Touch Description One" v-model="form.get_in_touch_desc_one" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.get_in_touch_desc_one">
                            {{ form.errors.get_in_touch_desc_one }}
                        </span>
                    </div>
                    <div>
                        <Textarea label="Get In Touch Description Two" v-model="form.get_in_touch_desc_two" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.get_in_touch_desc_two">
                            {{ form.errors.get_in_touch_desc_two }}
                        </span>
                    </div>

                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <InputLabel label="Get In Touch Primary Button Text" v-model="form.get_in_touch_primary_button_text" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.get_in_touch_primary_button_text">
                            {{ form.errors.get_in_touch_primary_button_text }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Get In Touch Primary Button URL" v-model="form.get_in_touch_primary_button_url" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.get_in_touch_primary_button_url">
                            {{ form.errors.get_in_touch_primary_button_url }}
                        </span>
                    </div>

                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <InputLabel label="Get In Touch Secondary Button Text" v-model="form.get_in_touch_secondary_button_text" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.get_in_touch_secondary_button_text">
                            {{ form.errors.get_in_touch_secondary_button_text }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Get In Touch Secondary Button URL" v-model="form.get_in_touch_secondary_button_url" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.get_in_touch_secondary_button_url">
                            {{ form.errors.get_in_touch_secondary_button_url }}
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
