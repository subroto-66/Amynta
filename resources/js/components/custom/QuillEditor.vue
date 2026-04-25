<script setup>
import Quill from 'quill'
import { onMounted, ref, watch } from 'vue'
import 'quill/dist/quill.snow.css'

const props = defineProps({
    modelValue: String
})

const emit = defineEmits(['update:modelValue'])

const editor = ref(null)
let quill

onMounted(() => {
    quill = new Quill(editor.value, {
        theme: 'snow'
    })

    quill.on('text-change', () => {
        emit('update:modelValue', quill.root.innerHTML)
    })

    if (props.modelValue) {
        quill.root.innerHTML = props.modelValue
    }
})
</script>

<template>
    <div ref="editor"></div>
    <!-- <QuillEditor v-model:content="form.content" contentType="html" theme="snow" class="mt-4" /> -->
</template>