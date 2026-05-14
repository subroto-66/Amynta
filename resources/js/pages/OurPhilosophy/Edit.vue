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
                title: 'Our Philosophy List',
                href: '/our-philosophy',
            },
        ],
    },
});

const props = defineProps<{
    ourPhilosophy: any;
    flash: {
        message?: string;
    };
}>()

const form = useForm({

    title: props.ourPhilosophy.title,
    subtitle: props.ourPhilosophy.subtitle,
    description: props.ourPhilosophy.description,
    qoute_one: props.ourPhilosophy.qoute_one,
    qoute_two: props.ourPhilosophy.qoute_two,
    item_one: props.ourPhilosophy.item_one,
    item_two: props.ourPhilosophy.item_two,
    item_three: props.ourPhilosophy.item_three,
    item_four: props.ourPhilosophy.item_four,
    item_five: props.ourPhilosophy.item_five,

});

const submit = () => {
    form.post('/our-philosophy/update', {
        forceFormData: true,
    });
};

</script>

<template>

    <Head title="Our Philosophy Update" />
    <FlashMessage :message="props.flash.message" />
    <div class="bg-white text-gray-500 m-7 p-5 rounded">
        <!-- Header -->
        <div class="flex items-center justify-between border-b pb-3">
            <h1 class="text-xl font-medium">Our Philosophy</h1>
            <LinkButton label="Back" url="/our-philosophy" />
        </div>

        <div class="p-5">
            <form @submit.prevent="submit" class="space-y-3">


                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">


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
                <div>
                    <Textarea label="Description" v-model="form.description" type="text" />
                    <span class="text-red-500 text-sm" v-if="form.errors.description">
                        {{ form.errors.description }}
                    </span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <Textarea label="Our Philosophy Quote One" v-model="form.qoute_one" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.qoute_one">
                            {{ form.errors.qoute_one }}
                        </span>
                    </div>
                    <div>
                        <Textarea label="Our Philosophy Quote Two" v-model="form.qoute_two" type="text" />
                        <span class="text-red-500 text-sm" v-if="form.errors.qoute_two">
                            {{ form.errors.qoute_two }}
                        </span>
                    </div>

                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <InputLabel label="Item One" v-model="form.item_one" />
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
                        <InputLabel label="Item Three" v-model="form.item_three" />
                        <span class="text-red-500 text-sm" v-if="form.errors.item_three">
                            {{ form.errors.item_three }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Item Four" v-model="form.item_four" />
                        <span class="text-red-500 text-sm" v-if="form.errors.item_four">
                            {{ form.errors.item_four }}
                        </span>
                    </div>
                    <div>
                        <InputLabel label="Item Five" v-model="form.item_five" />
                        <span class="text-red-500 text-sm" v-if="form.errors.item_five">
                            {{ form.errors.item_five }}
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
