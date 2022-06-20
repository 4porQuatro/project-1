<!-- This example requires Tailwind CSS v2.0+ -->
<template>
    <div class="main home-page faq">
        <section
            class="dropdownImg"
            style="margin: 0px 220px; padding-top: 100px"
        >
        <p class="page-heading" v-text="title"></p>
            <div class="row justify-content-center">
                <div class="col mb-lg-16 mb-lg-5 pb-lg-5 pe-lg-0">
                    <div class="accordion" id="accordionExample">
                        <div
                            class="accordion-item bg-transparent text-black"
                            v-for="(faq, faqIndex) in faqs"
                            :key="faq.id"
                        >
                            <h2
                                class="accordion-header bg-transparent"
                                :id="'heading' + faq.id"
                            >
                                <div
                                    class="accordion-button text-uppercase bg-transparent text-black hover:shadow-0"
                                    :class="faqIndex != 0 ? 'collapsed' : ''"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    :data-bs-target="'#collapse' + faq.id"
                                    aria-expanded="true"
                                    aria-controls="collapseOne"
                                >
                                    {{ faq.title }}
                                </div>
                            </h2>
                            <div
                                :id="'collapse' + faq.id"
                                class="accordion-collapse collapse"
                                :class="faqIndex == 0 ? 'show' : ''"
                                aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample"
                            >
                                <div class="accordion-body">
                                    <p v-html="faq.small_body"></p>
                                    <div>
                                        <a :href="faq.link">
                                        <span
                                            v-if="faq.link_text"
                                            class="saber-btn"
                                            style="color: #fff"
                                        >
                                            <span v-html="faq.link_text"></span>
                                        </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import { Disclosure, DisclosureButton, DisclosurePanel } from '@headlessui/vue'
import { ChevronDownIcon } from '@heroicons/vue/outline'
import {computed} from "vue";



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
        const title = computed(()=>{
            return props.data_content.title.default;
        })

        return {
            faqs,
            title,
        }
    },
}
</script>
