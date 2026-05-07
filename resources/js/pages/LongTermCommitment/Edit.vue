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
                title: 'Long Term Commitment List',
                href: '/longterm-commitment',
            },
        ],
    },
});

const props = defineProps<{
    longtermCommitment: any;
}>()

const form = useForm({

    title: props.longtermCommitment.title,
    description_one: props.longtermCommitment.description_one,
    description_two: props.longtermCommitment.description_two,
    primary_button_text: props.longtermCommitment.primary_button_text,
    primary_button_url: props.longtermCommitment.primary_button_url,
    secondary_button_text: props.longtermCommitment.secondary_button_text,
    secondary_button_url: props.longtermCommitment.secondary_button_url,
    item_title: props.longtermCommitment.item_title,
    item_one: props.longtermCommitment.item_one,
    item_two: props.longtermCommitment.item_two,
    item_three: props.longtermCommitment.item_three,
    item_four: props.longtermCommitment.item_four,

});

const submit = () => {
    form.post('/long-term-commitment/update', {
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
                        <InputLabel label="Primary Button Text" v-model="form.primary_button_text" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.primary_button_text">
                            {{ form.errors.primary_button_text }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Primary Button Url" v-model="form.primary_button_url" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.primary_button_url">
                            {{ form.errors.primary_button_url }}
                        </span>
                    </div>
                                        <div>
                        <InputLabel label="Secondary Button Text" v-model="form.secondary_button_text" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.secondary_button_text">
                            {{ form.errors.secondary_button_text }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Secondary Button Url" v-model="form.secondary_button_url" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.secondary_button_url">
                            {{ form.errors.secondary_button_url }}
                        </span>
                    </div>

                </div>

                <div class="mt-5">
                    <InputLabel label="Item Title" v-model="form.item_title" type="text" />
                    <span class="text-red-500 text-sm" v-if="form.errors.item_title">
                        {{ form.errors.item_title }}
                    </span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <InputLabel label="Item One" v-model="form.item_one" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.item_one">
                            {{ form.errors.item_one }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Item Two" v-model="form.item_two" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.item_two">
                            {{ form.errors.item_two }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Item Three" v-model="form.item_three" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.item_three">
                            {{ form.errors.item_three }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Item Four" v-model="form.item_four" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.item_four">
                            {{ form.errors.item_four }}
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
