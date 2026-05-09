<script setup lang="ts">
import Button from '@/components/custom/Button.vue';
import InputLabel from '@/components/custom/InputLabel.vue';
import Label from '@/components/custom/Label.vue';
import { Head, useForm } from '@inertiajs/vue3';
import 'dropify';
import 'dropify/dist/css/dropify.min.css';

defineOptions({
    layout: {
        breadcrumbs: [
            {
                title: 'FAQs',
                href: '/faqs',
            },
        ],
    },
});


const form = useForm({
    question: '',
    answer: '',
    page: '',
    status: '',

});


const submit = () => {
    form.post('/faqs', {
        forceFormData: true,
    });
};

</script>

<template>

    <Head title="FAQs Create" />

    <div class="bg-white text-gray-500 m-7 p-5 rounded">
        <!-- Header -->
        <div class="flex items-center justify-between border-b pb-3">
            <h1 class="text-xl font-medium">FAQs Create</h1>
            <LinkButton label="Back" url="/faqs" />
        </div>

        <div class="p-5">
            <form @submit.prevent="submit" class="space-y-3">

                <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
                    <!-- Title -->
                    <div>
                        <InputLabel label="Question" v-model="form.question" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.question">
                            {{ form.errors.question }}
                        </span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <Label label="Page" />
                            <select v-model="form.page"
                                class="border border-gray-300 rounded px-3 py-2 w-full mt-1 text-sm">
                                <option value="">Select page</option>
                                <option value="credit">Credit</option>
                                <option value="contingency">Contingency</option>
                                <option value="medical-stop-loss">Medical Stop Loss</option>
                                <option value="excess-reinsurance">Excess Reinsurance</option>
                            </select>
                            <span class="text-red-500 text-sm" v-if="form.errors.page">
                                {{ form.errors.page }}
                            </span>
                        </div>
                        <div>
                            <Label label="Status" />
                            <select v-model="form.status"
                                class="border border-gray-300 rounded px-3 py-2 w-full mt-1 text-sm">
                                <option value="">Select status</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                            <span class="text-red-500 text-sm" v-if="form.errors.status">
                                {{ form.errors.status }}
                            </span>
                        </div>
                    </div>

                    <div>
                        <Label label="Answer" />
                        <textarea v-model="form.answer" rows="4"
                            class="w-full border border-gray-300 text-sm rounded-lg p-2.5"></textarea>

                        <span class="text-red-500 text-sm" v-if="form.errors.answer">
                            {{ form.errors.answer }}
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

