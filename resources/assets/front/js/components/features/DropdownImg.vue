<!-- This example requires Tailwind CSS v2.0+ -->
<template>
    <div class="main home-page">
        <section
            class="dropdownImg"
            style="margin: 0px 220px; padding-top: 100px"
        >
            <div class="row">
                <div class="col-lg-6 mb-lg-16 mb-lg-5 pb-lg-5 pe-lg-0">
                    <div class="accordion secondary-bg" id="accordionExample">
                        <div
                            class="accordion-item bg-transparent text-white"
                            v-for="(faq, faqIndex) in faqs"
                            :key="faq.id"
                        >
                            <h2
                                class="accordion-header"
                                :id="'heading' + faq.id"
                            >
                                <button
                                    class="accordion-button bg-transparent text-white"
                                    :class="faqIndex != 0 ? 'collapsed' : ''"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    :data-bs-target="'#collapse' + faq.id"
                                    aria-expanded="true"
                                    aria-controls="collapseOne"
                                >
                                    {{ faq.title }}
                                </button>
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
                                        <img
                                            v-if="asImage(faq)"
                                            :src="this.getImagePath(faq)"
                                        />
                                    </div>
                                    <div>
                                        <a :href="faq.link"></a>
                                        <span
                                            class="saber-btn"
                                            style="color: #fff"
                                        >
                                            <span v-html="faq.link_text"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt-lg-16 pt-lg-5 mt-lg-5 ps-lg-0">
                    <img class="h-100 w-100" src="/storage/files/2.jpg" />
                    <!-- <img
                    width="100%"
                    height="100%"
                    src="./static/accordionImg.png"
                    alt=""
                  /> -->
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import { Disclosure, DisclosureButton, DisclosurePanel } from "@headlessui/vue";
import { ChevronDownIcon } from "@heroicons/vue/outline";
import { onMounted, toRefs, computed } from "vue";

export default {
    components: {
        Disclosure,
        DisclosureButton,
        DisclosurePanel,
        ChevronDownIcon,
    },
    props: {
        data_content: Object,
    },
    setup(props) {
        const faqs = computed(() => {
            return props.data_content.articles.default;
        });
        return {
            faqs,
        };
    },
    methods: {
        asImage(faq) {
            return !_.isEmpty(faq.images);
        },
        getImagePath(faq) {
            return this.asImage(faq) ? _.first(faq.images).path : "";
        },
    },
};
</script>
