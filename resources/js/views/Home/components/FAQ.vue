<script setup>
import { ref, onMounted, onUnmounted } from "vue";
import { useI18n } from "vue-i18n";
import { initFlowbite } from "flowbite";
import "vue3-carousel/dist/carousel.css";
import { storeToRefs } from "pinia";
import { useFaqStore } from "@/store/faq";
const itemsToShow = ref(2); // Default value

const faqStore = useFaqStore();
const { faq } = storeToRefs(useFaqStore());
onMounted(() => {
    faqStore.fetch();
});

function updateItemsToShow() {
    const width = window.innerWidth;
    if (width >= 1280) {
        itemsToShow.value = 2.5;
    } else {
        itemsToShow.value = 2.2;
    }
}

const activeIndex = ref(null); // Track the active accordion item

const toggleAccordion = (index) => {
    // Toggle the accordion item
    activeIndex.value = activeIndex.value === index ? null : index;
};

const isActiveIndex = (index) => {
    // Check if the accordion item is active
    return activeIndex.value === index;
};

onMounted(() => {
    updateItemsToShow();
    initFlowbite();
    window.addEventListener("resize", updateItemsToShow);
});

onUnmounted(() => {
    window.removeEventListener("resize", updateItemsToShow);
});

const { t, locale } = useI18n();
</script>
<template>
    <div class="max-w-[1440px] mx-auto px-16">
        <div class="pt-36">
            <div class="relative">
                <p
                    class="absolute ltr:left-8 rtl:right-8 top-[3px] text-2xl font-bold text-[#45315D] z-10"
                >
                    {{ t("faq.title") }}
                </p>

                <div
                    :class="[
                        ' absolute top-0 w-20 h-10 z-0',
                        locale === 'en'
                            ? 'react-circle-l rounded-tl-full rounded-bl-full left-0 '
                            : 'react-circle-r rounded-tr-full rounded-br-full right-0 ',
                    ]"
                ></div>
            </div>
            <router-link to="/faq">
                <p
                    class="text-[#45315D] font-semibold text-base text-end underline"
                >
                    {{ t("home.ourServices.viewAll") }}
                </p>
            </router-link>
        </div>
        <div class="pt-8">
            <div id="accordion-collapse" data-accordion="collapse">
                <div
                    v-for="(item, index) in faq"
                    :key="index"
                    class="bg-[#FCFCFC] border-[1px] border-[#EEEEEE] my-4 rounded-md"
                >
                    <div v-if="item.title[locale]">
                        <h2 :id="'accordion-collapse-heading-' + index">
                            <button
                                type="button"
                                class="flex items-center justify-between w-full pl-5 rtl:pl-8 py-5 rtl:pr-5 pr-8 font-semibold text-[20px] rtl:text-right focus:text-white text-[#45315D] hover:text-white focus:bg-[#45315D] rounded-md hover:bg-[#45315D] gap-3"
                                :data-accordion-target="
                                    '#accordion-collapse-body-' + index
                                "
                                aria-expanded="false"
                                :aria-controls="
                                    'accordion-collapse-body-' + index
                                "
                                @click="toggleAccordion(index)"
                            >
                                <span>{{ item.title[locale] }}</span>
                                <svg
                                    :class="{
                                        'rotate-180': isActiveIndex(index),
                                    }"
                                    class="w-3 h-3 shrink-0"
                                    aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 10 6"
                                >
                                    <!-- <path
                                        stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 5 5 1 1 5"
                                    /> -->
                                    <path
                                        stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M1 1l4 4 4-4"
                                    />
                                </svg>
                            </button>
                        </h2>
                        <div
                            :id="'accordion-collapse-body-' + index"
                            :class="{ hidden: !isActiveIndex(index) }"
                            :aria-labelledby="
                                'accordion-collapse-heading-' + index
                            "
                        >
                            <div class="p-5">
                                <p
                                    v-html="item.data[locale].content"
                                    class="mb-2 text-[#13414D] text-[18px] font-normal text-start"
                                ></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div
                    v-for="(faq, index) in faq"
                    :key="index"
                    class="bg-[#FCFCFC] border-[1px] border-[#EEEEEE] my-4 rounded-md"
                >
                    <div v-if="faq.title[locale]">
                        <h2 :id="'accordion-collapse-heading-' + index">
                            <button
                                type="button"
                                class="flex items-center justify-between w-full pl-5 rtl:pl-8 py-5 rtl:pr-5 pr-8 font-semibold text-[20px] rtl:text-right focus:text-white text-[#45315D] hover:text-white focus:bg-[#45315D] rounded-md hover:bg-[#45315D] gap-3"
                                :data-accordion-target="
                                    '#accordion-collapse-body-' + index
                                "
                                aria-expanded="false"
                                :aria-controls="
                                    'accordion-collapse-body-' + index
                                "
                            >
                                <span>{{ faq.title[locale] }}</span>
                                <span>{{ index + 1 }}</span>
                                <svg
                                    data-accordion-icon
                                    class="w-3 h-3 rotate-180 shrink-0"
                                    aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 10 6"
                                >
                                    <path
                                        stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 5 5 1 1 5"
                                    />
                                </svg>
                            </button>
                        </h2>
                        <div
                            :id="'accordion-collapse-body-' + index"
                            class="hidden"
                            :aria-labelledby="
                                'accordion-collapse-heading-' + index
                            "
                        >
                            <div class="p-5">
                                <p
                                    v-html="faq.data[locale].content"
                                    class="mb-2 text-[#13414D] text-[18px] font-normal text-start"
                                />
                            </div>
                        </div>
                    </div>
                </div> -->

                <!-- <div
                    class="bg-[#FCFCFC] border-[1px] border-[#EEEEEE] my-4 rounded-md"
                >
                    <h2 id="accordion-collapse-heading-21">
                        <button
                            type="button"
                            class="flex items-center justify-between w-full pl-5 rtl:pl-8 py-5 rtl:pr-5 pr-8 font-semibold text-[20px] rtl:text-right focus:text-white text-[#45315D] hover:text-white focus:bg-[#45315D] rounded-md hover:bg-[#45315D] gap-3"
                            data-accordion-target="#accordion-collapse-body-2"
                            aria-expanded="false"
                            aria-controls="accordion-collapse-body-2"
                        >
                            <span>{{ t("faq.accordionOne.title") }}111</span>
                            <svg
                                data-accordion-icon
                                class="w-3 h-3 rotate-180 shrink-0"
                                aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 10 6"
                            >
                                <path
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 5 5 1 1 5"
                                />
                            </svg>
                        </button>
                    </h2>
                    <div
                        id="accordion-collapse-body-2"
                        class="hidden"
                        aria-labelledby="accordion-collapse-heading-2"
                    >
                        <div class="p-5">
                            <p
                                class="mb-2 text-[#13414D] text-[18px] font-normal text-start"
                            >
                                {{ t("faq.accordionOne.content") }}
                            </p>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</template>
<style>
.rotate-180 {
    transform: rotate(180deg);
}
.carousel__slide {
    padding: 8px;
}
@media (min-width: 1280px) {
    .carousel__slide {
        padding: 20px;
    }
}

.carousel__prev,
.carousel__next {
    padding: 20px;
    width: 80px;
    height: 80px;
}
</style>
