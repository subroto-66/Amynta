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
                title: 'Portfolio Credit List',
                href: '/portfolio-credit',
            },
        ],
    },
});

const props = defineProps<{
    portfolioCredit: any;
}>()

const form = useForm({

    title: props.portfolioCredit.title,
    description: props.portfolioCredit.description,

    item_one_number: props.portfolioCredit.item_one_number,
    item_one_text: props.portfolioCredit.item_one_text,
    item_two_number: props.portfolioCredit.item_two_number,
    item_two_text: props.portfolioCredit.item_two_text,
    item_three_number: props.portfolioCredit.item_three_number,
    item_three_text: props.portfolioCredit.item_three_text,

    asset_classes_one_title: props.portfolioCredit.asset_classes_one_title,
    asset_classes_one_icon: props.portfolioCredit.asset_classes_one_icon,
    asset_classes_two_title: props.portfolioCredit.asset_classes_two_title,
    asset_classes_two_icon: props.portfolioCredit.asset_classes_two_icon,
    asset_classes_three_title: props.portfolioCredit.asset_classes_three_title,
    asset_classes_three_icon: props.portfolioCredit.asset_classes_three_icon,
    asset_classes_four_title: props.portfolioCredit.asset_classes_four_title,
    asset_classes_four_icon: props.portfolioCredit.asset_classes_four_icon,
});

const submit = () => {
    form.post('/portfolio-credit/update', {
        forceFormData: true,
    });
};

</script>

<template>

    <Head title="Portfolio Credit Update" />

    <div class="bg-white text-gray-500 m-7 p-5 rounded">
        <!-- Header -->
        <div class="flex items-center justify-between border-b pb-3">
            <h1 class="text-xl font-medium">Portfolio Credit Update</h1>
            <LinkButton label="Back" url="/portfolio-credit" />
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
                        <InputLabel label="Item One Number" v-model="form.item_one_number" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.item_one_number">
                            {{ form.errors.item_one_number }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Item One Text" v-model="form.item_one_text" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.item_one_text">
                            {{ form.errors.item_one_text }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Item Two Number" v-model="form.item_two_number" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.item_two_number">
                            {{ form.errors.item_two_number }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Item Two Text" v-model="form.item_two_text" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.item_two_text">
                            {{ form.errors.item_two_text }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Item Three Number" v-model="form.item_three_number" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.item_three_number">
                            {{ form.errors.item_three_number }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Item Three Text" v-model="form.item_three_text" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.item_three_text">
                            {{ form.errors.item_three_text }}
                        </span>
                    </div>


                </div>


                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <InputLabel label="Asset Classes One Title" v-model="form.asset_classes_one_title" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.asset_classes_one_title">
                            {{ form.errors.asset_classes_one_title }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Asset Classes One Icon" v-model="form.asset_classes_one_icon" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.asset_classes_one_icon">
                            {{ form.errors.asset_classes_one_icon }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Asset Classes Two Title" v-model="form.asset_classes_two_title" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.asset_classes_two_title">
                            {{ form.errors.asset_classes_two_title }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Asset Classes Two Icon" v-model="form.asset_classes_two_icon" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.asset_classes_two_icon">
                            {{ form.errors.asset_classes_two_icon }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Asset Classes Three Title" v-model="form.asset_classes_three_title" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.asset_classes_three_title">
                            {{ form.errors.asset_classes_three_title }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Asset Classes Three Icon" v-model="form.asset_classes_three_icon" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.asset_classes_three_icon">
                            {{ form.errors.asset_classes_three_icon }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Asset Classes Four Title" v-model="form.asset_classes_four_title" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.asset_classes_four_title">
                            {{ form.errors.asset_classes_four_title }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Asset Classes Four Icon" v-model="form.asset_classes_four_icon" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.asset_classes_four_icon">
                            {{ form.errors.asset_classes_four_icon }}
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
