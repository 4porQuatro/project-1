<template>
 <div>
    <div>
        <p class="page-heading">
            {{title}}
        </p>
    </div>
    <div
        class="relative document-box border-b border-gray-200 sm:pb-0"
        style="padding: 70px 230px 100px"
    >
        <div class="mt-4">
            <div class="sm:hidden">
                <div
                    id="current-tab"
                    name="current-tab"
                    class="flex w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"
                >
                    <div
                        v-for="tab in tabs"
                        :key="tab.name"
                        v-on:click="changeTab(tab)"
                        :class="[
                            tab.current
                                ? 'border-black text-black'
                                : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300',
                            'whitespace-nowrap px-1 border-b-2 font-medium text-sm',
                        ]"
                        :selected="tab.current"
                    >
                        {{ tab.name }}
                    </div>
                </div>
            </div>
            <div class="hidden sm:block">
                <nav class="-mb-px flex space-x-8 border-bottom">
                    <a
                        v-on:click="changeTab(tab)"
                        v-for="tab in tabs"
                        :key="tab.name"
                        class="text-2xl"
                        :class="[
                            tab.current
                                ? 'border-black text-black'
                                : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300',
                            'whitespace-nowrap px-1 border-b-2 font-medium text-sm',
                        ]"
                        :aria-current="tab.current ? 'page' : undefined"
                    >
                        {{ tab.name }}
                    </a>
                </nav>
            </div>
        </div>
        <div class="mt-4">
            <ul class="px-3">
                <li class="border-bottom py-2 text-capitalize" v-for="(item,index) in this.list" :key="index">
                    <a
                        v-if="asDocs(item)"
                        :href="item.docs[0]['path']"
                        target="_blank"
                        class="d-flex align-items-center justify-content-between"
                    >
                        {{ item.title }} <span class="material-icons-outlined me-2 yellow-text">download</span></a
                    >
                </li>
            </ul>
        </div>
    </div>
    </div>
</template>

<script>
export default {
    props: {
        articles: Object,
        categories: Object,
        title: String,
    },
    data() {
        return {
            tabs: {},
            lists: {},
        };
    },

    mounted() {
        this.tabs = _.map(this.categories.reverse(), function (item) {
            let tab = item;
            tab.current = false;
            return tab;
        });
        this.tabs[0].current = true;
        this.list = this.articles[this.tabs[0].slug];
    },

    methods: {
        changeTab(tab) {
            this.tabs = _.map(
                this.tabs,
                function (item) {
                    item.current = tab.id == item.id;
                    return item;
                }.bind(tab)
            );
            this.list = this.articles[tab.slug];
        },

        asDocs(item) {
            return !_.isEmpty(item.docs);
        },
    },
};
</script>

<style scoped>
nav{
    border-bottom: 2px solid grey;
}
</style>
