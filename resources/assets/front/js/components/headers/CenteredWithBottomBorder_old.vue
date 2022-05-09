<template>
    <Popover class="relative bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="flex justify-between items-center border-b-2 border-gray-100 py-6 md:justify-start md:space-x-10">
                <div class="flex justify-start lg:w-0 lg:flex-1">
                    <a href="/">
                        <span class="sr-only">Workflow</span>
                        <img class="h-8 w-auto sm:h-10" :src="logo" alt="" />
                    </a>
                </div>
                <div class="-mr-2 -my-2 md:hidden">
                    <PopoverButton class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                        <span class="sr-only">Open menu</span>
                        <MenuIcon class="h-6 w-6" aria-hidden="true" />
                    </PopoverButton>
                </div>
                <PopoverGroup as="nav" class="hidden md:flex space-x-10">
                    <div v-for="item in itemMenus">
                        <Popover v-if="item.childrens.length" class="relative" v-slot="{ open }">
                            <PopoverButton :class="[open ? 'text-gray-900' : 'text-gray-500', 'group bg-white rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500']">
                                <span>{{ item.name }}</span>
                                <ChevronDownIcon :class="[open ? 'text-gray-600' : 'text-gray-400', 'ml-2 h-5 w-5 group-hover:text-gray-500']" aria-hidden="true" />
                            </PopoverButton>

                            <transition enter-active-class="transition ease-out duration-200" enter-from-class="opacity-0 translate-y-1" enter-to-class="opacity-100 translate-y-0" leave-active-class="transition ease-in duration-150" leave-from-class="opacity-100 translate-y-0" leave-to-class="opacity-0 translate-y-1">
                                <PopoverPanel class="absolute z-10 -ml-4 mt-3 transform px-2 w-screen max-w-md sm:px-0 lg:ml-0 lg:left-1/2 lg:-translate-x-1/2">
                                    <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
                                        <div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8">
                                            <a v-for="children in item.childrens" :key="children.name" :href="children.path" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
                                                <img v-if="children.images.length > 0" class="flex-shrink-0 h-6 w-6 text-indigo-600" :src="children.images[0].path">
                                                <div class="ml-4">
                                                    <p class="text-base font-medium text-gray-900">
                                                        {{ children.name }}
                                                    </p>
                                                    <p class="mt-1 text-sm text-gray-500">
                                                    </p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </PopoverPanel>
                            </transition>
                        </Popover>
                        <a v-else :href="item.path" class="text-base font-medium text-gray-500 hover:text-gray-900"> {{item.name}} </a>
                    </div>
                </PopoverGroup>
                <div class="hidden md:flex items-center justify-end md:flex-1 lg:w-0">
                    <input type="text" name="search">
                    <ul>
                        <li v-for="(locale, key) in this.locales"><a :href="'/'+key" v-text="key"></a></li>
                    </ul>
                </div>
            </div>
        </div>

        <transition enter-active-class="duration-200 ease-out" enter-from-class="opacity-0 scale-95" enter-to-class="opacity-100 scale-100" leave-active-class="duration-100 ease-in" leave-from-class="opacity-100 scale-100" leave-to-class="opacity-0 scale-95">
            <PopoverPanel focus class="absolute top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden">

            </PopoverPanel>
        </transition>
    </Popover>
</template>

<script>
import { Popover, PopoverButton, PopoverGroup, PopoverPanel } from '@headlessui/vue'
import {
    BookmarkAltIcon,
    CalendarIcon,
    ChartBarIcon,
    CursorClickIcon,
    MenuIcon,
    PhoneIcon,
    PlayIcon,
    RefreshIcon,
    ShieldCheckIcon,
    SupportIcon,
    ViewGridIcon,
    XIcon,
} from '@heroicons/vue/outline'
import { ChevronDownIcon } from '@heroicons/vue/solid'
import {onMounted, toRefs, computed} from "vue";


export default {
    components: {
        Popover,
        PopoverButton,
        PopoverGroup,
        PopoverPanel,
        ChevronDownIcon,
        MenuIcon,
        XIcon,
    },
    props: {
        component_data: Object,
        locales: Object,
    },
    setup(props) {
        const logo = computed(()=>{
            return props.component_data.image_logo.default[0].path
        })

        const itemMenus = computed(()=>{
            return props.component_data.menu.default.items;
        })

        const locales = computed(()=>{
            return props.locales;
        })

        const button1 = computed(()=>{
            return { title: props.component_data.button_title_1.default, path: props.component_data.button_link_1.default}
        })

        const button2 = computed(()=>{
            return { title: props.component_data.button_title_2.default, path: props.component_data.button_link_2.default}

        })

        return {
            logo,
            itemMenus,
            button1,
            button2
        }
    },
}
</script>
