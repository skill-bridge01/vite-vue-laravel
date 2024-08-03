<script setup>
import { useI18n } from "vue-i18n";
import { ref, onMounted, computed } from "vue";
import { useDetailStore } from "@/store/detail";
import { storeToRefs } from "pinia";
const { t, locale } = useI18n();
const libraryStore = useDetailStore();
const { librarys, selectedLibrary, loading } = storeToRefs(useDetailStore());
const handleClickDetails = (library) => {
    //   console.log("library", library);
    libraryStore.setSelectedLibrary(library);
    router.push("/details");
};
const props = defineProps({
    title: {
        type: String,
        default: "",
    },
    date: {
        type: String,
        default: "",
    },
    src: {
        type: String,
        default: "",
    },
});

const month = ref("");
const day = ref("");
const year = ref("");

const hour = ref("");
const minute = ref("");
const period = ref("");

const getDay = (time) => {
    const someDate = new Date(time);

    const dayIndex = someDate.getDay();
    const dayName = [
        computed(() => t("articles.day.sunday")),
        computed(() => t("articles.day.monday")),
        computed(() => t("articles.day.tuesday")),
        computed(() => t("articles.day.wednesday")),
        computed(() => t("articles.day.thursday")),
        computed(() => t("articles.day.friday")),
        computed(() => t("articles.day.saturday")),
    ][dayIndex];
    return dayName;
    // console.log(`The day was: ${dayName}`);
};
const getMonth = (time) => {
    const someDate = new Date(time);

    const monthIndex = someDate.getMonth();
    const dayName = [
        computed(() => t("articles.month.january")),
        computed(() => t("articles.month.february")),
        computed(() => t("articles.month.march")),
        computed(() => t("articles.month.april")),
        computed(() => t("articles.month.may")),
        computed(() => t("articles.month.june")),
        computed(() => t("articles.month.july")),
        computed(() => t("articles.month.august")),
        computed(() => t("articles.month.september")),
        computed(() => t("articles.month.october")),
        computed(() => t("articles.month.november")),
        computed(() => t("articles.month.december")),
    ][monthIndex];
    return dayName;
    // console.log(`The day was: ${dayName}`);
};
const getTime1 = (time) => {
    const date = new Date(time);
    const hours24 = date.getUTCHours();
    const minutes = date.getUTCMinutes();
    let period1 =  computed(() => t("articles.day.am"));
    let hours12 = hours24;
    if (hours24 >= 12) {
        period1 = computed(() => t("articles.day.pm"));
        if (hours24 > 12) hours12 = hours24 - 12;
    }
    hour.value = hours12;
    minute.value = minutes;
    period.value = period1;
    return true;
    // console.log(`The day was: ${dayName}`);
};

const getTime = (time) => {
    const date = new Date(time);
    const months = date.getMonth();
    const days = date.getDate();
    const years = date.getFullYear();

    month.value = months;
    day.value = days;
    year.value = years;
    return true;
};

onMounted(() => {
    getTime(props.date);
});
</script>
<template>
    <div class="rounded-normal shadow-article grid grid-cols-3 gap-[10px] items-center">
        <img :src="props.src" />
        <div class="flex flex-col gap-3 text-start col-span-2">
            <p class="text-[#313131] text-sm font-normal">{{ props.title }}</p>
            <p class="text-[#494848] text-sm font-light">
                {{ day }}&nbsp;{{ getMonth(props.date) }}&nbsp;{{ year }}
            </p>
        </div>
    </div>
</template>
