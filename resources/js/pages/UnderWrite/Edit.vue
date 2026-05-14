<script setup lang="ts">
import Button from '@/components/custom/Button.vue';
import FlashMessage from '@/components/custom/FlashMessage.vue';
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
                title: 'Underwrite Settings List',
                href: '/how-we-underwrite',
            },
        ],
    },
});

const props = defineProps<{
    underwrite: any;
    items: any[];
    flash: {
        message?: string;
    };
}>()

const form = useForm({

    title: props.underwrite.title,
    description_one: props.underwrite.description_one,
    description_two: props.underwrite.description_two,
    qoute: props.underwrite.qoute,
    image: null as File | null,
    author_image: null as File | null,
    author_name: props.underwrite.author_name,
    author_position: props.underwrite.author_position,

    items: props.items && props.items.length
        ? props.items
        : [{ title: '', image: '' }],

});

const addItem = () => {
    form.items.push({
        title: '',
        image: '',
    });
};

const removeItem = (index: number) => {

    if (form.items.length <= 1) {
        console.log('At least one item is required');

        return;
    }

    form.items.splice(index, 1);
};


const image = (e: Event) => {
    const file = (e.target as HTMLInputElement).files?.[0];

    if (!file) {
        return;
    }

    form.image = file;
}

const author_image = (e: Event) => {
    const file = (e.target as HTMLInputElement).files?.[0];

    if (!file) {
        return;
    }

    form.author_image = file;
}


const submit = () => {
    form.post('/how-we-underwrite/update', {
        forceFormData: true,
    });
};


onMounted(() => {

    $('#image').dropify({
        defaultFile: `/UnderWrite/${props.underwrite.image}`,
        height: 90,
        messages: {
            default: 'Drag and drop a file here or click',
            replace: 'Drag and drop or click to replace',
            remove: 'Remove',
            error: 'Ooops, something wrong happened.'
        }
    });

    $('#author_image').dropify({
        defaultFile: `/UnderWrite/${props.underwrite.author_image}`,
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

    <Head title="Underwrite Update" />
    <FlashMessage :message="props.flash.message" />
    <div class="bg-white text-gray-500 m-7 p-5 rounded">
        <!-- Header -->
        <div class="flex items-center justify-between border-b pb-3">
            <h1 class="text-xl font-medium">Underwrite Update</h1>
            <LinkButton label="Back" url="/how-we-underwrite" />
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
                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <Label label="Image" />
                        <input type="file" id="image" @change="image" class="dropify" />

                        <span class="text-red-500 text-sm" v-if="form.errors.image">
                            {{ form.errors.image }}
                        </span>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <Label label="Author Image" />
                        <input type="file" id="author_image" @change="author_image" class="dropify" />

                        <span class="text-red-500 text-sm" v-if="form.errors.author_image">
                            {{ form.errors.author_image }}
                        </span>
                    </div>
                    <div>
                        <Textarea label="Quote" v-model="form.qoute" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.qoute">
                            {{ form.errors.qoute }}
                        </span>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <InputLabel label="Author Name" v-model="form.author_name" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.author_name">
                            {{ form.errors.author_name }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Author Position" v-model="form.author_position" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.author_position">
                            {{ form.errors.author_position }}
                        </span>
                    </div>

                </div>

                <div class="mt-4">
                    <h2 class="text-lg font-semibold mb-2">Items</h2>

                    <div
                        v-for="(item, index) in form.items"
                        :key="index"
                        class="border p-3 rounded mb-3"
                    >
                        <!-- Item Title -->
                        <InputLabel
                            label="Title"
                            v-model="item.title"
                            type="text"
                        />
                        <!-- Item Image -->
                        <InputLabel
                            label="Svg Icon"
                            v-model="item.image"
                            type="text"
                        />

                        <!-- Remove Button -->
                        <button
                            type="button"
                            class="mt-2 text-red-500 text-sm cursor-pointer"
                            @click="removeItem(index)"
                        >
                            Remove Item
                        </button>
                    </div>

                    <!-- Add Button -->
                    <div class="flex justify-end">
                        <button
                            type="button"
                            class="bg-blue-500 text-white px-3 py-1 rounded cursor-pointer"
                            @click="addItem"
                        >
                            + Add Item
                        </button>
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
