<script setup lang="ts">
import Button from '@/components/custom/Button.vue';
import InputLabel from '@/components/custom/InputLabel.vue';
import LinkButton from '@/components/custom/LinkButton.vue';
import Textarea from '@/components/custom/Textarea.vue';
import { Head, useForm } from '@inertiajs/vue3';

defineOptions({
    layout: {
        breadcrumbs: [
            {
                title: 'Corporate Credit Settings List',
                href: '/corporate-credit',
            },
        ],
    },
});

const props = defineProps<{
    corporateCredit: any;
}>()

const form = useForm({

    title: props.corporateCredit.title,
    description: props.corporateCredit.description,
    insure_title: props.corporateCredit.insure_title,
    insure_description: props.corporateCredit.insure_description,
    insure_icon: props.corporateCredit.insure_icon,
    covered_title: props.corporateCredit.covered_title,
    covered_item_one_title: props.corporateCredit.covered_item_one_title,
    covered_item_two_title: props.corporateCredit.covered_item_two_title,
    covered_item_three_title: props.corporateCredit.covered_item_three_title,
    covered_item_one_icon: props.corporateCredit.covered_item_one_icon,
    covered_item_two_icon: props.corporateCredit.covered_item_two_icon,
    covered_item_three_icon: props.corporateCredit.covered_item_three_icon,
    contact_title: props.corporateCredit.contact_title,
    contact_item_one_title: props.corporateCredit.contact_item_one_title,
    contact_item_two_title: props.corporateCredit.contact_item_two_title,
    contact_item_one_icon: props.corporateCredit.contact_item_one_icon,
    contact_item_two_icon: props.corporateCredit.contact_item_two_icon,
});


const submit = () => {
    form.post('/corporate-credit/update', {
        forceFormData: true,
    });
};



</script>

<template>

    <Head title="Corporate Credit Update" />

    <div class="bg-white text-gray-500 m-7 p-5 rounded">
        <!-- Header -->
        <div class="flex items-center justify-between border-b pb-3">
            <h1 class="text-xl font-medium">Corporate Credit Update</h1>
            <LinkButton label="Back" url="/corporate-credit" />
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
                    <Textarea label="Description" v-model="form.description" type="text" />
                    <span class="text-red-500 text-sm" v-if="form.errors.description">
                        {{ form.errors.description }}
                    </span>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <div>
                        <InputLabel label="Insure Title" v-model="form.insure_title" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.insure_title">
                            {{ form.errors.insure_title }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Insure Icon" v-model="form.insure_icon" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.insure_icon">
                            {{ form.errors.insure_icon }}
                        </span>
                    </div>
                    <div>
                        <Textarea label="Insure Description" v-model="form.insure_description" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.insure_description">
                            {{ form.errors.insure_description }}
                        </span>
                    </div>

                </div>
                <div class="mt-4">
                    <InputLabel label="Covered Title" v-model="form.covered_title" type="text" />
                    <span class="text-red-500 text-sm" v-if="form.errors.covered_title">
                        {{ form.errors.covered_title }}
                    </span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <InputLabel label="Covered Item One Title" v-model="form.covered_item_one_title" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.covered_item_one_title">
                            {{ form.errors.covered_item_one_title }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Covered Item Two Title" v-model="form.covered_item_two_title" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.covered_item_two_title">
                            {{ form.errors.covered_item_two_title }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Covered Item Three Title" v-model="form.covered_item_three_title" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.covered_item_three_title">
                            {{ form.errors.covered_item_three_title }}
                        </span>
                    </div>

                    <div>
                        <InputLabel label="Covered Item One Icon" v-model="form.covered_item_one_icon" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.covered_item_one_icon">
                            {{ form.errors.covered_item_one_icon }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Covered Item Two Icon" v-model="form.covered_item_two_icon" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.covered_item_two_icon">
                            {{ form.errors.covered_item_two_icon }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Covered Item Three Icon" v-model="form.covered_item_three_icon" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.covered_item_three_icon">
                            {{ form.errors.covered_item_three_icon }}
                        </span>
                    </div>
                </div>

                <div class="mt-4">
                    <InputLabel label="Contact Title" v-model="form.contact_title" type="text" />
                    <span class="text-red-500 text-sm" v-if="form.errors.contact_title">
                        {{ form.errors.contact_title }}
                    </span>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <div>
                        <InputLabel label="Contact Item One Title" v-model="form.contact_item_one_title" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.contact_item_one_title">
                            {{ form.errors.contact_item_one_title }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Contact Item Two Title" v-model="form.contact_item_two_title" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.contact_item_two_title">
                            {{ form.errors.contact_item_two_title }}
                        </span>
                    </div>

                    <div>
                        <InputLabel label="Contact Item One Icon" v-model="form.contact_item_one_icon" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.contact_item_one_icon">
                            {{ form.errors.contact_item_one_icon }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Contact Item Two Icon" v-model="form.contact_item_two_icon" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.contact_item_two_icon">
                            {{ form.errors.contact_item_two_icon }}
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
