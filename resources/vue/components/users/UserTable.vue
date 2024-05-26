<template>
    <div class="w-full h-full">
        <table class="w-full h-full border-gray-200 border-[1.5px] rounded-md flex flex-col">
            <thead class="bg-gray-100">
                <tr class="grid grid-cols-[auto,1fr,1fr,auto,auto] gap-x-[8px] px-[12px] py-[4px]">
                    <th class="text-writeSecondary w-[32px] text-start">No.</th>
                    <th class="text-writeSecondary text-start">Nama</th>
                    <th class="text-writeSecondary text-start">Email</th>
                    <th class="text-writeSecondary text-start w-[100px]">Created</th>
                    <th class="text-writeSecondary w-[210px] text-end">Action</th>
                </tr>
            </thead>
            <div v-if="loading" class="w-full flex flex-row justify-center py-[24px] gap-x-[8px] items-center">
                <p class="text-writeSecondary font-[500] text-[14px]">Mengambil Data</p> <i class="fas fa-spinner fa-spin text-writeSecondary font-[500]"></i>
            </div>
            <tbody v-if="users.length >= 1 && !loading" class="pt-[8px]">
                <tr v-for="(d, i) in users" class="grid grid-cols-[auto,1fr,1fr,auto,auto] gap-x-[8px] px-[12px] py-[4px]">
                    <td class="text-[14px] w-[32px] text-start">{{ i += 1 }}.</td>
                    <td class="text-[14px] text-start">{{ d.name }}</td>
                    <td class="text-[14px] text-start">{{ d.email }}</td>
                    <td class="text-[14px] text-start w-[100px]">{{ formatDate(d.created_at) }}</td>
                    <td class="w-[210px] text-end text-[14px] text-write flex flex-row justify-end gap-x-[12px]">
                        <Button @action="deleteUsers(d.id)" type="delete" label="Hapus" />
                        <Button @action="sendEmits(d)" type="edit" label="Edit" />
                    </td>
                </tr>
            </tbody>
            <div v-if="users.length < 1 && !loading" class="w-full flex flex-row justify-center py-[24px]">
                <h3 class="font-[500] text-writeSecondary text-[14px]">Data tidak ditemukan</h3>
            </div>
            
        </table>
    </div>
</template>
<script setup>
import { ref, defineEmits, onMounted } from 'vue';
import Button from '../Misc/Button.vue';
import axios from 'axios';

const emits = defineEmits(['edit']);

const sendEmits = (data) => {
    emits('edit', data);
}

const users = ref([]);
const loading = ref(false);

const getUsers = async () => {
    loading.value = true;
    try {
        const response = await axios.get('/api/users');
        users.value = response.data.data;
    } catch (error) {
        console.error(error);
        if (error.response.status !== 422) {
            alert(error.response.status === 500 ? 'Terjadi kesalahan. Silakan coba lagi nanti.' : 'Data tidak ditemukan');
        } else if (error.response.status === 422) {
            alert(error.response.data.message);
        }
    }
    setTimeout(() => {
        loading.value = false;
    }, 1000);
};

const deleteUsers = async (id) => {
    try {
        await axios.delete(`/api/users/${id}`);
        getUsers();
    } catch (error) {
        console.error(error);
        if (error.response.status !== 422) {
            alert(error.response.status === 500 ? 'Terjadi kesalahan. Silakan coba lagi nanti.' : 'Data tidak ditemukan');
        } else if (error.response.status === 422) {
            alert(error.response.data.message);
        }
    }
    setTimeout(() => {
        getUsers();
    }, 1000);
};

const formatDate = (date) => {
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    return new Date(date).toLocaleDateString('id-ID', options);
};

onMounted(() => {
    getUsers();
});
</script>