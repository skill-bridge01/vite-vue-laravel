<script setup>
import { ref, onMounted, onUnmounted } from "vue";
import { useI18n } from "vue-i18n";
import { storeToRefs } from "pinia";
import { useServiceStore } from "@/store/service";
import "vue3-carousel/dist/carousel.css";
import { Carousel, Navigation, Slide } from "vue3-carousel";

const itemsToShow = ref(1);

const serviceStore = useServiceStore();
const carouselRef = ref(null);
const goToNextSlide = () => {
    if (carouselRef.value) {
        carouselRef.value.next();
    }
};
const goToPrevSlide = () => {
    if (carouselRef.value) {
        carouselRef.value.prev();
    }
};
const { services } = storeToRefs(useServiceStore());
onMounted(() => {
    serviceStore.fetch();
});
const breakpoints = {
    itemsToShow: 1,
    snapAlign: "center",
};
const { t, locale } = useI18n();
</script>
<template>
    <div class="max-w-[1440px] mx-auto pt-24 lg:px-16 px-6">
        <div>
            <div class="relative">
                <p
                    class="absolute ltr:left-8 rtl:right-8 top-[3px] text-2xl font-bold text-[#45315D] z-10"
                >
                    {{ t("home.ourServices.title") }}
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
            <router-link to="/services">
                <p
                    class="text-[#45315D] font-semibold text-base text-end underline"
                >
                    {{ t("home.ourServices.viewAll") }}
                </p>
            </router-link>
        </div>
        <div class="pt-1">
            <Carousel
                ref="carouselRef"
                v-if="services"
                :breakpoints="breakpoints"
            >
                <Slide v-for="service in services" :key="service">
                    <div v-if="service.title[locale]" class="w-full">
                        <div class="lg:grid lg:grid-cols-3" v-if="locale === 'en'">
                            <div class="lg:col-span-1">
                                <div class="flex w-full justify-start">
                                    <div
                                        class="pt-16 pb-9 flex items-center gap-8"
                                    >
                                        <img src="/images/home/bar.svg" />
                                        <p
                                            class="text-[#45315D] text-xl font-bold"
                                        >
                                            {{ service.title[locale] }}
                                        </p>
                                    </div>
                                </div>
                                <p
                                    v-html="service.data[locale].content"
                                    class="text-[#4B4B4B] text-start text-base font-semibold max-w-lg px-8"
                                />
                            </div>
                            <div class="lg:col-span-1"></div>
                            <div class="flex w-full lg:justify-end  justify-center lg:col-span-1 mt-5 lg:mt-0">
                                <img
                                    :src="'/storage/' + service.seo.image"
                                    class="col-span-1"
                                />
                            </div>
                        </div>
                        <div class="lg:grid lg:grid-cols-3" v-if="locale === 'ar'">
                            <div class="lg:col-span-1 flex w-full lg:justify-start justify-center">
                                <img
                                    :src="'/storage/' + service.seo.image"
                                    class="col-span-1"
                                />
                            </div>
                            <div class="lg:col-span-1"></div>
                            <div class="lg:col-span-1">
                                <div class="flex w-full justify-end">
                                    <div
                                        class="pt-16 pb-9 flex items-center gap-8"
                                    >
                                        <p
                                            class="text-[#45315D] text-xl font-bold"
                                        >
                                            {{ service.title[locale] }}
                                        </p>
                                        <img src="/images/home/bar.svg" />
                                    </div>
                                </div>
                                <p
                                    v-html="service.data[locale].content"
                                    class="text-[#4B4B4B] flex w-full justify-end text-start text-base font-semibold lg:max-w-lg lg:px-8"
                                />
                            </div>
                        </div>
                    </div>
                </Slide>
            </Carousel>
        </div>
        <div v-if="locale === 'en'" class="pt-3 flex gap-3 text-start px-8">
            <img
                class="cursor-pointer"
                src="/images/home/arrow-l.svg"
                @click="goToNextSlide"
            />
            <img
                class="cursor-pointer"
                src="/images/home/arrow-r.svg"
                @click="goToPrevSlide"
            />
        </div>
        <div v-if="locale === 'ar'" class="pt-3 flex gap-3 text-start px-8">
            <img
                class="cursor-pointer"
                src="/images/home/arrow-r.svg"
                @click="goToPrevSlide"
            />
            <img
                class="cursor-pointer"
                src="/images/home/arrow-l.svg"
                @click="goToNextSlide"
            />
        </div>
    </div>
</template>
<style>
.carousel__item {
    min-height: 200px;
    width: 100%;
    background-color: var(--vc-clr-primary);
    color: var(--vc-clr-white);
    font-size: 20px;
    border-radius: 8px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.carousel__slide {
    padding: 10px;
}


</style>
