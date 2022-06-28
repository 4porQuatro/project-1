<template>
    <div>
        <header>
            <div class="header">
                <div class="row mx-0 custom-nav-bar w-100">
                    <div class="col-lg d-sm-none d-none d-lg-block">
                        <div class="alignBox">
                            <PopoverGroup as="nav" class="navigation d-flex">
                                <Popover v-slot="{ open }">
                                    <PopoverButton
                                        class="nav-item me-4 d-inline-flex align-items-center"
                                    >
                                        <span
                                            v-text="
                                                main_data.text_first_item_menu
                                                    .default
                                            "
                                        ></span>
                                    </PopoverButton>

                                    <transition
                                        enter-active-class="transition ease-out duration-200"
                                        enter-from-class="opacity-0 -translate-y-1"
                                        enter-to-class="opacity-100 translate-y-0"
                                        leave-active-class="transition ease-in duration-150"
                                        leave-from-class="opacity-100 translate-y-0"
                                        leave-to-class="opacity-0 -translate-y-1"
                                    >
                                        <PopoverPanel
                                            class="hidden md:block absolute z-10 top-full inset-x-0 transform shadow-lg secondary-bg"
                                        >
                                            <div
                                                class="relative max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-1"
                                            >
                                                <nav
                                                    class="grid gap-y-10 px-4 py-8 sm:grid-cols-7 sm:gap-x-8 sm:py-12 sm:px-6 lg:px-8 xl:pr-12"
                                                >
                                                    <div>
                                                        <h3
                                                            class="text-sm font-medium tracking-wide yellow-text uppercase"
                                                            v-text="
                                                                main_data
                                                                    .text_first_item_menu
                                                                    .default
                                                            "
                                                        ></h3>
                                                        <ul
                                                            role="list"
                                                            class="mt-4 space-y-6 mt-lg-5"
                                                        >
                                                            <li
                                                                v-for="item in main_data
                                                                    .menu_1
                                                                    .default
                                                                    .items"
                                                                :key="item.id"
                                                                class="flow-root"
                                                            >
                                                                <a
                                                                    :href="
                                                                        item.path
                                                                    "
                                                                    class="ms-3 mt-2 flex items-center"
                                                                >
                                                                    <span
                                                                        class="ml-4 text-white"
                                                                        >{{
                                                                            item.name
                                                                        }}</span
                                                                    >
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div>
                                                        <h3
                                                            class="text-sm font-medium tracking-wide yellow-text uppercase"
                                                            v-text="
                                                                main_data
                                                                    .text_2_menu
                                                                    .default
                                                            "
                                                        ></h3>
                                                        <ul
                                                            role="list"
                                                            class="mt-4 space-y-6 mt-lg-5"
                                                        >
                                                            <li
                                                                v-for="item in main_data
                                                                    .menu_2
                                                                    .default
                                                                    .items"
                                                                :key="item.id"
                                                                class="flow-root"
                                                            >
                                                                <a
                                                                    :href="
                                                                        item.path
                                                                    "
                                                                    class="ms-3 mt-2 flex items-center"
                                                                >
                                                                    <span
                                                                        class="ml-4 texy-white"
                                                                        >{{
                                                                            item.name
                                                                        }}</span
                                                                    >
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div>
                                                        <a
                                                            class="text-sm font-medium tracking-wide yellow-text uppercase"
                                                            :href="
                                                                main_data.link_3
                                                                    .default
                                                            "
                                                            v-text="
                                                                main_data
                                                                    .text_3_menu
                                                                    .default
                                                            "
                                                        ></a>
                                                    </div>
                                                    <div>
                                                        <a
                                                            class="text-sm font-medium tracking-wide yellow-text uppercase"
                                                            :href="
                                                                main_data.link_4
                                                                    .default
                                                            "
                                                            v-text="
                                                                main_data
                                                                    .text_4_menu
                                                                    .default
                                                            "
                                                        ></a>
                                                    </div>
                                                    <div>
                                                        <a
                                                            class="text-sm font-medium tracking-wide yellow-text uppercase"
                                                            :href="
                                                                main_data.link_5
                                                                    .default
                                                            "
                                                            v-text="
                                                                main_data
                                                                    .text_5_menu
                                                                    .default
                                                            "
                                                        ></a>
                                                    </div>
                                                    <div>
                                                        <a
                                                            class="text-sm font-medium tracking-wide yellow-text uppercase"
                                                            :href="
                                                                main_data.link_6
                                                                    .default
                                                            "
                                                            v-text="
                                                                main_data
                                                                    .text_6_menu
                                                                    .default
                                                            "
                                                        ></a>
                                                    </div>
                                                    <div>
                                                        <h3
                                                            class="text-sm font-medium tracking-wide yellow-text uppercase"
                                                            v-text="
                                                                main_data
                                                                    .text_7_menu
                                                                    .default
                                                            "
                                                        ></h3>
                                                        <ul
                                                            role="list"
                                                            class="mt-4 space-y-6 mt-lg-5"
                                                        >
                                                            <ul
                                                                role="list"
                                                                class="mt-4 space-y-6 mt-lg-5"
                                                            >
                                                                <li
                                                                    v-for="item in main_data
                                                                        .menu_3
                                                                        .default
                                                                        .items"
                                                                    :key="
                                                                        item.id
                                                                    "
                                                                    class="flow-root"
                                                                >
                                                                    <a
                                                                        :href="
                                                                            item.path
                                                                        "
                                                                        class="ms-3 mt-2 flex items-center"
                                                                    >
                                                                        <span
                                                                            class="ml-4 text-white"
                                                                            >{{
                                                                                item.name
                                                                            }}</span
                                                                        >
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
                                    <PopoverButton
                                        class="nav-item me-4 d-inline-flex align-items-center"
                                    >
                                        <span
                                            v-text="
                                                main_data.text_2_menu.default
                                            "
                                        ></span>
                                    </PopoverButton>

                                    <transition
                                        enter-active-class="transition ease-out duration-200"
                                        enter-from-class="opacity-0 -translate-y-1"
                                        enter-to-class="opacity-100 translate-y-0"
                                        leave-active-class="transition ease-in duration-150"
                                        leave-from-class="opacity-100 translate-y-0"
                                        leave-to-class="opacity-0 -translate-y-1"
                                    >
                                        <PopoverPanel
                                            class="hidden md:block absolute z-10 top-full inset-x-0 transform shadow-lg secondary-bg"
                                        >
                                            <div
                                                class="relative max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-1"
                                            >
                                                <nav
                                                    class="grid gap-y-10 px-4 py-8 sm:grid-cols-7 sm:gap-x-8 sm:py-12 sm:px-6 lg:px-8 xl:pr-12"
                                                >
                                                    <div>
                                                        <h3
                                                            class="text-sm font-medium tracking-wide yellow-text uppercase"
                                                            v-text="
                                                                main_data
                                                                    .text_first_item_menu
                                                                    .default
                                                            "
                                                        ></h3>
                                                        <ul
                                                            role="list"
                                                            class="mt-4 space-y-6 mt-lg-5"
                                                        >
                                                            <li
                                                                v-for="item in main_data
                                                                    .menu_1
                                                                    .default
                                                                    .items"
                                                                :key="item.id"
                                                                class="flow-root"
                                                            >
                                                                <a
                                                                    :href="
                                                                        item.path
                                                                    "
                                                                    class="ms-3 mt-2 flex items-center"
                                                                >
                                                                    <span
                                                                        class="ml-4 text-white"
                                                                        >{{
                                                                            item.name
                                                                        }}</span
                                                                    >
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div>
                                                        <h3
                                                            class="text-sm font-medium tracking-wide yellow-text uppercase"
                                                            v-text="
                                                                main_data
                                                                    .text_2_menu
                                                                    .default
                                                            "
                                                        ></h3>
                                                        <ul
                                                            role="list"
                                                            class="mt-4 space-y-6 mt-lg-5"
                                                        >
                                                            <li
                                                                v-for="item in main_data
                                                                    .menu_2
                                                                    .default
                                                                    .items"
                                                                :key="item.id"
                                                                class="flow-root"
                                                            >
                                                                <a
                                                                    :href="
                                                                        item.path
                                                                    "
                                                                    class="ms-3 mt-2 flex items-center"
                                                                >
                                                                    <span
                                                                        class="ml-4 texy-white"
                                                                        >{{
                                                                            item.name
                                                                        }}</span
                                                                    >
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div>
                                                        <a
                                                            class="text-sm font-medium tracking-wide yellow-text uppercase"
                                                            :href="
                                                                main_data.link_3
                                                                    .default
                                                            "
                                                            v-text="
                                                                main_data
                                                                    .text_3_menu
                                                                    .default
                                                            "
                                                        ></a>
                                                    </div>
                                                    <div>
                                                        <a
                                                            class="text-sm font-medium tracking-wide yellow-text uppercase"
                                                            :href="
                                                                main_data.link_4
                                                                    .default
                                                            "
                                                            v-text="
                                                                main_data
                                                                    .text_4_menu
                                                                    .default
                                                            "
                                                        ></a>
                                                    </div>
                                                    <div>
                                                        <a
                                                            class="text-sm font-medium tracking-wide yellow-text uppercase"
                                                            :href="
                                                                main_data.link_5
                                                                    .default
                                                            "
                                                            v-text="
                                                                main_data
                                                                    .text_5_menu
                                                                    .default
                                                            "
                                                        ></a>
                                                    </div>
                                                    <div>
                                                        <a
                                                            class="text-sm font-medium tracking-wide yellow-text uppercase"
                                                            :href="
                                                                main_data.link_6
                                                                    .default
                                                            "
                                                            v-text="
                                                                main_data
                                                                    .text_6_menu
                                                                    .default
                                                            "
                                                        ></a>
                                                    </div>
                                                    <div>
                                                        <h3
                                                            class="text-sm font-medium tracking-wide yellow-text uppercase"
                                                            v-text="
                                                                main_data
                                                                    .text_7_menu
                                                                    .default
                                                            "
                                                        ></h3>
                                                        <ul
                                                            role="list"
                                                            class="mt-4 space-y-6 mt-lg-5"
                                                        >
                                                            <ul
                                                                role="list"
                                                                class="mt-4 space-y-6 mt-lg-5"
                                                            >
                                                                <li
                                                                    v-for="item in main_data
                                                                        .menu_3
                                                                        .default
                                                                        .items"
                                                                    :key="
                                                                        item.id
                                                                    "
                                                                    class="flow-root"
                                                                >
                                                                    <a
                                                                        :href="
                                                                            item.path
                                                                        "
                                                                        class="ms-3 mt-2 flex items-center"
                                                                    >
                                                                        <span
                                                                            class="ml-4 text-white"
                                                                            >{{
                                                                                item.name
                                                                            }}</span
                                                                        >
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
                                <a
                                    :href="main_data.link_3.default"
                                    class="nav-item me-4"
                                    v-text="main_data.text_3_menu.default"
                                >
                                </a>
                                <a
                                    :href="main_data.link_4.default"
                                    class="nav-item"
                                    v-text="main_data.text_4_menu.default"
                                ></a>
                            </PopoverGroup>
                        </div>
                    </div>
                    <div class="col-lg-1 col-3 col-sm-3 logo-box">
                        <a class="d-flex justify-content-lg-center" href="/">
                            <img
                                class="py-2"
                                :src="logo"
                                :alt="logo"
                                style="width: 100px"
                            />
                        </a>
                    </div>
                    <div class="col-lg col col-sm">
                        <div class="alignBox">
                            <PopoverGroup
                                as="nav"
                                class="navigation right d-flex align-items-center"
                            >
                                <a
                                    :href="main_data.link_5.default"
                                    class="nav-item ms-4 d-lg-block d-sm-none d-none"
                                    v-text="main_data.text_5_menu.default"
                                >
                                </a>
                                <a
                                    :href="main_data.link_6.default"
                                    class="nav-item ms-4 d-lg-block d-sm-none d-none"
                                    v-text="main_data.text_6_menu.default"
                                ></a>
                                <Popover
                                    class="d-lg-block d-sm-none d-none"
                                    v-slot="{ open }"
                                >
                                    <PopoverButton
                                        class="nav-item ms-4 d-inline-flex align-items-center"
                                    >
                                        <span
                                            v-text="
                                                main_data.text_7_menu.default
                                            "
                                        ></span>
                                    </PopoverButton>

                                    <transition
                                        enter-active-class="transition ease-out duration-200"
                                        enter-from-class="opacity-0 -translate-y-1"
                                        enter-to-class="opacity-100 translate-y-0"
                                        leave-active-class="transition ease-in duration-150"
                                        leave-from-class="opacity-100 translate-y-0"
                                        leave-to-class="opacity-0 -translate-y-1"
                                    >
                                        <PopoverPanel
                                            class="hidden md:block absolute z-10 top-full inset-x-0 transform shadow-lg secondary-bg"
                                        >
                                            <div
                                                class="relative max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-1"
                                            >
                                                <nav
                                                    class="grid gap-y-10 px-4 py-8 sm:grid-cols-7 sm:gap-x-8 sm:py-12 sm:px-6 lg:px-8 xl:pr-12"
                                                >
                                                    <div>
                                                        <h3
                                                            class="text-sm font-medium tracking-wide yellow-text uppercase"
                                                            v-text="
                                                                main_data
                                                                    .text_first_item_menu
                                                                    .default
                                                            "
                                                        ></h3>
                                                        <ul
                                                            role="list"
                                                            class="mt-4 space-y-6 mt-lg-5"
                                                        >
                                                            <li
                                                                v-for="item in main_data
                                                                    .menu_1
                                                                    .default
                                                                    .items"
                                                                :key="item.id"
                                                                class="flow-root"
                                                            >
                                                                <a
                                                                    :href="
                                                                        item.path
                                                                    "
                                                                    class="ms-3 mt-2 flex items-center"
                                                                >
                                                                    <span
                                                                        class="ml-4 text-white"
                                                                        >{{
                                                                            item.name
                                                                        }}</span
                                                                    >
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div>
                                                        <h3
                                                            class="text-sm font-medium tracking-wide yellow-text uppercase"
                                                            v-text="
                                                                main_data
                                                                    .text_2_menu
                                                                    .default
                                                            "
                                                        ></h3>
                                                        <ul
                                                            role="list"
                                                            class="mt-4 space-y-6 mt-lg-5"
                                                        >
                                                            <li
                                                                v-for="item in main_data
                                                                    .menu_2
                                                                    .default
                                                                    .items"
                                                                :key="item.id"
                                                                class="flow-root"
                                                            >
                                                                <a
                                                                    :href="
                                                                        item.path
                                                                    "
                                                                    class="ms-3 mt-2 flex items-center"
                                                                >
                                                                    <span
                                                                        class="ml-4 texy-white"
                                                                        >{{
                                                                            item.name
                                                                        }}</span
                                                                    >
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div>
                                                        <a
                                                            class="text-sm font-medium tracking-wide yellow-text uppercase"
                                                            :href="
                                                                main_data.link_3
                                                                    .default
                                                            "
                                                            v-text="
                                                                main_data
                                                                    .text_3_menu
                                                                    .default
                                                            "
                                                        ></a>
                                                    </div>
                                                    <div>
                                                        <a
                                                            class="text-sm font-medium tracking-wide yellow-text uppercase"
                                                            :href="
                                                                main_data.link_4
                                                                    .default
                                                            "
                                                            v-text="
                                                                main_data
                                                                    .text_4_menu
                                                                    .default
                                                            "
                                                        ></a>
                                                    </div>
                                                    <div>
                                                        <a
                                                            class="text-sm font-medium tracking-wide yellow-text uppercase"
                                                            :href="
                                                                main_data.link_5
                                                                    .default
                                                            "
                                                            v-text="
                                                                main_data
                                                                    .text_5_menu
                                                                    .default
                                                            "
                                                        ></a>
                                                    </div>
                                                    <div>
                                                        <a
                                                            class="text-sm font-medium tracking-wide yellow-text uppercase"
                                                            :href="
                                                                main_data.link_6
                                                                    .default
                                                            "
                                                            v-text="
                                                                main_data
                                                                    .text_6_menu
                                                                    .default
                                                            "
                                                        ></a>
                                                    </div>
                                                    <div>
                                                        <h3
                                                            class="text-sm font-medium tracking-wide yellow-text uppercase"
                                                            v-text="
                                                                main_data
                                                                    .text_7_menu
                                                                    .default
                                                            "
                                                        ></h3>
                                                        <ul
                                                            role="list"
                                                            class="mt-4 space-y-6 mt-lg-5"
                                                        >
                                                            <ul
                                                                role="list"
                                                                class="mt-4 space-y-6 mt-lg-5"
                                                            >
                                                                <li
                                                                    v-for="item in main_data
                                                                        .menu_3
                                                                        .default
                                                                        .items"
                                                                    :key="
                                                                        item.id
                                                                    "
                                                                    class="flow-root"
                                                                >
                                                                    <a
                                                                        :href="
                                                                            item.path
                                                                        "
                                                                        class="ms-3 mt-2 flex items-center"
                                                                    >
                                                                        <span
                                                                            class="ml-4 text-white"
                                                                            >{{
                                                                                item.name
                                                                            }}</span
                                                                        >
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

                                <div class="nav-item d-flex ms-4">
                                    <a @click="isOpen = !isOpen"
                                        ><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="16.041"
                                            height="16.031"
                                            viewBox="0 0 16.041 16.031"
                                        >
                                            <g
                                                id="search"
                                                transform="translate(-5.993 -2.299)"
                                            >
                                                <path
                                                    id="Path_49"
                                                    data-name="Path 49"
                                                    d="M18.146,13.245a6.794,6.794,0,1,0-1.2,1.2l.037.038,3.6,3.6a.849.849,0,1,0,1.2-1.2l-3.6-3.6-.038-.036ZM16.385,5.481a5.091,5.091,0,1,1-7.2,0,5.09,5.09,0,0,1,7.2,0Z"
                                                    transform="translate(0 0)"
                                                    fill="#fff"
                                                    fill-rule="evenodd"
                                                />
                                            </g>
                                        </svg>
                                    </a>
                                    <Dialog
                                        class="bg-transparent"
                                        :open="isOpen"
                                        @close="setIsOpen"
                                    >
                                        <div
                                            class="fixed z-10 inset-0 overflow-y-auto"
                                        >
                                            <div
                                                class="flex items-end sm:items-center justify-center min-h-full p-4 text-center sm:p-0"
                                            >
                                                <div
                                                    class="position-absolute start-0 top-0 w-100 h-100"
                                                    style="
                                                        z-index: 0;
                                                        background-color: #00000052;
                                                    "
                                                    @click="isOpen = false"
                                                ></div>
                                                <div
                                                    class="relative bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-lg sm:w-full"
                                                >
                                                    <div
                                                        class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4"
                                                    >
                                                        <div
                                                            class="sm:flex sm:items-start"
                                                        >
                                                            <input
                                                                type="text"
                                                                name="search"
                                                                class="form-control w-75 mx-auto"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse"
                                                    >
                                                        <button
                                                            type="button"
                                                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                                                        >
                                                            Search
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </Dialog>
                                </div>

                                <div class="nav-item ms-4 ms-sm-3">
                                    <ul>
                                        <li
                                            v-for="(locale, key) in this
                                                .locales"
                                            :key="key"
                                        >
                                            <a
                                                :href="'/' + key"
                                                v-text="key"
                                            ></a>
                                        </li>
                                    </ul>
                                </div>

                                <Popover
                                    class="d-sm-flex d-lg-none"
                                    v-slot="{ open }"
                                >
                                    <PopoverButton
                                        class="nav-item ms-2 d-inline-flex align-items-center"
                                    >
                                        <span
                                            class="material-icons-outlined text-4xl ms-sm-2"
                                        >
                                            menu_open
                                        </span>
                                    </PopoverButton>

                                    <transition
                                        enter-active-class="transition ease-out duration-200"
                                        enter-from-class="opacity-0 -translate-y-1"
                                        enter-to-class="opacity-100 translate-y-0"
                                        leave-active-class="transition ease-in duration-150"
                                        leave-from-class="opacity-100 translate-y-0"
                                        leave-to-class="opacity-0 -translate-y-1"
                                    >
                                        <PopoverPanel
                                            class="md:block fixed top-0 left-0 w-100 h-100 overflow-y-auto z-10 top-full inset-x-0 transform shadow-lg secondary-bg"
                                        >
                                            <div
                                                class="relative max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-1"
                                            >
                                                <nav
                                                    class="row p-5 pt-0 p-lg-0"
                                                >
                                                    <div
                                                        class="col-lg p-sm-5 mt-4"
                                                    >
                                                        <div
                                                            class="d-flex justify-content-end"
                                                        >
                                                            <PopoverButton
                                                                class="nav-item ms-2 d-inline-flex align-items-center"
                                                            >
                                                                <span
                                                                    class="material-icons-outlined text-4xl ms-sm-2"
                                                                >
                                                                    close
                                                                </span>
                                                            </PopoverButton>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-lg p-sm-5 mt-4"
                                                    >
                                                        <h3
                                                            class="text-sm font-medium tracking-wide yellow-text uppercase"
                                                            v-text="
                                                                main_data
                                                                    .text_first_item_menu
                                                                    .default
                                                            "
                                                        ></h3>
                                                        <ul
                                                            role="list"
                                                            class="mt-4 space-y-6 mt-lg-5"
                                                        >
                                                            <li
                                                                v-for="item in main_data
                                                                    .menu_1
                                                                    .default
                                                                    .items"
                                                                :key="item.id"
                                                                class="flow-root"
                                                            >
                                                                <a
                                                                    :href="
                                                                        item.path
                                                                    "
                                                                    class="ms-3 mt-2 flex items-center"
                                                                >
                                                                    <span
                                                                        class="ml-4 text-white"
                                                                        >{{
                                                                            item.name
                                                                        }}</span
                                                                    >
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div
                                                        class="col-lg p-sm-5 mt-4"
                                                    >
                                                        <h3
                                                            class="text-sm font-medium tracking-wide yellow-text uppercase"
                                                            v-text="
                                                                main_data
                                                                    .text_2_menu
                                                                    .default
                                                            "
                                                        ></h3>
                                                        <ul
                                                            role="list"
                                                            class="mt-4 space-y-6 mt-lg-5"
                                                        >
                                                            <li
                                                                v-for="item in main_data
                                                                    .menu_2
                                                                    .default
                                                                    .items"
                                                                :key="item.id"
                                                                class="flow-root"
                                                            >
                                                                <a
                                                                    :href="
                                                                        item.path
                                                                    "
                                                                    class="ms-3 mt-2 flex items-center"
                                                                >
                                                                    <span
                                                                        class="ml-4 texy-white"
                                                                        >{{
                                                                            item.name
                                                                        }}</span
                                                                    >
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div
                                                        class="col-lg p-sm-5 mt-4"
                                                    >
                                                        <a
                                                            class="text-sm font-medium tracking-wide yellow-text uppercase"
                                                            :href="
                                                                main_data.link_3
                                                                    .default
                                                            "
                                                            v-text="
                                                                main_data
                                                                    .text_3_menu
                                                                    .default
                                                            "
                                                        ></a>
                                                    </div>
                                                    <div
                                                        class="col-lg p-sm-5 mt-4"
                                                    >
                                                        <a
                                                            class="text-sm font-medium tracking-wide yellow-text uppercase"
                                                            :href="
                                                                main_data.link_4
                                                                    .default
                                                            "
                                                            v-text="
                                                                main_data
                                                                    .text_4_menu
                                                                    .default
                                                            "
                                                        ></a>
                                                    </div>
                                                    <div
                                                        class="col-lg p-sm-5 mt-4"
                                                    >
                                                        <a
                                                            class="text-sm font-medium tracking-wide yellow-text uppercase"
                                                            :href="
                                                                main_data.link_5
                                                                    .default
                                                            "
                                                            v-text="
                                                                main_data
                                                                    .text_5_menu
                                                                    .default
                                                            "
                                                        ></a>
                                                    </div>
                                                    <div
                                                        class="col-lg p-sm-5 mt-4"
                                                    >
                                                        <a
                                                            class="text-sm font-medium tracking-wide yellow-text uppercase"
                                                            :href="
                                                                main_data.link_6
                                                                    .default
                                                            "
                                                            v-text="
                                                                main_data
                                                                    .text_6_menu
                                                                    .default
                                                            "
                                                        ></a>
                                                    </div>
                                                    <div
                                                        class="col-lg p-sm-5 mt-4"
                                                    >
                                                        <h3
                                                            class="text-sm font-medium tracking-wide yellow-text uppercase"
                                                            v-text="
                                                                main_data
                                                                    .text_7_menu
                                                                    .default
                                                            "
                                                        ></h3>
                                                        <ul
                                                            role="list"
                                                            class="mt-4 space-y-6 mt-lg-5"
                                                        >
                                                            <ul
                                                                role="list"
                                                                class="mt-4 space-y-6 mt-lg-5"
                                                            >
                                                                <li
                                                                    v-for="item in main_data
                                                                        .menu_3
                                                                        .default
                                                                        .items"
                                                                    :key="
                                                                        item.id
                                                                    "
                                                                    class="flow-root"
                                                                >
                                                                    <a
                                                                        :href="
                                                                            item.path
                                                                        "
                                                                        class="ms-3 mt-2 flex items-center"
                                                                    >
                                                                        <span
                                                                            class="ml-4 text-white"
                                                                            >{{
                                                                                item.name
                                                                            }}</span
                                                                        >
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
                    </div>
                </div>
            </div>
        </header>
        <!-- <Popover class="relative bg-white">
            <div
                class="absolute inset-0 shadow z-30 pointer-events-none"
                aria-hidden="true"
            />
            <div class="relative z-20">
                <div
                    class="max-w-7xl mx-auto flex justify-between items-center px-4 py-5 sm:px-6 sm:py-4 lg:px-8 md:justify-start md:space-x-10"
                >
                    <div>
                        <a href="#" class="flex">
                            <span class="sr-only"></span>
                            <img
                                class="h-8 w-auto sm:h-10"
                                :src="logo"
                                alt=""
                            />
                        </a>
                    </div>
                    <div class="-mr-2 -my-2 md:hidden">
                        <PopoverButton
                            class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                        >
                            <span class="sr-only" v-text="openMenu"></span>
                            <MenuIcon class="h-6 w-6" aria-hidden="true" />
                        </PopoverButton>
                    </div>
                    <div
                        class="hidden md:flex-1 md:flex md:items-center md:justify-between"
                    ></div>
                </div>
            </div>

            <transition
                enter-active-class="duration-200 ease-out"
                enter-from-class="opacity-0 scale-95"
                enter-to-class="opacity-100 scale-100"
                leave-active-class="duration-100 ease-in"
                leave-from-class="opacity-100 scale-100"
                leave-to-class="opacity-0 scale-95"
            >
                <PopoverPanel
                    class="hidden md:block absolute z-10 top-full inset-x-0 transform shadow-lg secondary-bg"
                >
                    <div
                        class="relative max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-1"
                    >
                        <nav
                            class="grid gap-y-10 px-4 py-8 sm:grid-cols-7 sm:gap-x-8 sm:py-12 sm:px-6 lg:px-8 xl:pr-12"
                        >
                            <div>
                                <h3
                                    class="text-sm font-medium tracking-wide yellow-text uppercase"
                                    v-text="
                                        main_data.text_first_item_menu.default
                                    "
                                ></h3>
                                <ul role="list" class="mt-4 space-y-6 mt-lg-5">
                                    <li
                                        v-for="item in main_data.menu_1.default
                                            .items"
                                        :key="item.id"
                                        class="flow-root"
                                    >
                                        <a
                                            :href="item.path"
                                            class="ms-3 mt-2 flex items-center"
                                        >
                                            <span class="ml-4 text-white">{{
                                                item.name
                                            }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <h3
                                    class="text-sm font-medium tracking-wide yellow-text uppercase"
                                    v-text="main_data.text_2_menu.default"
                                ></h3>
                                <ul role="list" class="mt-4 space-y-6 mt-lg-5">
                                    <li
                                        v-for="item in main_data.menu_2.default
                                            .items"
                                        :key="item.id"
                                        class="flow-root"
                                    >
                                        <a
                                            :href="item.path"
                                            class="ms-3 mt-2 flex items-center"
                                        >
                                            <span class="ml-4 texy-white">{{
                                                item.name
                                            }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <a
                                    class="text-sm font-medium tracking-wide yellow-text uppercase"
                                    v-text="main_data.text_3_menu.default"
                                ></a>
                            </div>
                            <div>
                                <h3
                                    class="text-sm font-medium tracking-wide yellow-text uppercase"
                                    v-text="main_data.text_4_menu.default"
                                ></h3>
                            </div>
                            <div>
                                <h3
                                    class="text-sm font-medium tracking-wide yellow-text uppercase"
                                    v-text="main_data.text_5_menu.default"
                                ></h3>
                            </div>
                            <div>
                                <h3
                                    class="text-sm font-medium tracking-wide yellow-text uppercase"
                                    v-text="main_data.text_6_menu.default"
                                ></h3>
                            </div>
                            <div>
                                <h3
                                    class="text-sm font-medium tracking-wide yellow-text uppercase"
                                    v-text="main_data.text_7_menu.default"
                                ></h3>
                                <ul role="list" class="mt-4 space-y-6 mt-lg-5">
                                    <ul role="list" class="mt-4 space-y-6 mt-lg-5">
                                        <li
                                            v-for="item in main_data.menu_3
                                                .default.items"
                                            :key="item.id"
                                            class="flow-root"
                                        >
                                            <a
                                                :href="item.path"
                                                class="ms-3 mt-2 flex items-center"
                                            >
                                                <span class="ml-4 text-white">{{
                                                    item.name
                                                }}</span>
                                            </a>
                                        </li>
                                    </ul>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </PopoverPanel>
            </transition>
        </Popover> -->
    </div>
</template>

<script>
import {
    Popover,
    PopoverButton,
    PopoverGroup,
    PopoverPanel,
    Dialog,
    DialogPanel,
    DialogTitle,
    DialogDescription,
} from "@headlessui/vue";
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
} from "@heroicons/vue/outline";
import { ChevronDownIcon } from "@heroicons/vue/solid";
import { onMounted, toRefs, computed } from "vue";

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
    data() {
        return {
            isOpen: false,
        };
    },
    // mounted() {
    //     window.onresize = () => {
    //         if (typeof window !== "undefined") {
    //             if (window.innerWidth >= 576) {
    //                 let zoom_percent = (window.innerWidth / 1600) * 100;
    //                 document.body.style.zoom = zoom_percent + "%";
    //             } else if (window.innerWidth < 576) {
    //                 let zoom_percent = (window.innerWidth / 375) * 100;
    //                 document.body.style.zoom = zoom_percent + "%";
    //             }
    //         }
    //     };
    //     if (typeof window !== "undefined") {
    //         if (window.innerWidth >= 576) {
    //             let zoom_percent = (window.innerWidth / 1600) * 100;
    //             document.body.style.zoom = zoom_percent + "%";
    //         } else if (window.innerWidth < 576) {
    //             let zoom_percent = (window.innerWidth / 375) * 100;
    //             document.body.style.zoom = zoom_percent + "%";
    //         }
    //     }
    // },
    setup(props) {
        const logo = computed(() => {
            return props.component_data.image_logo.default[0].path;
        });
        const open_menu = computed((props) => {
            return props.component_data.open_menu.default;
        });

        const main_data = computed(() => {
            return props.component_data;
        });
        const locales = computed(() => {
            return props.locales;
        });

        return {
            logo,
            locales,
            main_data,
        };
    },
};
</script>
