<script setup>
import { ref, onMounted } from "vue";
import { useI18n } from "vue-i18n";
import { storeToRefs } from "pinia";
import Services from "./components/Services.vue";
import ResourceLibrary from "./components/ResourceLibrary.vue";
import Articles from "./components/Articles.vue";
import FAQ from "./components/FAQ.vue";
import About from "./components/About.vue";
import Contact from "./components/Contact.vue";
import "vue3-carousel/dist/carousel.css";
import { useHomeStore } from "@/store/home";

const homeStore = useHomeStore();
const { home } = storeToRefs(useHomeStore());
onMounted(() => {
    homeStore.fetch();
    console.log("locale", locale.value);
    // console.log("library123", librarys.value);
});

const { t, locale } = useI18n();
</script>
<template>
    <div class="mb-32 ">
        <div class="relative  pt-9">
            <div class="max-w-[1440px] mx-auto">
                <!-- <div
                    v-if="home"
                    class="pt-14 xl:px-24 px-10  grid grid-cols-3 "
                >
                    <div class="col-span-2" v-if="home[0]">
                        <h1
                            class="text-3xl font-bold pb-10 text-[#45315D] text-start"
                        >
                            {{ home[0].title[locale] }}
                        </h1>
                        <p
                            v-html="home[0].data[locale].header"
                            class="text-xl font-normal max-w-2xl text-[#403D3D] text-start"
                        />
                    </div>
                    <img class="col-span-1" :src="'/storage/'+home[0]?.seo.image" alt="" />
                </div> -->
                <div
                    v-if="home"
                    class="pt-14 xl:px-24 lg:px-10 px-6 xl:gap-28 gap-14 flex-col lg:flex-row flex items-center justify-between"
                >
                    <div class="" v-if="home[0]">
                        <h1
                            class="text-3xl font-bold pb-10 text-[#45315D] text-start"
                        >
                            {{ home[0].title[locale] }}
                            <!-- {{ t("home.title") }} -->
                        </h1>
                        <p
                            v-html="home[0].data[locale].header"
                            class="text-xl font-normal max-w-2xl text-[#403D3D] text-start"
                        />
                    </div>
                    <!-- <img src="/images/home/1-1.png" alt="" /> -->
                    <img :src="'/storage/'+home[0]?.seo.image" alt="" />
                </div>
            </div>
            <img class="absolute right-0 top-9" src="/images/home/1-2.svg" />
        </div>
        <img class="pt-28 w-full" src="/images/home/2.svg" />

        <Services />
        <ResourceLibrary />
        <Articles />
        <FAQ />
        <About />
        <Contact />
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
