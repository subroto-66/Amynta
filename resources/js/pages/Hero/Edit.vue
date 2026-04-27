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
    page_name: props.hero.page_name,
    highlight_text: props.hero.highlight_text,
    title_one: props.hero.title_one,
    title_two: props.hero.title_two,
    description_one: props.hero.description_one,
    description_two: props.hero.description_two,
    primary_button_text: props.hero.primary_button_text,
    primary_button_link: props.hero.primary_button_link,
    secondary_button_text: props.hero.secondary_button_text,
    secondary_button_link: props.hero.secondary_button_link,
    feature_one_title: props.hero.feature_one_title,
    feature_two_title: props.hero.feature_two_title,
    feature_three_title: props.hero.feature_three_title,
    short_title_one: props.hero.short_title_one,
    short_title_two: props.hero.short_title_two,
    short_description_one: props.hero.short_description_one,
    short_description_two: props.hero.short_description_two,
});

const submit = () => {
    form.post(`/hero/update/${props.hero.id}`, {
        forceFormData: true,
    });
};
</script>

<template>

    <Head title="Hero Edit" />

    <div class="bg-white m-7 p-5 rounded">
        <!-- Header -->
        <div class="flex items-center justify-between border-b pb-3">
            <h1 class="text-xl font-medium">Hero Edit</h1>
            <LinkButton label="Back" url="/hero" />
        </div>

        <div class="p-5">
            <form @submit.prevent="submit" class="space-y-3">

                <div class="grid grid-cols-1 md:grid-cols-1 gap-4">

                    <div>
                        <InputLabel label="Highlight Text" v-model="form.highlight_text" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.highlight_text">
                            {{ form.errors.highlight_text }}
                        </span>
                    </div>

                    <div>
                        <Label label="Page Name" />
                        <select v-model="form.page_name"
                            class="border border-gray-300 rounded px-3 py-2 w-full mt-1 text-sm">
                            <option value="">Select Page Name</option>
                            <option value="home">Home</option>
                            <option value="about">About</option>
                            <option value="credit">Credit</option>
                            <option value="contingency">Contingency</option>
                            <option value="medical-stop-loss">Medical Stop Loss</option>
                            <option value="excess-reinsurance">Excess Reinsurance</option>
                            <option value="our-team">Our Team</option>
                        </select>
                        <span class="text-red-500 text-sm" v-if="form.errors.page_name">
                            {{ form.errors.page_name }}
                        </span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        <div v-if="form.page_name !== 'excess-reinsurance'">
                            <InputLabel label="Title One" v-model="form.title_one" type="text" />
                            <span class="text-red-500 text-sm" v-if="form.errors.title_one">
                                {{ form.errors.title_one }}
                            </span>
                        </div>


                        <div v-if="form.page_name === 'home' || form.page_name === 'credit'">
                            <InputLabel label="Title Two" v-model="form.title_two" type="text" />
                            <span class="text-red-500 text-sm" v-if="form.errors.title_two">
                                {{ form.errors.title_two }}
                            </span>
                        </div>

                        <div v-if="form.page_name !== 'credit'">
                            <Label label="Description One" />
                            <textarea v-model="form.description_one" rows="4"
                                class="w-full border border-gray-300 text-sm rounded-lg p-2.5"></textarea>
                            <span class="text-red-500 text-sm" v-if="form.errors.description_one">
                                {{ form.errors.description_one }}
                            </span>
                        </div>
                        <div v-if="form.page_name !== 'home' && form.page_name !== 'credit' && form.page_name !== 'contingency'">
                            <Label label="Description Two" />
                            <textarea v-model="form.description_two" rows="4"
                                class="w-full border border-gray-300 text-sm rounded-lg p-2.5"></textarea>
                            <span class="text-red-500 text-sm" v-if="form.errors.description_two">
                                {{ form.errors.description_two }}
                            </span>
                        </div>

                    </div>

                    <div v-if="form.page_name !== 'about' && form.page_name !== 'our-team'"
                        class="grid grid-cols-1 md:grid-cols-2 gap-4">

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

                    <div v-if="form.page_name === 'home'" class="grid grid-cols-1 md:grid-cols-2 gap-4">

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

                    <div v-if="form.page_name === 'contingency' || form.page_name === 'about'" class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        <div>
                            <InputLabel label="Short Title One" v-model="form.short_title_one" type="text" />
                            <span class="text-red-500 text-sm" v-if="form.errors.short_title_one">
                                {{ form.errors.short_title_one }}
                            </span>
                        </div>
                        <div>
                            <InputLabel label="Short Title Two" v-model="form.short_title_two" type="text" />
                            <span class="text-red-500 text-sm" v-if="form.errors.short_title_two">
                                {{ form.errors.short_title_two }}
                            </span>
                        </div>

                        
                    </div>

                    <div v-if="form.page_name === 'contingency'" class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        <div>
                            <Label label="Short Description One" />
                            <!-- <InputLabel label="Short Description One" v-model="form.short_description_one" type="text" /> -->
                            <textarea v-model="form.short_description_one" rows="4" class="w-full border border-gray-300 text-sm rounded-lg p-2.5"></textarea>
                            <span class="text-red-500 text-sm" v-if="form.errors.short_description_one">
                                {{ form.errors.short_description_one }}
                            </span>
                        </div>
                        <div>
                            <!-- <InputLabel label="Short Description Two" v-model="form.short_description_two" type="text" />
                            <span class="text-red-500 text-sm" v-if="form.errors.short_description_two">
                                {{ form.errors.short_description_two }}
                            </span> -->
                            <Label label="Short Description Two" />
                            <textarea v-model="form.short_description_two" rows="4" class="w-full border border-gray-300 text-sm rounded-lg p-2.5"></textarea>
                            <span class="text-red-500 text-sm" v-if="form.errors.short_description_two">
                                {{ form.errors.short_description_two }}
                            </span>
                        </div>

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
