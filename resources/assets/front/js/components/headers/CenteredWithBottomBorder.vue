<template>
    <Popover class="relative bg-white">
        <div class="absolute inset-0 shadow z-30 pointer-events-none" aria-hidden="true" />
        <div class="relative z-20">
            <div class="max-w-7xl mx-auto flex justify-between items-center px-4 py-5 sm:px-6 sm:py-4 lg:px-8 md:justify-start md:space-x-10">
                <div>
                    <a href="#" class="flex">
                        <span class="sr-only"></span>
                        <img class="h-8 w-auto sm:h-10" :src="logo" alt="" />
                    </a>
                </div>
                <div class="-mr-2 -my-2 md:hidden">
                    <PopoverButton class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                        <span class="sr-only" v-text="openMenu"></span>
                        <MenuIcon class="h-6 w-6" aria-hidden="true" />
                    </PopoverButton>
                </div>
                <div class="hidden md:flex-1 md:flex md:items-center md:justify-between">
                    <PopoverGroup as="nav" class="flex space-x-10">
                        <Popover v-slot="{ open }">
                            <PopoverButton :class="[open ? 'text-gray-900' : 'text-gray-500', 'group bg-white rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500']">
                                <span v-text="main_data.text_first_item_menu.default"></span>
                                <ChevronDownIcon :class="[open ? 'text-gray-600' : 'text-gray-400', 'ml-2 h-5 w-5 group-hover:text-gray-500']" aria-hidden="true" />
                            </PopoverButton>

                            <transition enter-active-class="transition ease-out duration-200" enter-from-class="opacity-0 -translate-y-1" enter-to-class="opacity-100 translate-y-0" leave-active-class="transition ease-in duration-150" leave-from-class="opacity-100 translate-y-0" leave-to-class="opacity-0 -translate-y-1">
                                <PopoverPanel class="hidden md:block absolute z-10 top-full inset-x-0 transform shadow-lg bg-white">
                                    <div class="absolute inset-0 flex">
                                        <div class="bg-white w-1/2" />
                                        <div class="bg-gray-50 w-1/2" />
                                    </div>

                                    <div class="relative max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-1">
                                        <nav class="grid gap-y-10 px-4 py-8 bg-white sm:grid-cols-7 sm:gap-x-8 sm:py-12 sm:px-6 lg:px-8 xl:pr-12">
                                            <div>
                                                <h3 class="text-sm font-medium tracking-wide text-gray-500 uppercase" v-text="main_data.text_first_item_menu.default"></h3>
                                                <ul role="list" class="mt-5 space-y-6">
                                                    <li v-for="item in main_data.menu_1.default.items" :key="item.id" class="flow-root">
                                                        <a :href="item.path" class="-m-3 p-3 flex items-center rounded-md text-base font-medium text-gray-900 hover:bg-gray-50">
                                                            <span class="ml-4">{{ item.name }}</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div>
                                                <h3 class="text-sm font-medium tracking-wide text-gray-500 uppercase" v-text="main_data.text_2_menu.default"></h3>
                                                <ul role="list" class="mt-5 space-y-6">
                                                    <li v-for="item in main_data.menu_2.default.items" :key="item.id" class="flow-root">
                                                        <a :href="item.path" class="-m-3 p-3 flex items-center rounded-md text-base font-medium text-gray-900 hover:bg-gray-50">
                                                            <span class="ml-4">{{ item.name }}</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div>
                                                    <a class="text-sm font-medium tracking-wide text-gray-500 uppercase" v-text="main_data.text_3_menu.default"></a>
                                            </div>
                                            <div>
                                                <h3 class="text-sm font-medium tracking-wide text-gray-500 uppercase" v-text="main_data.text_4_menu.default"></h3>
                                            </div>
                                            <div>
                                                <h3 class="text-sm font-medium tracking-wide text-gray-500 uppercase" v-text="main_data.text_5_menu.default"></h3>
                                            </div>
                                            <div>
                                                <h3 class="text-sm font-medium tracking-wide text-gray-500 uppercase" v-text="main_data.text_6_menu.default"></h3>
                                            </div>
                                            <div>
                                                <h3 class="text-sm font-medium tracking-wide text-gray-500 uppercase" v-text="main_data.text_7_menu.default"></h3>
                                                <ul role="list" class="mt-5 space-y-6">
                                                    <ul role="list" class="mt-5 space-y-6">
                                                        <li v-for="item in main_data.menu_3.default.items" :key="item.id" class="flow-root">
                                                            <a :href="item.path" class="-m-3 p-3 flex items-center rounded-md text-base font-medium text-gray-900 hover:bg-gray-50">
                                                                <span class="ml-4">{{ item.name }}</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </ul>
                                            </div>
                                        </nav>
                                    </div>
                                </PopoverPanel>
                            </transition>
                        </Popover>
                        <Popover v-slot="{ open }">
                            <PopoverButton :class="[open ? 'text-gray-900' : 'text-gray-500', 'group bg-white rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500']">
                                <span v-text="main_data.text_2_menu.default"></span>
                                <ChevronDownIcon :class="[open ? 'text-gray-600' : 'text-gray-400', 'ml-2 h-5 w-5 group-hover:text-gray-500']" aria-hidden="true" />
                            </PopoverButton>

                            <transition enter-active-class="transition ease-out duration-200" enter-from-class="opacity-0 -translate-y-1" enter-to-class="opacity-100 translate-y-0" leave-active-class="transition ease-in duration-150" leave-from-class="opacity-100 translate-y-0" leave-to-class="opacity-0 -translate-y-1">
                                <PopoverPanel class="hidden md:block absolute z-10 top-full inset-x-0 transform shadow-lg bg-white">
                                    <div class="absolute inset-0 flex">
                                        <div class="bg-white w-1/2" />
                                        <div class="bg-gray-50 w-1/2" />
                                    </div>

                                    <div class="relative max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-1">
                                        <nav class="grid gap-y-10 px-4 py-8 bg-white sm:grid-cols-7 sm:gap-x-8 sm:py-12 sm:px-6 lg:px-8 xl:pr-12">
                                            <div>
                                                <h3 class="text-sm font-medium tracking-wide text-gray-500 uppercase" v-text="main_data.text_first_item_menu.default"></h3>
                                                <ul role="list" class="mt-5 space-y-6">
                                                    <li v-for="item in main_data.menu_1.default.items" :key="item.id" class="flow-root">
                                                        <a :href="item.path" class="-m-3 p-3 flex items-center rounded-md text-base font-medium text-gray-900 hover:bg-gray-50">
                                                            <span class="ml-4">{{ item.name }}</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div>
                                                <h3 class="text-sm font-medium tracking-wide text-gray-500 uppercase" v-text="main_data.text_2_menu.default"></h3>
                                                <ul role="list" class="mt-5 space-y-6">
                                                    <li v-for="item in main_data.menu_2.default.items" :key="item.id" class="flow-root">
                                                        <a :href="item.path" class="-m-3 p-3 flex items-center rounded-md text-base font-medium text-gray-900 hover:bg-gray-50">
                                                            <span class="ml-4">{{ item.name }}</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div>
                                                <a class="text-sm font-medium tracking-wide text-gray-500 uppercase" v-text="main_data.text_3_menu.default"></a>
                                            </div>
                                            <div>
                                                <h3 class="text-sm font-medium tracking-wide text-gray-500 uppercase" v-text="main_data.text_4_menu.default"></h3>
                                            </div>
                                            <div>
                                                <h3 class="text-sm font-medium tracking-wide text-gray-500 uppercase" v-text="main_data.text_5_menu.default"></h3>
                                            </div>
                                            <div>
                                                <h3 class="text-sm font-medium tracking-wide text-gray-500 uppercase" v-text="main_data.text_6_menu.default"></h3>
                                            </div>
                                            <div>
                                                <h3 class="text-sm font-medium tracking-wide text-gray-500 uppercase" v-text="main_data.text_7_menu.default"></h3>
                                                <ul role="list" class="mt-5 space-y-6">
                                                    <ul role="list" class="mt-5 space-y-6">
                                                        <li v-for="item in main_data.menu_3.default.items" :key="item.id" class="flow-root">
                                                            <a :href="item.path" class="-m-3 p-3 flex items-center rounded-md text-base font-medium text-gray-900 hover:bg-gray-50">
                                                                <span class="ml-4">{{ item.name }}</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </ul>
                                            </div>
                                        </nav>
                                    </div>
                                </PopoverPanel>
                            </transition>
                        </Popover>
                        <a :href="main_data.link_3.default" class="text-base font-medium text-gray-500 hover:text-gray-900" v-text="main_data.text_3_menu.default"> </a>
                        <a :href="main_data.link_4.default" class="text-base font-medium text-gray-500 hover:text-gray-900" v-text="main_data.text_4_menu.default"></a>
                        <a :href="main_data.link_5.default" class="text-base font-medium text-gray-500 hover:text-gray-900" v-text="main_data.text_5_menu.default"> </a>
                        <a :href="main_data.link_6.default" class="text-base font-medium text-gray-500 hover:text-gray-900" v-text="main_data.text_6_menu.default"></a>
                        <Popover v-slot="{ open }">
                            <PopoverButton :class="[open ? 'text-gray-900' : 'text-gray-500', 'group bg-white rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500']">
                                <span v-text="main_data.text_7_menu.default"></span>
                                <ChevronDownIcon :class="[open ? 'text-gray-600' : 'text-gray-400', 'ml-2 h-5 w-5 group-hover:text-gray-500']" aria-hidden="true" />
                            </PopoverButton>

                            <transition enter-active-class="transition ease-out duration-200" enter-from-class="opacity-0 -translate-y-1" enter-to-class="opacity-100 translate-y-0" leave-active-class="transition ease-in duration-150" leave-from-class="opacity-100 translate-y-0" leave-to-class="opacity-0 -translate-y-1">
                                <PopoverPanel class="hidden md:block absolute z-10 top-full inset-x-0 transform shadow-lg bg-white">
                                    <div class="absolute inset-0 flex">
                                        <div class="bg-white w-1/2" />
                                        <div class="bg-gray-50 w-1/2" />
                                    </div>

                                    <div class="relative max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-1">
                                        <nav class="grid gap-y-10 px-4 py-8 bg-white sm:grid-cols-7 sm:gap-x-8 sm:py-12 sm:px-6 lg:px-8 xl:pr-12">
                                            <div>
                                                <h3 class="text-sm font-medium tracking-wide text-gray-500 uppercase" v-text="main_data.text_first_item_menu.default"></h3>
                                                <ul role="list" class="mt-5 space-y-6">
                                                    <li v-for="item in main_data.menu_1.default.items" :key="item.id" class="flow-root">
                                                        <a :href="item.path" class="-m-3 p-3 flex items-center rounded-md text-base font-medium text-gray-900 hover:bg-gray-50">
                                                            <span class="ml-4">{{ item.name }}</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div>
                                                <h3 class="text-sm font-medium tracking-wide text-gray-500 uppercase" v-text="main_data.text_2_menu.default"></h3>
                                                <ul role="list" class="mt-5 space-y-6">
                                                    <li v-for="item in main_data.menu_2.default.items" :key="item.id" class="flow-root">
                                                        <a :href="item.path" class="-m-3 p-3 flex items-center rounded-md text-base font-medium text-gray-900 hover:bg-gray-50">
                                                            <span class="ml-4">{{ item.name }}</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div>
                                                <a class="text-sm font-medium tracking-wide text-gray-500 uppercase" v-text="main_data.text_3_menu.default"></a>
                                            </div>
                                            <div>
                                                <h3 class="text-sm font-medium tracking-wide text-gray-500 uppercase" v-text="main_data.text_4_menu.default"></h3>
                                            </div>
                                            <div>
                                                <h3 class="text-sm font-medium tracking-wide text-gray-500 uppercase" v-text="main_data.text_5_menu.default"></h3>
                                            </div>
                                            <div>
                                                <h3 class="text-sm font-medium tracking-wide text-gray-500 uppercase" v-text="main_data.text_6_menu.default"></h3>
                                            </div>
                                            <div>
                                                <h3 class="text-sm font-medium tracking-wide text-gray-500 uppercase" v-text="main_data.text_7_menu.default"></h3>
                                                <ul role="list" class="mt-5 space-y-6">
                                                    <ul role="list" class="mt-5 space-y-6">
                                                        <li v-for="item in main_data.menu_3.default.items" :key="item.id" class="flow-root">
                                                            <a :href="item.path" class="-m-3 p-3 flex items-center rounded-md text-base font-medium text-gray-900 hover:bg-gray-50">
                                                                <span class="ml-4">{{ item.name }}</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </ul>
                                            </div>
                                        </nav>
                                    </div>
                                </PopoverPanel>
                            </transition>
                        </Popover>

                    </PopoverGroup>

                </div>
                <div class="hidden md:flex items-center justify-end md:flex-1 lg:w-0">
                    <input type="text" name="search">
                    <ul>
                        <li v-for="(locale, key) in this.locales"><a :href="'/'+key" v-text="key"></a></li>
                    </ul>
                </div>
            </div>
        </div>

        <transition enter-active-class="duration-200 ease-out" enter-from-class="opacity-0 scale-95" enter-to-class="opacity-100 scale-100" leave-active-class="duration-100 ease-in" leave-from-class="opacity-100 scale-100" leave-to-class="opacity-0 scale-95">
            <PopoverPanel focus class="absolute z-30 top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden">
                <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y-2 divide-gray-50">
                    <div class="pt-5 pb-6 px-5 sm:pb-8">
                        <div class="flex items-center justify-between">
                            <div>
                                <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="Workflow" />
                            </div>
                            <div class="-mr-2">
                                <PopoverButton class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                                    <span class="sr-only">Close menu</span>
                                    <XIcon class="h-6 w-6" aria-hidden="true" />
                                </PopoverButton>
                            </div>
                        </div>
                    </div>
                    <div class="py-6 px-5">
                        <div class="grid grid-cols-1 gap-4">
                            <div class="rounded-md text-base font-medium text-orange-900 hover:text-orange-700"> {{ main_data.text_first_item_menu.default }} </div>
                            <li v-for="item in main_data.menu_1.default.items" :key="item.id" class="flow-root">
                                <a :href="item.path" class="-m-3 p-3 flex items-center rounded-md text-base font-medium text-gray-900 hover:bg-gray-50">
                                    <span class="ml-4">{{ item.name }}</span>
                                </a>
                            </li>
                            <div  class="rounded-md text-base font-medium text-orange-900 hover:text-orange-700"> {{ main_data.text_2_menu.default }} </div>
                            <li v-for="item in main_data.menu_2.default.items" :key="item.id" class="flow-root">
                                <a :href="item.path" class="-m-3 p-3 flex items-center rounded-md text-base font-medium text-gray-900 hover:bg-gray-50">
                                    <span class="ml-4">{{ item.name }}</span>
                                </a>
                            </li>
                            <a :href="main_data.link_3.default" class="rounded-md text-base font-medium text-orange-900 hover:text-orange-700"> {{ main_data.text_3_menu.default }} </a>
                            <a :href="main_data.link_4.default" class="rounded-md text-base font-medium text-orange-900 hover:text-orange-700"> {{ main_data.text_4_menu.default }} </a>
                            <a :href="main_data.link_5.default" class="rounded-md text-base font-medium text-orange-900 hover:text-orange-700"> {{ main_data.text_5_menu.default }} </a>
                            <a :href="main_data.link_6.default" class="rounded-md text-base font-medium text-orange-900 hover:text-orange-700"> {{ main_data.text_6_menu.default }} </a>
                            <div class="rounded-md text-base font-medium text-orange-900 hover:text-orange-700"> {{ main_data.text_7_menu.default }} </div>
                            <li v-for="item in main_data.menu_3.default.items" :key="item.id" class="flow-root">
                                <a :href="item.path" class="-m-3 p-3 flex items-center rounded-md text-base font-medium text-gray-900 hover:bg-gray-50">
                                    <span class="ml-4">{{ item.name }}</span>
                                </a>
                            </li>
                        </div>
                    </div>
                </div>
            </PopoverPanel>
        </transition>
    </Popover>
</template>

<script>
import { Popover, PopoverButton, PopoverGroup, PopoverPanel } from '@headlessui/vue'
import {
    BookmarkAltIcon,
    BriefcaseIcon,
    ChartBarIcon,
    CheckCircleIcon,
    CursorClickIcon,
    DesktopComputerIcon,
    GlobeAltIcon,
    InformationCircleIcon,
    MenuIcon,
    NewspaperIcon,
    OfficeBuildingIcon,
    PhoneIcon,
    PlayIcon,
    ShieldCheckIcon,
    UserGroupIcon,
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
        const open_menu = computed((props)=>{
            return props.component_data.open_menu.default
        })

        const main_data = computed(()=>{
            return props.component_data;
        })
        const locales = computed(()=>{
            return props.locales;
        })

        return {
            logo,
            locales,
            main_data,
        }
    },
}
</script>
