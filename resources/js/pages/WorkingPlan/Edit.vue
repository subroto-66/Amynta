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
                title: 'Working Plan List',
                href: '/working-plan',
            },
        ],
    },
});

const props = defineProps<{
    workingPlan: any;
}>()

const form = useForm({

    title: props.workingPlan.title,
    description: props.workingPlan.description,
    one_button_text: props.workingPlan.one_button_text,
    two_button_text: props.workingPlan.two_button_text,
    three_button_text: props.workingPlan.three_button_text,
    one_button_link: props.workingPlan.one_button_link,
    two_button_link: props.workingPlan.two_button_link,
    three_button_link: props.workingPlan.three_button_link
});

const submit = () => {
    form.post('/working-plan/update', {
        forceFormData: true,
    });
};

</script>

<template>

    <Head title="Working Plan Update" />

    <div class="bg-white text-gray-500 m-7 p-5 rounded">
        <!-- Header -->
        <div class="flex items-center justify-between border-b pb-3">
            <h1 class="text-xl font-medium">Working Plan Update</h1>
            <LinkButton label="Back" url="/working-plan" />
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
                        <Textarea label="Description" v-model="form.description" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.description">
                            {{ form.errors.description }}
                        </span>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <InputLabel label="One Button Text" v-model="form.one_button_text" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.one_button_text">
                            {{ form.errors.one_button_text }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="One Button Link" v-model="form.one_button_link" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.one_button_link">
                            {{ form.errors.one_button_link }}
                        </span>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <InputLabel label="Two Button Text" v-model="form.two_button_text" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.two_button_text">
                            {{ form.errors.two_button_text }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Two Button Link" v-model="form.two_button_link" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.two_button_link">
                            {{ form.errors.two_button_link }}
                        </span>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <InputLabel label="Three Button Text" v-model="form.three_button_text" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.three_button_text">
                            {{ form.errors.three_button_text }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Three Button Link" v-model="form.three_button_link" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.three_button_link">
                            {{ form.errors.three_button_link }}
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


    