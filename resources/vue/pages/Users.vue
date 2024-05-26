<template>
    <Main>
        <div class="py-[1.5rem] px-[72px]">
            <div class="flex flex-row justify-between">
                <h1>Users</h1>
                <div class="flex flex-row gap-x-[12px]">
                    <Button @action="sendPayload()" type="add" label="Tambah User" />
                    <Button v-show="isActive" @action="updatePayload()" type="update" label="Update User" />
                </div>
            </div>
            <div class="grid grid-cols-[1fr,1fr,1fr,auto] items-end gap-x-[18px] w-full pb-[24px] pt-[18px] bg-slate-100 px-[24px] mt-[12px] rounded-[8px]">
                <div class="flex flex-col">
                    <label class="text-[14px]">Nama</label>
                    <input v-model="payload.name" type="text" placeholder="Masukan nama" class="border-[1px] px-[8px] py-[4px] rounded-[8px]">
                </div>
                <div class="flex flex-col">
                    <label class="text-[14px]">Email</label>
                    <input v-model="payload.email" type="text" placeholder="cth: example@gmail.com" class="border-[1px] px-[8px] py-[4px] rounded-[8px]">
                </div>
                <div class="flex flex-col">
                    <label class="text-[14px]">Password</label>
                    <input v-model="payload.password" type="password" placeholder="ABC123#" class="border-[1px] px-[8px] py-[4px] rounded-[8px]">
                </div>
                <div>
                    <Button v-show="isActive" @action="cleaPayload('batal')" type="add" label="Batal" />
                </div>
            </div>
            <div class="mt-[1.5rem]">
                <UserTable @edit="setDataToForm" />
            </div>
        </div>
    </Main>
</template>
<script setup>
    import { ref, reactive, watch } from 'vue';
    import Main from "../layout/Main.vue";
    import UserTable from "../components/users/UserTable.vue";
    import Button from "../components/Misc/Button.vue";

    const payload = reactive({
        name: '',
        email: '',
        password: ''
    })

    const isActive = ref(false);
    const updateId = ref(null);

    const cleaPayload = (type = null) => {
        payload.name = '';
        payload.email = '';
        payload.password = '';
        updateId.value = null;

        if (type !== 'batal') {
            setTimeout(() => {
                window.location.reload();
            }, 1000);
        }
    }

    const sendPayload = async () => {
        isActive.value = false;
        try {
            await axios.post('/api/users', payload);
            alert('Data berhasil ditambahkan')
            cleaPayload();
        } catch (error) {
            console.error(error);
            if (error.response.status === 500) {
                alert('Terjadi kesalahan. Silakan coba lagi nanti.');
            } else if (error.response.status === 422) {
                alert(error.response.data.message);
            }
        }
    }

    const updatePayload = async () => {
        try {
            await axios.put(`/api/users/${updateId.value}`, payload);
            alert('Data berhasil diupdate')
            cleaPayload();
        } catch (error) {
            console.error(error);
            if (error.response.status !== 422) {
                alert('Terjadi kesalahan. Silakan coba lagi nanti.');
            } else if (error.response.status === 422) {
                alert(error.response.data.message);
            }
        }
    }

    const setDataToForm = (data) => {
        payload.name = data.name;
        payload.email = data.email;
        payload.password = data.password;
        updateId.value = data.id;
    }

    watch(updateId, (newValue) => {
        if (newValue === null) {
            isActive.value = false;
        } else {
            isActive.value = true;
        }
    })
</script>