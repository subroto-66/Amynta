<script setup lang="ts">
import Button from '@/components/custom/Button.vue';
import InputLabel from '@/components/custom/InputLabel.vue';
import Label from '@/components/custom/Label.vue';
import LinkButton from '@/components/custom/LinkButton.vue';
import Textarea from '@/components/custom/Textarea.vue';
import { Head, useForm } from '@inertiajs/vue3';
import 'dropify';
import 'dropify/dist/css/dropify.min.css';
import $ from 'jquery';
import { onMounted } from 'vue';

defineOptions({
    layout: {
        breadcrumbs: [
            {
                title: 'Others Settings List',
                href: '/others-settings',
            },
        ],
    },
});

const props = defineProps<{
    setting: any;
}>()

const form = useForm({

    title: props.setting.title,
    meta_title: props.setting.meta_title,
    meta_description: props.setting.meta_description,
    footer_description: props.setting.footer_description,
    linkedin_url: props.setting.linkedin_url,
    instagram_url: props.setting.instagram_url,
    facebook_url: props.setting.facebook_url,
    twitter_url: props.setting.twitter_url,
    copyright: props.setting.copyright,

    header_logo: null as File | null,
    footer_logo: null as File | null,
    fab_icon: null as File | null,

});


const header_logo = (e: Event) => {
    const file = (e.target as HTMLInputElement).files?.[0];

    if (!file) {
        return;
    }

    form.header_logo = file;
}

const submit = () => {
    form.post('/others-settings/update', {
        forceFormData: true,
    });
};

const footer_logo = (e: Event) => {
    const file = (e.target as HTMLInputElement).files?.[0];

    if (!file) {
        return;
    }

    form.footer_logo = file;
}

const fab_icon = (e: Event) => {
    const file = (e.target as HTMLInputElement).files?.[0];

    if (!file) {
        return;
    }

    form.fab_icon = file;
}

onMounted(() => {

    $('#header_logo').dropify({
        defaultFile: `/OthersSettings/${props.setting.header_logo}`,
        height: 90,
        messages: {
            default: 'Drag and drop a file here or click',
            replace: 'Drag and drop or click to replace',
            remove: 'Remove',
            error: 'Ooops, something wrong happened.'
        }
    });

    $('#footer_logo').dropify({
        defaultFile: `/OthersSettings/${props.setting.footer_logo}`,
        height: 90,
        messages: {
            default: 'Drag and drop a file here or click',
            replace: 'Drag and drop or click to replace',
            remove: 'Remove',
            error: 'Ooops, something wrong happened.'
        }
    });

    $('#fab_icon').dropify({
        defaultFile: `/OthersSettings/${props.setting.fab_icon}`,
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

    <Head title="Others Settings Update" />

    <div class="bg-white text-gray-500 m-7 p-5 rounded">
        <!-- Header -->
        <div class="flex items-center justify-between border-b pb-3">
            <h1 class="text-xl font-medium">Others Settings Update</h1>
            <LinkButton label="Back" url="/others-settings" />
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
                        <InputLabel label="Meta Title" v-model="form.meta_title" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.meta_title">
                            {{ form.errors.meta_title }}
                        </span>
                    </div>

                    <div>
                        <Textarea label="Meta Description" v-model="form.meta_description" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.meta_description">
                            {{ form.errors.meta_description }}
                        </span>
                    </div>
                    <div>
                        <Textarea label="Footer Description" v-model="form.footer_description" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.footer_description">
                            {{ form.errors.footer_description }}
                        </span>
                    </div>

                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <Label label="Header Logo" />
                    <input type="file" id="header_logo" @change="header_logo" class="dropify" />

                    <span class="text-red-500 text-sm" v-if="form.errors.header_logo">
                        {{ form.errors.header_logo }}
                    </span>
                </div>

                <div>
                    <Label label="Footer Logo" />
                    <input type="file" id="footer_logo" @change="footer_logo" class="dropify" />

                    <span class="text-red-500 text-sm" v-if="form.errors.footer_logo">
                        {{ form.errors.footer_logo }}
                    </span>
                </div>
                </div>
                <div>
                    <Label label="Fab Icon" />
                    <input type="file" id="fab_icon" @change="fab_icon" class="dropify" />

                    <span class="text-red-500 text-sm" v-if="form.errors.fab_icon">
                        {{ form.errors.fab_icon }}
                    </span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <div>
                        <InputLabel label="LinkedIn URL" v-model="form.linkedin_url" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.linkedin_url">
                            {{ form.errors.linkedin_url }}
                        </span>
                    </div>

                    <div>
                        <InputLabel label="Instagram URL" v-model="form.instagram_url" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.instagram_url">
                            {{ form.errors.instagram_url }}
                        </span>
                    </div>

                    <div>
                        <InputLabel label="Facebook URL" v-model="form.facebook_url" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.facebook_url">
                            {{ form.errors.facebook_url }}
                        </span>
                    </div>

                    <div>
                        <InputLabel label="Twitter URL" v-model="form.twitter_url" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.twitter_url">
                            {{ form.errors.twitter_url }}
                        </span>
                    </div>
                </div>
                <div>
                    <InputLabel label="Copyright" v-model="form.copyright" type="text" />
                    <span class="text-red-500 text-sm" v-if="form.errors.copyright">
                        {{ form.errors.copyright }}
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
