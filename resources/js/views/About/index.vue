<script setup>
import { useI18n } from "vue-i18n";
import { ref, onMounted } from "vue";
import { storeToRefs } from "pinia";
import { useAboutStore } from "@/store/about";
const aboutStore = useAboutStore();
const { about } = storeToRefs(useAboutStore());
onMounted(() => {
    aboutStore.fetch();
});
const { t, locale } = useI18n();
</script>
<template>
    <div class="max-w-[1440px] mx-auto xl:px-24 lg:px-16 px-6">
        <div class="pt-12">
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
        </div>
        <div v-if="about">
            <div class="pt-16 pb-5" v-if="about[0]?.title">
                <div class="flex md:items-center items-start lg:gap-24 md:gap-14 gap-8 md:px-0 xs:px-5 px-0 justify-between md:flex-row flex-col">
                    <img :src="'/storage/' + about[0].seo.image" class="md:hidden flex w-full" />
                    <div class="text-start">
                        <div class="flex text-start gap-11 pb-11 items-center">
                            <img src="/images/about/bar.svg" />
                            <p class="text-xl font-bold text-[#45315D]">
                                {{ about[0].title[locale] }}
                            </p>
                        </div>
                        <p class="pb-7 text-xl font-bold text-[#45315D]">
                            {{ about[0].data[locale].subTitle }}
                        </p>
                        <p
                            v-html="about[0].data[locale].content"
                            class="pb-3 text-xl text-[#403D3D] font-normal"
                        />
                        <!-- <p
                            v-html="about[0].data[locale].content"
                            class="text-xl text-[#403D3D] font-normal"
                        /> -->
                    </div>
                    <img :src="'/storage/' + about[0].seo.image" class="lg:block hidden" />
                    <img :src="'/storage/' + about[0].seo.image" class="lg:hidden md:flex w-full hidden" />
                </div>
            </div>
            <div class="pb-40 pt-5" v-if="about[1]?.title">
                <div class="flex md:items-center items-start lg:gap-24 md:gap-14 gap-8 md:px-0 xs:px-5 px-0 justify-between md:flex-row flex-col">
                    <img :src="'/storage/' + about[1].seo.image" class="lg:block hidden" />
                    <img :src="'/storage/' + about[1].seo.image" class="lg:hidden md:block flex w-full" />
                    <div class="text-start">
                        <div class="flex text-start gap-11 pb-11 items-center">
                            <img src="/images/about/bar.svg" />
                            <p class="text-xl font-bold text-[#45315D]">
                                {{ about[1].title[locale] }}
                            </p>
                        </div>
                        <p class="pb-7 text-xl font-bold text-[#45315D]">
                            {{ about[1].data[locale].subTitle }}
                        </p>
                        <p
                            v-html="about[1].data[locale].content"
                            class="pb-3 text-xl text-[#403D3D] font-normal"
                        />
                        <!-- <p class="text-xl text-[#403D3D] font-normal" v-html="about[1].data[locale].content" /> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<style>
.react-circle-l {
    background-image: linear-gradient(to right, #ff9280, #ff2400);
}
.react-circle-r {
    background-image: linear-gradient(to right, #ff2400, #ff9280);
}
</style>
