<template>
     <button @click="$emits('action')" class="flex flex-row px-[12px] py-[6px] text-[11px] text-white font-[600] rounded-md" :class="classes">
        {{ props.label }}
    </button>
</template>
<script setup>
    import { defineProps } from 'vue';

    const props = defineProps({
        label: String,
        type: String,
    });

    const classes = {
        'bg-red-600' : props.type === 'delete',
        'bg-cyan-600': props.type === 'edit',
        'bg-gray-600': props.type === 'add',
    };
</script>