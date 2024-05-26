<template>
    <div class="h-screen w-[13.125rem] flex flex-col gap-y-[0.875rem] bg-white py-[1.5rem] border-[0.0625rem]">
        <div class="px-[0.875rem] flex flex-col gap-y-[0.875rem]">
            <h3 class="text-[1.125rem] font-[700] text-write">Simple App</h3>
            <div class="flex flex-row items-center gap-x-[8px] border-[0.0938rem] w-full rounded-[6px] overflow-clip px-[12px] py-[8px]">
                <i class="fas fa-search text-[12px] text-gray-400"></i>
                <input type="text" class="border-none w-full focus:outline-none text-[0.6875rem] h-[0.75rem]" placeholder="Search">
            </div>
        </div>
        <div class="flex flex-col gap-y-[12px] py-[8px]">
            <router-link to="/" class="flex flex-row justify-row gap-x-[12px] items-top px-[0.875rem] py-[4px]" :class="$route.name === 'home' ? 'bg-gray-200' : ''">
                <i class="fas fa-home text-[14px] text-writeSecondary mt-[3px]"></i>
                <div class="flex flex-col gap-y-[4px] w-full">
                    <div class="flex flex-row justify-between items-center w-full">
                        <p class="text-writeSecondary text-[14px]">Home</p>
                    </div>
                </div>
            </router-link>
            <router-link to="/users" class="flex flex-row justify-row gap-x-[12px] items-top px-[0.875rem] py-[4px]" :class="$route.name === 'users' ? 'bg-gray-200' : ''">
                <i class="fas fa-users text-[14px] text-writeSecondary mt-[3px]"></i>
                <div class="flex flex-col gap-y-[4px] w-full">
                    <div class="flex flex-row justify-between items-center w-full">
                        <p class="text-writeSecondary text-[14px]">Users</p>
                    </div>
                </div>
            </router-link>
        </div>
    </div>
</template>

<script setup>
</script>