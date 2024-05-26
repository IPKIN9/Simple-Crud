<template>
    <Main>
        <div class="py-[1.5rem] px-[72px]">
            <div class="flex flex-row justify-between">
                <h1>Users</h1>
                <Button type="add" label="Tambah User" />
            </div>
            <div class="mt-[1.5rem]">
                <UserTable />
            </div>
        </div>
    </Main>
</template>
<script setup>
    import Main from "../layout/Main.vue";
    import UserTable from "../components/users/UserTable.vue";
    import Button from "../components/Misc/Button.vue";
</script>