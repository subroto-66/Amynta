<script setup lang="ts">
import Button from '@/components/custom/Button.vue';
import InputLabel from '@/components/custom/InputLabel.vue';
import Label from '@/components/custom/Label.vue';
import { Head, useForm } from '@inertiajs/vue3';
import LinkButton from '@/components/custom/LinkButton.vue';
import 'dropify';
import 'dropify/dist/css/dropify.min.css';

defineOptions({
    layout: {
        breadcrumbs: [
            {
                title: 'Specialty Risks',
                href: '/specialty-risk',
            },
        ],
    },
});


const form = useForm({
    index: '',
    title: '',
    description: '',
});


const submit = () => {
    form.post('/specialty-risk', {
        forceFormData: true,
    });
};

</script>

<template>

    <Head title="Specialty Risk Create" />

    <div class="bg-white text-gray-500 m-7 p-5 rounded">
        <!-- Header -->
        <div class="flex items-center justify-between border-b pb-3">
            <h1 class="text-xl font-medium">Specialty Risk Create</h1>
            <LinkButton label="Back" url="/specialty-risk" />
        </div>

        <div class="p-5">
            <form @submit.prevent="submit" class="space-y-3">

                <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
                    <!-- Title -->
                    <div>
                        <InputLabel label="Index" v-model="form.index" type="number" />
                        <span class="text-red-500 text-sm" v-if="form.errors.index">
                            {{ form.errors.index }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Title" v-model="form.title" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.title">
                            {{ form.errors.title }}
                        </span>
                    </div>
                    <div>
                        <Label label="Description" />
                        <textarea v-model="form.description" rows="4"
                            class="w-full border border-gray-300 text-sm rounded-lg p-2.5"></textarea>

                        <span class="text-red-500 text-sm" v-if="form.errors.description">
                            {{ form.errors.description }}
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

