<template>
    <div class="w-full h-full">
        <table class="w-full h-full border-gray-200 border-[1.5px] rounded-md flex flex-col">
            <thead class="bg-gray-100">
                <tr class="grid grid-cols-[auto,1fr,1fr,auto] gap-x-[8px] px-[12px] py-[4px]">
                    <th class="text-writeSecondary w-[32px] text-start">No.</th>
                    <th class="text-writeSecondary text-start">Nama</th>
                    <th class="text-writeSecondary text-start">Email</th>
                    <th class="text-writeSecondary w-[210px] text-end">Action</th>
                </tr>
            </thead>
            <tbody class="pt-[8px]">
                <tr class="grid grid-cols-[auto,1fr,1fr,auto] gap-x-[8px] px-[12px] py-[4px]">
                    <td class="w-[32px] text-start">No.</td>
                    <td class="text-start">Nama</td>
                    <td class="text-start">Email</td>
                    <td class="w-[210px] text-end text-[14px] text-write flex flex-row justify-end gap-x-[12px]">
                        <Button type="delete" label="Hapus" />
                        <Button type="edit" label="Edit" />
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script setup>
import Button from '../Misc/Button.vue';
</script>