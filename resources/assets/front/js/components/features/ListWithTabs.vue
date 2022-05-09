<template>
    <div class="relative pb-5 border-b border-gray-200 sm:pb-0">
        <div class="md:flex md:items-center md:justify-between">
            <h3 class="text-lg leading-6 font-medium text-gray-900" v-text="this.title"></h3>

        </div>
        <div class="mt-4">
            <div class="sm:hidden">
                <div id="current-tab" name="current-tab" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    <div v-for="tab in tabs" :key="tab.name" v-on:click="changeTab(tab)"  :selected="tab.current">{{ tab.name }}</div>
                </div>
            </div>
            <div class="hidden sm:block">
                <nav class="-mb-px flex space-x-8">
                    <a  v-on:click="changeTab(tab)" v-for="tab in tabs" :key="tab.name" :class="[tab.current ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300', 'whitespace-nowrap pb-4 px-1 border-b-2 font-medium text-sm']" :aria-current="tab.current ? 'page' : undefined">
                        {{ tab.name }}
                    </a>
                </nav>
            </div>
        </div>
        <div class="mt-4">
            <ul>
                <li v-for="item in this.list">
                    <a v-if="asDocs(item)" :href="item.docs[0]['path']" target="_blank"> {{item.title}}</a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>


export default {
    props:{
       articles: Object,
        categories:Object,
        title: String
    },
    data() {
        return {
            tabs: {},
            lists:{},
        }
    },

    mounted()
    {
        this.tabs = _.map(this.categories, function(item){
           let tab = item;
           tab.current = false;
           return tab;
        });
        this.tabs[0].current = true;
        this.list = this.articles[this.tabs[0].slug];

    },

    methods:
    {
        changeTab(tab)
        {
            this.tabs = _.map(this.tabs, function(item){
                item.current = tab.id == item.id;
                return item;
            }.bind(tab));
            this.list = this.articles[tab.slug];
        },

        asDocs(item)
        {
            return ! _.isEmpty(item.docs);
        }

    }
}
</script>
