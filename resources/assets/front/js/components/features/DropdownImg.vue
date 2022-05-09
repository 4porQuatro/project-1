<!-- This example requires Tailwind CSS v2.0+ -->
<template>
    <div class="bg-gray-50">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:py-16 sm:px-6 lg:px-8">
            <div class="max-w-3xl mx-auto divide-y-2 divide-gray-200">
                <dl class="mt-6 space-y-6 divide-y divide-gray-200">
                    <Disclosure as="div" v-for="faq in faqs" :key="faq.id" class="pt-6" v-slot="{ open }">
                        <dt class="text-lg">
                            <DisclosureButton class="text-left w-full flex justify-between items-start text-gray-400">
                            <span class="font-medium text-gray-900">
                              {{ faq.title }}
                            </span>
                                            <span class="ml-6 h-7 flex items-center">
                              <ChevronDownIcon :class="[open ? '-rotate-180' : 'rotate-0', 'h-6 w-6 transform']" aria-hidden="true"/>
                            </span>
                            </DisclosureButton>
                        </dt>
                            <DisclosurePanel as="dd" class="mt-2 pr-12">
                                <div class="text-base text-gray-500" v-html="faq.small_body">

                                </div>
                                <a :href="faq.link" v-text="faq.link_text"></a>
                                <img v-if="asImage(faq)" :src="this.getImagePath(faq)" >

                            </DisclosurePanel>
                    </Disclosure>

                </dl>
            </div>

        </div>
    </div>
</template>

<script>
import {Disclosure, DisclosureButton, DisclosurePanel} from '@headlessui/vue'
import {ChevronDownIcon} from '@heroicons/vue/outline'
import {onMounted, toRefs, computed} from "vue";


export default {
    components: {
        Disclosure,
        DisclosureButton,
        DisclosurePanel,
        ChevronDownIcon,
    },
    props: {
        data_content: Object
    },
    setup(props) {
        const faqs = computed(() => {
            return props.data_content.articles.default
        })
        return {
            faqs,
        }
    },
    methods:
        {
            asImage(faq) {
                return !_.isEmpty(faq.images)
            },
            getImagePath(faq)
            {
              return this.asImage(faq) ? _.first(faq.images).path : '';
            }
        }

}
</script>
