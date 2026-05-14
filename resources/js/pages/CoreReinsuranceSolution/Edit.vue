<script setup lang="ts">
import Button from '@/components/custom/Button.vue';
import FlashMessage from '@/components/custom/FlashMessage.vue';
import InputLabel from '@/components/custom/InputLabel.vue';
import LinkButton from '@/components/custom/LinkButton.vue';
import Textarea from '@/components/custom/Textarea.vue';
import { Head, useForm } from '@inertiajs/vue3';


defineOptions({
    layout: {
        breadcrumbs: [
            {
                title: 'Core Reinsurance Solutions List',
                href: '/core-reinsurance-solutions',
            },
        ],
    },
});

const props = defineProps<{
    coreReinsuranceSolution: any;
    items: any[];
    flash: {
        message?: string;
    };
}>()

const form = useForm({

    title: props.coreReinsuranceSolution.title,
    subtitle: props.coreReinsuranceSolution.subtitle,
    excess_title: props.coreReinsuranceSolution.excess_title,
    excess_description: props.coreReinsuranceSolution.excess_description,
    proportional_title: props.coreReinsuranceSolution.proportional_title,
    proportional_description: props.coreReinsuranceSolution.proportional_description,
    
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
    form.post('/core-reinsurance-solution/update', {
        forceFormData: true,
    });
};

</script>

<template>

    <Head title="Core Reinsurance Solutions Update" />
    <FlashMessage :message="props.flash.message" />
    <div class="bg-white text-gray-500 m-7 p-5 rounded">
        <!-- Header -->
        <div class="flex items-center justify-between border-b pb-3">
            <h1 class="text-xl font-medium">Core Reinsurance Solutions Update</h1>
            <LinkButton label="Back" url="/core-reinsurance-solutions" />
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
                        <InputLabel label="Subtitle" v-model="form.subtitle" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.subtitle">
                            {{ form.errors.subtitle }}
                        </span>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <InputLabel label="Excess Title" v-model="form.excess_title" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.excess_title">
                            {{ form.errors.excess_title }}
                        </span>
                    </div>
                    <div>
                        <Textarea label="Excess Description" v-model="form.excess_description" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.excess_description">
                            {{ form.errors.excess_description }}
                        </span>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <InputLabel label="Proportional Title" v-model="form.proportional_title" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.proportional_title">
                            {{ form.errors.proportional_title }}
                        </span>
                    </div>
                    <div>
                        <Textarea label="Proportional Description" v-model="form.proportional_description" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.proportional_description">
                            {{ form.errors.proportional_description }}
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


    