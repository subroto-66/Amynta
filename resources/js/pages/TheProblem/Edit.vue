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
                title: 'The Problem Setting List',
                href: '/the-problem',
            },
        ],
    },
});

const props = defineProps<{
    theProblem: any;
    items: any[];
}>()

const form = useForm({

    title: props.theProblem.title,
    description: props.theProblem.description,
    subtitle: props.theProblem.subtitle,

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

const submit = () => {
    form.post('/the-problem/update', {
        forceFormData: true,
    });
};


</script>

<template>

    <Head title="The Problem Setting Update" />

    <div class="bg-white text-gray-500 m-7 p-5 rounded">
        <!-- Header -->
        <div class="flex items-center justify-between border-b pb-3">
            <h1 class="text-xl font-medium">The Problem Setting Update</h1>
            <LinkButton label="Back" url="/the-problem" />
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
                    <InputLabel label="Subtitle" v-model="form.subtitle" type="text" />
                    <span class="text-red-500 text-sm" v-if="form.errors.subtitle">
                        {{ form.errors.subtitle }}
                    </span>
                </div>
                 
                <div>
                    <Textarea label="Description" v-model="form.description" type="text" />
                    <span class="text-red-500 text-sm" v-if="form.errors.description">
                        {{ form.errors.description }}
                    </span>
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
