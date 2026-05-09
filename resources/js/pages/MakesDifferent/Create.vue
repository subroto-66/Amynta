<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3';
import $ from 'jquery';
import { onMounted } from 'vue';
import 'dropify/dist/css/dropify.min.css';
import 'dropify';
import Button from '@/components/custom/Button.vue';
import InputLabel from '@/components/custom/InputLabel.vue';
import Label from '@/components/custom/Label.vue';
import LinkButton from '@/components/custom/LinkButton.vue';

defineOptions({
    layout: {
        breadcrumbs: [
            {
                title: 'Makes Different List',
                href: '/makes-different',
            },
        ],
    },
});

const form = useForm({
    title: '',
    type: '',
});

const submit = () => {
    form.post('/makes-different/store', {
        forceFormData: true,
    });
};

</script>

<template>

    <Head title="Makes Different Create" />

    <div class="bg-white text-gray-500 m-7 p-5 rounded">
        <!-- Header -->
        <div class="flex items-center justify-between border-b pb-3">
            <h1 class="text-xl font-medium">Makes Different Create</h1>
            <LinkButton label="Back" url="/makes-different" />
        </div>

        <div class="p-5">
            <form @submit.prevent="submit" class="space-y-3">

                <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
                    <!-- Title -->
                    <div>
                        <InputLabel label="Title" v-model="form.title" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.title">
                            {{ form.errors.title }}
                        </span>
                    </div>

                    <div>
                        <Label label="Type" />
                        <select v-model="form.type"
                            class="border border-gray-300 rounded px-3 py-2 w-full mt-1 text-sm">
                            <option value="">Select type</option>
                            <option value="the_old_way">The Old Way</option>
                            <option value="the_amynta_way">The Amynta Way</option>
                        </select>
                        <span class="text-red-500 text-sm" v-if="form.errors.type">
                            {{ form.errors.type }}
                        </span>
                    </div>

                </div>
                <!-- Submit -->
                <div class="mt-5 border-t pt-4">
                    <Button label="Create" type="submit" />
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