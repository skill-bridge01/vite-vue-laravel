<script setup>
import { onMounted, ref, watch, watchEffect, computed } from "vue";
import { useI18n } from "vue-i18n";
import { useRouter } from "vue-router";
const LOCALES = [
    {
        label: "EN",
        value: "en",
    },
    {
        label: "AR",
        value: "ar",
    },
];
const router = useRouter();
const { t, locale } = useI18n();
const selectedLocale = ref(locale.value);
watchEffect(() => {
    locale.value = LOCALES.find((l) => l.value === selectedLocale.value).value;
});

const isNavOpen = ref(false);

const toggleNav = () => {
    isNavOpen.value = !isNavOpen.value;
};

const closeNav = () => {
    isNavOpen.value = false;
};

const navigateToHome = () => {
    closeNav();
    router.push("/home");
};

const navigateToService = () => {
    closeNav();
    router.push("/services");
};
const navigateToLibrary = () => {
    closeNav();
    router.push("/library");
};
const navigateToArticles = () => {
    closeNav();
    router.push("/articles");
};
const navigateToFAQ = () => {
    closeNav();
    router.push("/faq");
};
const navigateToAbout = () => {
    closeNav();
    router.push("/about");
};

const navigateToContact = () => {
    closeNav();
    router.push("/contact");
};

console.log("local", locale.value);
</script>
<template>
    <main>
        <div class="max-w-[1440px] mx-auto px-5">
            <div
                class="flex-wrap pt-7 flex gap-0 items-center lg:items-stretch lg:justify-center justify-between"
            >
                <div
                    :class="[
                        'bg-[#9367C7] xl:px-11 px-5 hidden lg:flex items-center',
                        locale === 'en'
                            ? 'rounded-tl-[26px] rounded-bl-[26px]'
                            : 'rounded-tr-[26px] rounded-br-[26px]',
                    ]"
                >
                    <img class="" src="/images/logo.svg" alt="" />
                </div>
                <div
                    :class="[
                        'bg-[#9367C7] px-7 items-center py-3 block lg:hidden rounded-[26px]',
                    ]"
                >
                    <img class="" src="/images/logo.svg" alt="" />
                </div>

                <div class="lg:hidden flex items-center">
                    <select
                        data-type="home"
                        v-model="selectedLocale"
                        class="mx-2 border h-[43px] border-teal-700 rounded-lg"
                    >
                        <option v-for="l in LOCALES" :value="l.value">
                            {{ l.label }}
                        </option>
                    </select>
                    <button
                        @click="toggleNav"
                        class="flex items-center px-3 py-[10px] border text-teal-500 border-teal-700 rounded-lg"
                        id="btn-nav"
                    >
                        <svg
                            class="fill-current h-5 w-5"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <title>Menu</title>
                            <path
                                d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"
                            />
                        </svg>
                    </button>
                </div>
                <div
                    :class="{ 'h-fit': isNavOpen }"
                    class="mt-1 z-20 bg-gray-500 px-2 rounded-bl-lg rounded-br-lg lg:hidden w-full block flex-grow lg:items-center lg:w-auto overflow-hidden lg:h-full h-0 transition"
                    id="nav-section"
                >
                    <div class="text-sm lg:flex-grow text-start">
                        <a
                            href="#"
                            @click.prevent="navigateToHome"
                            class="relative inline-block hover:text-lg lg:mt-0 text-neutral-800 text-lg hover:text-white hover:bg-green-600 w-full p-2 after:block after:content-[''] after:absolute after:h-[3px] after:w-full after:scale-x-0 after:hover:scale-x-100 after:transition after:duration-300 after:origin-right"
                        >
                            {{ t("header.home") }}
                        </a>
                        <a
                            href="#"
                            @click.prevent="navigateToService"
                            class="relative inline-block hover:text-lg lg:mt-0 text-neutral-800 text-lg hover:text-white hover:bg-green-600 w-full p-2 after:block after:content-[''] after:absolute after:h-[3px] after:w-full after:scale-x-0 after:hover:scale-x-100 after:transition after:duration-300 after:origin-right"
                        >
                        {{ t("header.service") }}
                        </a>
                        <a
                            href="#"
                            @click.prevent="navigateToLibrary"
                            class="relative inline-block hover:text-lg lg:mt-0 text-neutral-800 text-lg hover:text-white hover:bg-green-600 w-full p-2 after:block after:content-[''] after:absolute after:h-[3px] after:w-full after:scale-x-0 after:hover:scale-x-100 after:transition after:duration-300 after:origin-right"
                        >
                        {{ t("header.resource") }}
                        </a>
                        <a
                            href="#"
                            @click.prevent="navigateToArticles"
                            class="relative inline-block hover:text-lg lg:mt-0 text-neutral-800 text-lg hover:text-white hover:bg-green-600 w-full p-2 after:block after:content-[''] after:absolute after:h-[3px] after:w-full after:scale-x-0 after:hover:scale-x-100 after:transition after:duration-300 after:origin-right"
                        >
                        {{ t("header.articles") }}
                        </a>
                        <a
                            href="#"
                            @click.prevent="navigateToFAQ"
                            class="relative inline-block hover:text-lg lg:mt-0 text-neutral-800 text-lg hover:text-white hover:bg-green-600 w-full p-2 after:block after:content-[''] after:absolute after:h-[3px] after:w-full after:scale-x-0 after:hover:scale-x-100 after:transition after:duration-300 after:origin-right"
                        >
                        {{ t("header.faq") }}
                        </a>
                        <a
                            href="#"
                            @click.prevent="navigateToAbout"
                            class="relative inline-block hover:text-lg lg:mt-0 text-neutral-800 text-lg hover:text-white hover:bg-green-600 w-full p-2 after:block after:content-[''] after:absolute after:h-[3px] after:w-full after:scale-x-0 after:hover:scale-x-100 after:transition after:duration-300 after:origin-right"
                        >
                        {{ t("header.aboutUs") }}
                        </a>
                        <a
                            href="#"
                            @click.prevent="navigateToContact"
                            class="relative inline-block hover:text-lg lg:mt-0 text-neutral-800 text-lg hover:text-white hover:bg-green-600 w-full p-2 after:block after:content-[''] after:absolute after:h-[3px] after:w-full after:scale-x-0 after:hover:scale-x-100 after:transition after:duration-300 after:origin-right"
                        >
                        {{ t("header.contactUs") }}
                        </a>
                        <!-- <router-link
                            to="/home"
                            active-class="active"
                            exact
                            class="relative inline-block hover:text-lg lg:mt-0 text-neutral-800 text-lg hover:text-white hover:bg-green-600 w-full p-2 after:block after:content-[''] after:absolute after:h-[3px] after:w-full after:scale-x-0 after:hover:scale-x-100 after:transition after:duration-300 after:origin-right"
                        >
                            {{ t("header.home") }}
                        </router-link> -->
                        <!-- <router-link
                            to="/services"
                            active-class="active"
                            class="relative block active:text-lg lg:inline-block hover:text-lg hover:text-white hover:bg-green-600 p-2 lg:mt-0 text-neutral-800 text-lg after:block after:content-[''] after:absolute after:h-[3px] after:w-full after:scale-x-0 after:hover:scale-x-100 after:transition after:duration-300 after:origin-right"
                        >
                            {{ t("header.service") }}
                        </router-link>
                        <router-link
                            to="/library"
                            active-class="active"
                            class="relative block active:text-lg lg:inline-block hover:text-lg hover:text-white hover:bg-green-600 p-2 lg:mt-0 text-neutral-800 text-lg after:block after:content-[''] after:absolute after:h-[3px] after:w-full after:scale-x-0 after:hover:scale-x-100 after:transition after:duration-300 after:origin-right"
                        >
                            {{ t("header.resource") }}
                        </router-link>
                        <router-link
                            to="/articles"
                            active-class="active"
                            class="relative block active:text-lg lg:inline-block hover:text-lg hover:text-white hover:bg-green-600 p-2 lg:mt-0 text-neutral-800 text-lg after:block after:content-[''] after:absolute after:h-[3px] after:w-full after:scale-x-0 after:hover:scale-x-100 after:transition after:duration-300 after:origin-right"
                        >
                            {{ t("header.articles") }}
                        </router-link>
                        <router-link
                            to="/faq"
                            active-class="active"
                            class="relative block active:text-lg lg:inline-block hover:text-lg hover:text-white hover:bg-green-600 p-2 lg:mt-0 text-neutral-800 text-lg after:block after:content-[''] after:absolute after:h-[3px] after:w-full after:scale-x-0 after:hover:scale-x-100 after:transition after:duration-300 after:origin-right"
                        >
                            {{ t("header.faq") }}
                        </router-link>
                        <router-link
                            to="/about"
                            active-class="active"
                            class="relative block active:text-lg lg:inline-block hover:text-lg hover:text-white hover:bg-green-600 p-2 lg:mt-0 text-neutral-800 text-lg after:block after:content-[''] after:absolute after:h-[3px] after:w-full after:scale-x-0 after:hover:scale-x-100 after:transition after:duration-300 after:origin-right"
                        >
                            {{ t("header.aboutUs") }}
                        </router-link>
                        <router-link
                            to="/contact"
                            active-class="active"
                            class="relative block active:text-lg lg:inline-block hover:text-lg hover:text-white hover:bg-green-600 p-2 lg:mt-0 text-neutral-800 text-lg after:block after:content-[''] after:absolute after:h-[3px] after:w-full after:scale-x-0 after:hover:scale-x-100 after:transition after:duration-300 after:origin-right"
                        >
                            {{ t("header.contactUs") }}
                        </router-link> -->
                        <!-- <a
                            href="#price"
                            class="relative w-fit mt-4 inline-block lg:mt-0 text-neutral-800 hover:text-neutral-800 text-lg lg:mr-12 mr-4 after:block after:content-[''] after:absolute after:h-[3px] after:bg-white after:w-full after:scale-x-0 after:hover:scale-x-100 after:transition after:duration-300 after:origin-right pb-8 lg:pb-0"
                        >
                            {{ t("home.nav.priceAndPackage") }}
                        </a> -->
                    </div>
                </div>
                <div
                    :class="[
                        '2xl:px-20 xl:px-14 sxl:px-11 lg:px-8 py-5 hidden lg:flex lg:justify-center items-center 2xl:gap-14 xl:gap-10 sxl:gap-8 gap-6 bg-[#45315D]  text-[#E2E2E2] text-base',
                        locale === 'en'
                            ? 'rounded-tr-[26px] rounded-br-[26px]'
                            : 'rounded-tl-[26px] rounded-bl-[26px]',
                    ]"
                >
                    <router-link to="/home" active-class="active" exact>{{
                        t("header.home")
                    }}</router-link>
                    <router-link to="/services" active-class="active">{{
                        t("header.service")
                    }}</router-link>
                    <router-link to="/library" active-class="active">{{
                        t("header.resource")
                    }}</router-link>
                    <router-link to="/articles" active-class="active">{{
                        t("header.articles")
                    }}</router-link>
                    <router-link to="/faq" active-class="active">{{
                        t("header.faq")
                    }}</router-link>
                    <router-link to="/about" active-class="active">{{
                        t("header.aboutUs")
                    }}</router-link>
                    <router-link to="/contact" active-class="active">{{
                        t("header.contactUs")
                    }}</router-link>
                </div>
                <select
                    v-model="selectedLocale"
                    class="hidden lg:block mt-2 mx-2 rounded-lg border h-12 border-teal-700 outline-none focus:outline-none"
                >
                    <option v-for="l in LOCALES" :value="l.value">
                        {{ l.label }}
                    </option>
                </select>
            </div>
        </div>
    </main>
</template>
<style></style>
