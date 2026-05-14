<script setup lang="ts">
import Button from '@/components/custom/Button.vue';
import FlashMessage from '@/components/custom/FlashMessage.vue';
import InputLabel from '@/components/custom/InputLabel.vue';
import LinkButton from '@/components/custom/LinkButton.vue';
import { Head, useForm } from '@inertiajs/vue3';
defineOptions({
    layout: {
        breadcrumbs: [
            {
                title: 'Built Rfp Form',
                href: '/built-rfp-form',
            },
        ],
    },
});

const props = defineProps<{
    builtRfpForm: any;
    flash: {
        message?: string;
    };
}>()

const form = useForm({

    title: props.builtRfpForm.title,
    description: props.builtRfpForm.description,
    button_text: props.builtRfpForm.button_text,
    button_link: props.builtRfpForm.button_link,
    rfp_form_title: props.builtRfpForm.rfp_form_title,
    rfp_form_subtitle: props.builtRfpForm.rfp_form_subtitle,
    rfp_item_one: props.builtRfpForm.rfp_item_one,
    rfp_item_two: props.builtRfpForm.rfp_item_two,
    rfp_item_three: props.builtRfpForm.rfp_item_three,
    rfp_footer_text: props.builtRfpForm.rfp_footer_text
    
});

const submit = () => {
    form.post(`/built-rfp-form/update`, {
        forceFormData: true,
    });
};
</script>

<template>

    <Head title="Built Rfp Form Edit" />
    <FlashMessage :message="props.flash.message" />
    <div class="bg-white text-gray-500 m-7 p-5 rounded">
        <!-- Header -->
        <div class="flex items-center justify-between border-b pb-3">
            <h1 class="text-xl font-medium">Built Rfp Form Update</h1>
            <LinkButton label="Back" url="/built-rfp-form" />
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

                    <div>
                        <InputLabel label="Sub Title" v-model="form.description" type="text" />
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
                    <div>
                        <InputLabel label="Button Link" v-model="form.button_link" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.button_link">
                            {{ form.errors.button_link }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Rfp Form Title" v-model="form.rfp_form_title" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.rfp_form_title">
                            {{ form.errors.rfp_form_title }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Rfp Form Subtitle" v-model="form.rfp_form_subtitle" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.rfp_form_subtitle">
                            {{ form.errors.rfp_form_subtitle }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Rfp Item One" v-model="form.rfp_item_one" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.rfp_item_one">
                            {{ form.errors.rfp_item_one }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Rfp Item Two" v-model="form.rfp_item_two" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.rfp_item_two">
                            {{ form.errors.rfp_item_two }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Rfp Item Three" v-model="form.rfp_item_three" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.rfp_item_three">
                            {{ form.errors.rfp_item_three }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Rfp Footer Text" v-model="form.rfp_footer_text" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.rfp_footer_text">
                            {{ form.errors.rfp_footer_text }}
                        </span>
                    </div>
                </div>

                <div class="mt-5 border-t pt-4">
                    <Button label="Update" type="submit" />
                </div>

            </form>
        </div>
    </div>
</template>


