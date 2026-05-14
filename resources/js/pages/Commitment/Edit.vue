<script setup lang="ts">
import Button from '@/components/custom/Button.vue';
import TextEditor from '@/components/custom/CKEditor.vue';
import FlashMessage from '@/components/custom/FlashMessage.vue';
import InputLabel from '@/components/custom/InputLabel.vue';
import Label from '@/components/custom/Label.vue';
import LinkButton from '@/components/custom/LinkButton.vue';
import { Head, useForm } from '@inertiajs/vue3';
defineOptions({
    layout: {
        breadcrumbs: [
            {
                title: 'Commitment List',
                href: '/commitment',
            },
        ],
    },
});

const props = defineProps<{
    commitment: any;
    flash: {
        message?: string;
    };
}>()

const form = useForm({
    title: props.commitment.title,
    sub_title: props.commitment.sub_title,
    title_two: props.commitment.title_two,
    description: props.commitment.description,
    title_three: props.commitment.title_three,
    primary_button_text: props.commitment.primary_button_text,
    primary_button_link: props.commitment.primary_button_link,
    secondary_button_text: props.commitment.secondary_button_text,
    secondary_button_link: props.commitment.secondary_button_link,
});

const submit = () => {
    form.post(`/commitment/update`, {
        forceFormData: true,
    });
};
</script>

<template>

    <Head title="Commitment Edit" />
    <FlashMessage :message="props.flash.message" />
    <div class="bg-white text-gray-500 m-7 p-5 rounded">
        <!-- Header -->
        <div class="flex items-center justify-between border-b pb-3">
            <h1 class="text-xl font-medium">Commitment Update</h1>
            <LinkButton label="Back" url="/commitment" />
        </div>

        <div class="p-5">
            <form @submit.prevent="submit" class="space-y-3">

                <div class="grid grid-cols-1 md:grid-cols-1 gap-4">

                    <div>
                        <InputLabel label="Title" v-model="form.title" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.title">
                            {{ form.errors.title }}
                        </span>
                    </div>

                    <div>
                        <InputLabel label="Sub Title" v-model="form.sub_title" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.sub_title">
                            {{ form.errors.sub_title }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Title Two" v-model="form.title_two" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.title_two">
                            {{ form.errors.title_two }}
                        </span>
                    </div>
                    <div>
                        <Label label="Description" />
                        <TextEditor v-model="form.description" />
                        <span class="text-red-500 text-sm" v-if="form.errors.description">
                                {{ form.errors.description }}
                            </span>
                    </div>
                    <div>
                        <InputLabel label="Title Three" v-model="form.title_three" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.title_three">
                            {{ form.errors.title_three }}
                        </span>
                    </div>
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


