<script setup lang="ts">
import Button from '@/components/custom/Button.vue';
import InputLabel from '@/components/custom/InputLabel.vue';
import Label from '@/components/custom/Label.vue';
import LinkButton from '@/components/custom/LinkButton.vue';
import { Head, useForm } from '@inertiajs/vue3';


defineOptions({
    layout: {
        breadcrumbs: [
            {
                title: 'Contact List',
                href: '/contact',
            },
        ],
    },
});

const props = defineProps<{
    contact : any;
}>()

const form = useForm({
    full_name: props.contact.full_name,
    email: props.contact.email,
    phone: props.contact.phone,
    message: props.contact.message,
    status: props.contact.status,
});

const submit = () => {
    form.post('/contact/update/' + props.contact.id, {
        forceFormData: true,
    });
};


</script>

<template>

    <Head title="Contact Update" />

    <div class="bg-white text-gray-500 m-7 p-5 rounded">
        <!-- Header -->
        <div class="flex items-center justify-between border-b pb-3">
            <h1 class="text-xl font-medium">Contact Update</h1>
            <LinkButton label="Back" url="/contact" />
        </div>

        <div class="p-5">
            <form @submit.prevent="submit" class="space-y-3">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Title -->
                    <div>
                        <InputLabel label="Name" v-model="form.full_name" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.full_name">
                            {{ form.errors.full_name }}
                        </span>
                    </div>

                    <div>
                        <InputLabel label="Email" v-model="form.email" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.email">
                            {{ form.errors.email }}
                        </span>
                    </div>

                    <div>
                        <InputLabel label="Phone" v-model="form.phone" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.phone">
                            {{ form.errors.phone }}
                        </span>
                    </div>

                    <div>
                        <Label label="Status" />
                        <select v-model="form.status"
                            class="border border-gray-300 rounded px-3 py-2 w-full mt-1 text-sm">
                            <option value="">Select status</option>
                            <option value="pending">Pending</option>
                            <option value="read">Read</option>
                            <option value="replied">Replied</option>
                        </select>
                        <span class="text-red-500 text-sm" v-if="form.errors.status">
                            {{ form.errors.status }}
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


