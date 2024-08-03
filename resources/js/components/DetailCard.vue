<script setup>
import { useI18n } from "vue-i18n";
import { useDetailStore } from "../store/detail";
import router from "../router";
import { storeToRefs } from "pinia";
const libraryStore = useDetailStore();
const { librarys, selectedLibrary, loading } = storeToRefs(useDetailStore());

const { t, locale } = useI18n();
const props = defineProps({
    title: {
        type: String,
        default: "",
    },
    content: {
        type: String,
        default: "",
    },
    content2: {
        type: String,
        default: "",
    },
    src: {
        type: String,
        default: "",
    },
});
</script>
<template>
    <div
        class="text-start flex md:flex-row flex-col items-center md:gap-6 lg:ltr:pr-8 lg:rtl:pl-8 md:ltr:pr-3 md:rtl:pl-3 shadow-library rounded-normal"
    >
        <img :src="props.src" class="md:block hidden"/>
        <img :src="props.src" class="md:hidden flex w-full"/>
        <div class="w-full md:px-0 xs:px-6 px-3 md:py-2 py-5">
            <div class="flex justify-between pb-7 items-center">
                <p class="text-[#45315D] text-lg font-bold">
                    {{ props.title }}
                </p>
                <button
                    class="hidden bg-[#FF2400] rounded-[4px] h-[45px] lg:w-[224px] md:w-[200px] md:flex justify-center items-center shadow-post"
                >
                    <img src="/images/library/arrow-up.svg" />
                    <p class="text-white">
                        {{ t("library.details.blogPost") }}
                    </p>
                </button>
            </div>

            <p
                class="text-[#313131] text-sm font-normal md:pb-1 pb-3"
                v-html="props.content"
            />
            <button
                class="md:hidden bg-[#FF2400] rounded-[4px] h-[45px] w-[224px] flex justify-center items-center shadow-post"
            >
                <img src="/images/library/arrow-up.svg" />
                <p class="text-white">{{ t("library.details.blogPost") }}</p>
            </button>
            <!-- <p class="text-[#313131] text-sm font-normal pb-1">
        {{ props.content2 }}
      </p> -->
        </div>
    </div>
</template>
