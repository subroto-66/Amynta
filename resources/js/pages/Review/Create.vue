<script setup lang="ts">
import Button from '@/components/custom/Button.vue';
import InputLabel from '@/components/custom/InputLabel.vue';
import Label from '@/components/custom/Label.vue';
import { Head, useForm } from '@inertiajs/vue3';
import 'dropify';
import 'dropify/dist/css/dropify.min.css';
import LinkButton from '@/components/custom/LinkButton.vue';

defineOptions({
    layout: {
        breadcrumbs: [
            {
                title: 'Review',
                href: '/review',
            },
        ],
    },
});


const form = useForm({
    reviewer_name: '',
    reviewer_position: '',
    review_text: '',
});


const submit = () => {
    form.post('/review/store', {
        forceFormData: true,
    });
};

</script>

<template>

    <Head title="Review Create" />

    <div class="bg-white text-gray-500 m-7 p-5 rounded">
        <!-- Header -->
        <div class="flex items-center justify-between border-b pb-3">
            <h1 class="text-xl font-medium">Review Create</h1>
            <LinkButton label="Back" url="/structured-solution" />
        </div>

        <div class="p-5">
            <form @submit.prevent="submit" class="space-y-3">

                <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
                    <!-- Title -->
                    <div>
                        <InputLabel label="Reviewer Name" v-model="form.reviewer_name" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.reviewer_name">
                            {{ form.errors.reviewer_name }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Reviewer Position" v-model="form.reviewer_position" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.reviewer_position">
                            {{ form.errors.reviewer_position }}
                        </span>
                    </div>

                    <div>
                        <Label label="Review Text" />
                        <textarea v-model="form.review_text" rows="4"
                            class="w-full border border-gray-300 text-sm rounded-lg p-2.5"></textarea>

                        <span class="text-red-500 text-sm" v-if="form.errors.review_text">
                            {{ form.errors.review_text }}
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

