<script setup>
import { useI18n } from "vue-i18n";
import CardBox from "@/components/CardBox.vue";
import "vue3-carousel/dist/carousel.css";
import { ref, onMounted } from "vue";
import { storeToRefs } from "pinia";
import { useAboutStore } from "@/store/about";
import { useHomeStore } from "@/store/home";
const aboutStore = useAboutStore();
const { homeAbout } = storeToRefs(useAboutStore());
const homeStore = useHomeStore();
const { home } = storeToRefs(useHomeStore());
onMounted(() => {
    homeStore.fetch();
    aboutStore.fetchHome();
});

const { t, locale } = useI18n();
</script>
<template>
    <div class="max-w-[1440px] mx-auto">
        <div class="pt-32 px-16">
            <div class="relative">
                <p
                    class="absolute ltr:left-8 rtl:right-8 top-[3px] text-2xl font-bold text-[#45315D] z-10"
                >
                    {{ t("about.title") }}
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
            <router-link to="/about">
                <p
                    class="text-[#45315D] font-semibold text-base text-end underline"
                >
                    {{ t("home.ourServices.viewAll") }}
                </p>
            </router-link>
        </div>
        <div class="pt-12" >
            <div class="relative">
                <img
                    class="absolute left-0 ltr:hidden"
                    src="/images/home/screw-arrow-r.svg"
                />
                <img
                    class="absolute right-0 rtl:hidden"
                    src="/images/home/screw-arrow-l.svg"
                />

                <div
                    v-if="home && home.length > 0"
                    class="text-[#403D3D] font-normal text-[20px] text-start pl-16 rtl:pl-44 pr-44 rtl:pr-16"
                >
                    <!-- Using v-html directive to render HTML content safely -->
                    <div v-html="home[0].data[locale].about"></div>
                </div>
                <!-- <p
                    class="text-[#403D3D] font-normal text-[20px] text-start pl-16 rtl:pl-44 pr-44 rtl:pr-16"
                >
                    {{ t("about.content") }}
                </p> -->
            </div>
            <div class="pt-16 pl-16 rtl:pl-32 pr-32 rtl:pr-16 pb-[70px]">
                <div class="grid grid-cols-3 gap-11" v-if="homeAbout">
                    <div v-if="homeAbout[0]">
                        <card-box
                            :title="homeAbout[0].title[locale]"
                            :content="homeAbout[0].data[locale].content"
                            :src="'/storage/' + homeAbout[0].seo.image"
                        />
                    </div>
                    <div v-if="homeAbout[1]">
                        <card-box
                            :title="homeAbout[1].title[locale]"
                            :content="homeAbout[1].data[locale].content"
                            :src="'/storage/' + homeAbout[1].seo.image"
                        />
                    </div>
                    <div v-if="homeAbout[2]">
                        <card-box
                            :title="homeAbout[2].title[locale]"
                            :content="homeAbout[2].data[locale].content"
                            :src="'/storage/' + homeAbout[2].seo.image"
                        />
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-6 pt-6" v-if="homeAbout">
                    <div v-if="homeAbout[3]">
                        <card-box
                            :title="homeAbout[3].title[locale]"
                            :content="homeAbout[3].data[locale].content"
                            :src="'/storage/' + homeAbout[3].seo.image"
                        />
                    </div>
                    <div v-if="homeAbout[4]">
                        <card-box
                            :title="homeAbout[4].title[locale]"
                            :content="homeAbout[4].data[locale].content"
                            :src="'/storage/' + homeAbout[4].seo.image"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<style></style>
