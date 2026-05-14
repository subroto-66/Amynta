<script setup lang="ts">
import Button from '@/components/custom/Button.vue';
import FlashMessage from '@/components/custom/FlashMessage.vue';
import InputLabel from '@/components/custom/InputLabel.vue';
import LinkButton from '@/components/custom/LinkButton.vue';
import Textarea from '@/components/custom/Textarea.vue';
import { Head, useForm } from '@inertiajs/vue3';
import 'dropify';
import 'dropify/dist/css/dropify.min.css';

defineOptions({
    layout: {
        breadcrumbs: [
            {
                title: 'Mortgage Credit List',
                href: '/mortgage-credit',
            },
        ],
    },
});

const props = defineProps<{
    mortgageCredit: any;
    flash: {
        message?: string;
    };
}>()

const form = useForm({

    title: props.mortgageCredit.title,
    description_one: props.mortgageCredit.description_one,
    description_two: props.mortgageCredit.description_two,
    contact_icon: props.mortgageCredit.contact_icon,
    contact_title: props.mortgageCredit.contact_title,
    contact_item_one: props.mortgageCredit.contact_item_one,
    contact_item_two: props.mortgageCredit.contact_item_two,

});


const submit = () => {
    form.post('/mortgage-credit/update', {
        forceFormData: true,
    });
};



</script>

<template>

    <Head title="Mortgage Credit Update" />
    <FlashMessage :message="props.flash.message" />
    <div class="bg-white text-gray-500 m-7 p-5 rounded">
        <!-- Header -->
        <div class="flex items-center justify-between border-b pb-3">
            <h1 class="text-xl font-medium">Mortgage Credit Update</h1>
            <LinkButton label="Back" url="/mortgage-credit" />
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
                        <InputLabel label="Contact Icon" v-model="form.contact_icon" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.contact_icon">
                            {{ form.errors.contact_icon }}
                        </span>
                    </div>

                    <div>
                        <InputLabel label="Contact Title" v-model="form.contact_title" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.contact_title">
                            {{ form.errors.contact_title }}
                        </span>
                    </div>

                    <div>
                        <InputLabel label="Contact Item One" v-model="form.contact_item_one" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.contact_item_one">
                            {{ form.errors.contact_item_one }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Contact Item Two" v-model="form.contact_item_two" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.contact_item_two">
                            {{ form.errors.contact_item_two }}
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
