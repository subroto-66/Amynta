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
                title: 'Not Confusion Setting List',
                href: '/not-confusion',
            },
        ],
    },
});

const props = defineProps<{
    notConfusion: any;
    items: any[];
}>()

const form = useForm({

    title: props.notConfusion.title,
    description_one: props.notConfusion.description_one,
    description_two: props.notConfusion.description_two,
    button_text: props.notConfusion.button_text,
    button_link: props.notConfusion.button_link,
    understanding_title: props.notConfusion.understanding_title,
    understanding_item_one: props.notConfusion.understanding_item_one,
    understanding_item_two: props.notConfusion.understanding_item_two,
    understanding_item_three: props.notConfusion.understanding_item_three,

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
    form.post('/not-confusion/update', {
        forceFormData: true,
    });
};


</script>

<template>

    <Head title="Not Confusion Setting Update" />

    <div class="bg-white text-gray-500 m-7 p-5 rounded">
        <!-- Header -->
        <div class="flex items-center justify-between border-b pb-3">
            <h1 class="text-xl font-medium">Not Confusion Setting Update</h1>
            <LinkButton label="Back" url="/not-confusion" />
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

                    <div>
                        <InputLabel label="Button Text" v-model="form.button_text" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.button_text">
                            {{ form.errors.button_text }}
                        </span>
                    </div>

                    <div>
                        <InputLabel label="Button Link" v-model="form.button_link" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.button_link">
                            {{ form.errors.button_link }}
                        </span>
                    </div>
                </div>

                <div>
                    <InputLabel label="Understanding Title" v-model="form.understanding_title" type="text" />
                    <span class="text-red-500 text-sm" v-if="form.errors.understanding_title">
                        {{ form.errors.understanding_title }}
                    </span>
                </div>

                <div>
                    <InputLabel label="Understanding Item One" v-model="form.understanding_item_one" type="text" />
                    <span class="text-red-500 text-sm" v-if="form.errors.understanding_item_one">
                        {{ form.errors.understanding_item_one }}
                    </span>
                </div>

                <div>
                    <InputLabel label="Understanding Item Two" v-model="form.understanding_item_two" type="text" />
                    <span class="text-red-500 text-sm" v-if="form.errors.understanding_item_two">
                        {{ form.errors.understanding_item_two }}
                    </span>
                </div>

                <div>
                    <InputLabel label="Understanding Item Three" v-model="form.understanding_item_three" type="text" />
                    <span class="text-red-500 text-sm" v-if="form.errors.understanding_item_three">
                        {{ form.errors.understanding_item_three }}
                    </span>
                </div>

                <div class="mt-4">
                    <h2 class="text-lg font-semibold mb-2">Market Result Items</h2>

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
