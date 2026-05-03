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
                title: 'Backed Strength List',
                href: '/backed-strength',
            },
        ],
    },
});

const props = defineProps<{
    backedStrength: any;
}>()

const form = useForm({

    highlight_title: props.backedStrength.highlight_title,
    description: props.backedStrength.description,
    item_title: props.backedStrength.item_title,
    item_one: props.backedStrength.item_one,
    item_two: props.backedStrength.item_two,
    item_three: props.backedStrength.item_three,
    item_four: props.backedStrength.item_four,

});



const submit = () => {
    form.post('/backed-strength/update', {
        forceFormData: true,
    });
};


</script>

<template>

    <Head title="Backed Strength Update" />

    <div class="bg-white text-gray-500 m-7 p-5 rounded">
        <!-- Header -->
        <div class="flex items-center justify-between border-b pb-3">
            <h1 class="text-xl font-medium">Backed Strength Update</h1>
            <LinkButton label="Back" url="/how-we-underwrite" />
        </div>

        <div class="p-5">
            <form @submit.prevent="submit" class="space-y-3">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <InputLabel label="Highlight Title" v-model="form.highlight_title" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.highlight_title">
                            {{ form.errors.highlight_title }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Item Title" v-model="form.item_title" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.item_title">
                            {{ form.errors.item_title }}
                        </span>
                    </div>
                </div>

                <div>
                    <Textarea label="Description" v-model="form.description" type="text" />
                    <span class="text-red-500 text-sm" v-if="form.errors.description">
                        {{ form.errors.description }}
                    </span>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <div>
                        <InputLabel label="Item One" v-model="form.item_one" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.item_one">
                            {{ form.errors.item_one }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Item Two" v-model="form.item_two" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.item_two">
                            {{ form.errors.item_two }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Item Three" v-model="form.item_three" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.item_three">
                            {{ form.errors.item_three }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Item Four" v-model="form.item_four" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.item_four">
                            {{ form.errors.item_four }}
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
