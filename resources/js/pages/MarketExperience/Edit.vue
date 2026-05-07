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
                title: 'Market Experience List',
                href: '/market-experience',
            },
        ],
    },
});

const props = defineProps<{
    marketExperience: any;
}>()

const form = useForm({

    platform_title: props.marketExperience.platform_title,
    platform_description_one: props.marketExperience.platform_description_one,
    platform_item_one: props.marketExperience.platform_item_one,
    platform_item_two: props.marketExperience.platform_item_two,
    platform_item_three: props.marketExperience.platform_item_three,
    platform_description_two: props.marketExperience.platform_description_two,
    market_experience_title: props.marketExperience.market_experience_title,
    market_experience_description: props.marketExperience.market_experience_description,
    market_experience_name: props.marketExperience.market_experience_name,
    market_experience_name_description: props.marketExperience.market_experience_name_description,
    market_experience_quote: props.marketExperience.market_experience_quote,

});

const submit = () => {
    form.post('/market-experience/update', {
        forceFormData: true,
    });
};
</script>

<template>

    <Head title="Long Term Commitment Update" />

    <div class="bg-white text-gray-500 m-7 p-5 rounded">
        <!-- Header -->
        <div class="flex items-center justify-between border-b pb-3">
            <h1 class="text-xl font-medium">Long Term Commitment</h1>
            <LinkButton label="Back" url="/longterm-commitment" />  
        </div>

        <div class="p-5">
            <form @submit.prevent="submit" class="space-y-3">

                <div>
                    <InputLabel label="Title" v-model="form.platform_title" type="text" />
                    <span class="text-red-500 text-sm" v-if="form.errors.platform_title">
                        {{ form.errors.platform_title }}
                    </span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <Textarea label="Description One" v-model="form.platform_description_one" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.platform_description_one">
                            {{ form.errors.platform_description_one }}
                        </span>
                    </div>
                    <div>
                        <Textarea label="Description Two" v-model="form.platform_description_two" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.platform_description_two">
                            {{ form.errors.platform_description_two }}
                        </span>
                    </div>

                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <InputLabel label="Platform Item One" v-model="form.platform_item_one" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.platform_item_one">
                            {{ form.errors.platform_item_one }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Platform Item Two" v-model="form.platform_item_two" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.platform_item_two">
                            {{ form.errors.platform_item_two }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Platform Item Three" v-model="form.platform_item_three" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.platform_item_three">
                            {{ form.errors.platform_item_three }}
                        </span>
                    </div>

                </div>

                <div class="mt-5">
                    <InputLabel label="Market Experience Title" v-model="form.market_experience_title" type="text" />
                    <span class="text-red-500 text-sm" v-if="form.errors.market_experience_title">
                        {{ form.errors.market_experience_title }}
                    </span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <Textarea label="Market Experience Description" v-model="form.market_experience_description" />
                        <span class="text-red-500 text-sm" v-if="form.errors.market_experience_description">
                            {{ form.errors.market_experience_description }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Market Experience Name" v-model="form.market_experience_name" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.market_experience_name">
                            {{ form.errors.market_experience_name }}
                        </span>
                    </div>
                    <div>
                        <Textarea label="Market Experience Name Description" v-model="form.market_experience_name_description" />
                        <span class="text-red-500 text-sm" v-if="form.errors.market_experience_name_description">
                            {{ form.errors.market_experience_name_description }}
                        </span>
                    </div>
                    <div>
                        <Textarea label="Market Experience Quote" v-model="form.market_experience_quote" />
                        <span class="text-red-500 text-sm" v-if="form.errors.market_experience_quote">
                            {{ form.errors.market_experience_quote }}
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
