<script setup lang="ts">
import Button from '@/components/custom/Button.vue';
import TextEditor from '@/components/custom/CKEditor.vue';
import FlashMessage from '@/components/custom/FlashMessage.vue';
import InputLabel from '@/components/custom/InputLabel.vue';
import Label from '@/components/custom/Label.vue';
import LinkButton from '@/components/custom/LinkButton.vue';
import { Head, useForm } from '@inertiajs/vue3';
import 'dropify';
import 'dropify/dist/css/dropify.min.css';
import $ from 'jquery';
import { onMounted } from 'vue';

defineOptions({
    layout: {
        breadcrumbs: [
            {
                title: 'Contingency Leadership List',
                href: '/contingency-leadership',
            },
        ],
    },
});

const props = defineProps<{
    contingencyLeadership: any;
    flash: {
        message?: string;
    };
}>()

const form = useForm({
    
    id: props.contingencyLeadership.id,
    leadership_name: props.contingencyLeadership.leadership_name,
    leadership_title: props.contingencyLeadership.leadership_title,
    leadership_position: props.contingencyLeadership.leadership_position,
    leadership_description: props.contingencyLeadership.leadership_description,
    leadership_image: null as File | null,

    broker_title: props.contingencyLeadership.broker_title,
    broker_description: props.contingencyLeadership.broker_description,

    primary_broker_button_text: props.contingencyLeadership.primary_broker_button_text,
    primary_broker_button_link: props.contingencyLeadership.primary_broker_button_link,
    secondary_broker_button_text: props.contingencyLeadership.secondary_broker_button_text,
    secondary_broker_button_link: props.contingencyLeadership.secondary_broker_button_link,

    brokers_items_one: props.contingencyLeadership.brokers_items_one,
    brokers_items_two: props.contingencyLeadership.brokers_items_two,
    brokers_items_three: props.contingencyLeadership.brokers_items_three,
    brokers_items_four: props.contingencyLeadership.brokers_items_four,
    brokers_items_five: props.contingencyLeadership.brokers_items_five,
    brokers_items_six: props.contingencyLeadership.brokers_items_six,

});



const image = (e: Event) => {
    const file = (e.target as HTMLInputElement).files?.[0];

    if (!file) {
        return;
    }

    form.leadership_image = file;
}



const submit = () => {
    form.post('/contingency-leadership/update', {
        forceFormData: true,
    });
};


onMounted(() => {

    $('#leadership_image').dropify({
        defaultFile: `/ContingencyLeadership/${props.contingencyLeadership.leadership_image}`,
        height: 90,
        messages: {
            default: 'Drag and drop a file here or click',
            replace: 'Drag and drop or click to replace',
            remove: 'Remove',
            error: 'Ooops, something wrong happened.'
        }
    });


});




</script>

<template>

    <Head title="Contingency Leadership Update" />
    <FlashMessage :message="props.flash.message" />
    <div class="bg-white text-gray-500 m-7 p-5 rounded">
        <!-- Header -->
        <div class="flex items-center justify-between border-b pb-3">
            <h1 class="text-xl font-medium">Contingency Leadership Update</h1>
            <LinkButton label="Back" url="/contingency-leadership" />
        </div>

        <div class="p-5">
            <form @submit.prevent="submit" class="space-y-3">
                <!-- Title -->
                <div>
                    <InputLabel label="Leadership Title" v-model="form.leadership_title" type="text" />
                    <span class="text-red-500 text-sm" v-if="form.errors.leadership_title">
                        {{ form.errors.leadership_title }}
                    </span>
                </div>
                <div>
                    <Label label="Leadership Description" />
                    <TextEditor v-model="form.leadership_description" />
                    <span class="text-red-500 text-sm" v-if="form.errors.leadership_description">
                            {{ form.errors.leadership_description }}
                    </span>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <InputLabel label="Leadership Name" v-model="form.leadership_name" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.leadership_name">
                            {{ form.errors.leadership_name }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Leadership Position" v-model="form.leadership_position" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.leadership_position">
                            {{ form.errors.leadership_position }}
                        </span>
                    </div>


                </div>

                <div>
                    <Label label="Leadership Image" />
                    <input type="file" id="leadership_image" @change="image" class="dropify" />

                    <span class="text-red-500 text-sm" v-if="form.errors.leadership_image">
                        {{ form.errors.leadership_image }}
                    </span>
                </div>

                <div>
                    <InputLabel label="Broker Title" v-model="form.broker_title" type="text" />
                    <span class="text-red-500 text-sm" v-if="form.errors.broker_title">
                        {{ form.errors.broker_title }}
                    </span>
                </div>
                <div>
                    <Label label="Broker Description" />
                    <TextEditor v-model="form.broker_description" />
                    <span class="text-red-500 text-sm" v-if="form.errors.broker_description">
                        {{ form.errors.broker_description }}
                    </span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <InputLabel label="Primary Broker Button Text" v-model="form.primary_broker_button_text" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.primary_broker_button_text">
                            {{ form.errors.primary_broker_button_text }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Primary Broker Button Link" v-model="form.primary_broker_button_link" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.primary_broker_button_link">
                            {{ form.errors.primary_broker_button_link }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Secondary Broker Button Text" v-model="form.secondary_broker_button_text" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.secondary_broker_button_text">
                            {{ form.errors.secondary_broker_button_text }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Secondary Broker Button Link" v-model="form.secondary_broker_button_link" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.secondary_broker_button_link">
                            {{ form.errors.secondary_broker_button_link }}
                        </span>
                    </div>

                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-5">
                    <div>
                        <InputLabel label="Brokers Item One" v-model="form.brokers_items_one" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.brokers_items_one">
                            {{ form.errors.brokers_items_one }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Brokers Item Two" v-model="form.brokers_items_two" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.brokers_items_two">
                            {{ form.errors.brokers_items_two }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Brokers Item Three" v-model="form.brokers_items_three" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.brokers_items_three">
                            {{ form.errors.brokers_items_three }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Brokers Item Four" v-model="form.brokers_items_four" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.brokers_items_four">
                            {{ form.errors.brokers_items_four }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Brokers Item Five" v-model="form.brokers_items_five" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.brokers_items_five">
                            {{ form.errors.brokers_items_five }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Brokers Item Six" v-model="form.brokers_items_six" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.brokers_items_six">
                            {{ form.errors.brokers_items_six }}
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
