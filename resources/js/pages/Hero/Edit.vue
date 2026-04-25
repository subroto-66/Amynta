<script setup lang="ts">
import Button from '@/components/custom/Button.vue';
import InputLabel from '@/components/custom/InputLabel.vue';
import Label from '@/components/custom/Label.vue';
import LinkButton from '@/components/custom/LinkButton.vue';
import { Head, useForm } from '@inertiajs/vue3';
defineOptions({
    layout: {
        breadcrumbs: [
            {
                title: 'Hero List',
                href: '/hero',
            },
        ],
    },
});

const props = defineProps<{
    hero: any;
}>()

const form = useForm({
    title: props.hero.title,
    highlight_text: props.hero.highlight_text,
    description: props.hero.description,
    primary_button_text: props.hero.primary_button_text,
    primary_button_link: props.hero.primary_button_link,
    secondary_button_text: props.hero.secondary_button_text,
    secondary_button_link: props.hero.secondary_button_link,
    feature_one_title: props.hero.feature_one_title,
    feature_two_title: props.hero.feature_two_title,
    feature_three_title: props.hero.feature_three_title,
});

const submit = () => {
    form.post('/hero/update', {
        forceFormData: true,
    });
};
</script>

<template>

    <Head title="Hero Update" />

    <div class="bg-white m-7 p-5 rounded">
        <!-- Header -->
        <div class="flex items-center justify-between border-b pb-3">
            <h1 class="text-xl font-medium">Hero Update</h1>
            <LinkButton label="Back" url="/hero" />
        </div>

        <div class="p-5">
            <form @submit.prevent="submit" class="space-y-3">

                <div class="grid grid-cols-1  gap-4">
                    <div>
                        <InputLabel label="Title" v-model="form.title" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.title">
                            {{ form.errors.title }}
                        </span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        <div>
                            <InputLabel label="Highlight Text" v-model="form.highlight_text" type="text" />
                            <span class="text-red-500 text-sm" v-if="form.errors.highlight_text">
                                {{ form.errors.highlight_text }}
                            </span>
                        </div>

                        <div>
                            <InputLabel label="Feature One Title" v-model="form.feature_one_title" type="text" />
                            <span class="text-red-500 text-sm" v-if="form.errors.feature_one_title">
                                {{ form.errors.feature_one_title }}
                            </span>
                        </div>

                        <div>
                            <InputLabel label="Feature Two Title" v-model="form.feature_two_title" type="text" />
                            <span class="text-red-500 text-sm" v-if="form.errors.feature_two_title">
                                {{ form.errors.feature_two_title }}
                            </span>
                        </div>

                        <div>
                            <InputLabel label="Feature Three Title" v-model="form.feature_three_title" type="text" />
                            <span class="text-red-500 text-sm" v-if="form.errors.feature_three_title">
                                {{ form.errors.feature_three_title }}
                            </span>
                        </div>
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

                <div>
                    <Label label="Description" />
                    <textarea v-model="form.description" rows="4"
                        class="w-full border border-gray-300 text-sm rounded-lg p-2.5"></textarea>

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
