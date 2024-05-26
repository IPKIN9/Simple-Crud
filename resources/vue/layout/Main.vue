<template>
    <div class="grid grid-cols-[auto,1fr] gap-x-3">
        <SideBar />
        <slot></slot>
    </div>
</template>
<script setup>
import SideBar from './SideBar.vue';
</script>