<template>
    <nav class="grid gap-y-10 px-4 py-8 bg-white sm:grid-cols-2 sm:gap-x-8 sm:py-12 sm:px-6 lg:px-8 xl:pr-12">
        <div>
            <h3 class="text-sm font-medium tracking-wide text-gray-500 uppercase">Company</h3>
            <ul role="list" class="mt-5 space-y-6">
                <li v-for="item in company" :key="item.name" class="flow-root">
                    <a :href="item.href" class="-m-3 p-3 flex items-center rounded-md text-base font-medium text-gray-900 hover:bg-gray-50">
                        <component :is="item.icon" class="flex-shrink-0 h-6 w-6 text-gray-400" aria-hidden="true" />
                        <span class="ml-4">{{ item.name }}</span>
                    </a>
                </li>
            </ul>
        </div>
        <div>
            <h3 class="text-sm font-medium tracking-wide text-gray-500 uppercase">Resources</h3>
            <ul role="list" class="mt-5 space-y-6">
                <li v-for="item in resources" :key="item.name" class="flow-root">
                    <a :href="item.href" class="-m-3 p-3 flex items-center rounded-md text-base font-medium text-gray-900 hover:bg-gray-50">
                        <component :is="item.icon" class="flex-shrink-0 h-6 w-6 text-gray-400" aria-hidden="true" />
                        <span class="ml-4">{{ item.name }}</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</template>
<script>
export default {

}
</script>
