<script setup>
import { useI18n } from "vue-i18n";
import { onMounted } from "vue";
import CardBox from "@/components/CardBox.vue";
import "vue3-carousel/dist/carousel.css";
import { storeToRefs } from "pinia";
import { useFooterStore } from "@/store/footer";
import { useContactStore } from "@/store/contact";

const footerStore = useFooterStore();
const { footer } = storeToRefs(useFooterStore());

const contactStore = useContactStore();
const { contact } = storeToRefs(useContactStore());
const date=new Date();
const year=date.getFullYear();
console.log(year);

onMounted(() => {
    contactStore.fetch();
    footerStore.fetch();
});

const { t, locale } = useI18n();
</script>
<template>
    <div class="overflow-visible footer-background bg-no-repeat px-24 pb-2">
        <div class="flex justify-end">
            <div class="flex gap-[10px] pt-16 z-10 pb-9">
                <img src="/images/home/facebook-icon.svg" />
                <img src="/images/home/twitter-icon.svg" />
                <img src="/images/home/instagram-icon.svg" />
                <img src="/images/home/youtube-icon.svg" />
            </div>
        </div>
        <hr />
        <div class="py-4 grid grid-cols-4 text-start text-white gap-24">
            <div class="text-xl font-semibold">
                <p class="pb-3">{{ t("footer.aboutUs.title") }}</p>
                <div v-if="footer">
                    <div v-if="footer.id">
                        <p v-html="footer.data[locale].about" />
                    </div>
                    <!-- <p v-html="footer[0].data[locale].about" /> -->
                </div>
                <!-- <p>{{ t("footer.aboutUs.content") }}</p> -->
            </div>
            <div class="flex flex-col gap-[6px]">
                <p class="text-xl font-semibold pb-2">
                    {{ t("footer.contactInfo.title") }}
                </p>
                <div class="text-base">
                    <p class="font-semibold pb-[1px]">
                        {{ t("footer.contactInfo.address") }}
                    </p>
                    <div v-if="footer && footer.id">
                        <p
                            class="font-normal"
                            v-html="footer.data[locale].address"
                        />
                    </div>
                </div>
                <div>
                    <p class="font-semibold pb-[1px]">
                        {{ t("footer.contactInfo.email") }}
                    </p>
                    <div v-if="contact && contact.length > 0">
                        <p
                            class="font-normal"
                            v-html="contact[0].data[locale].email"
                        />
                    </div>
                </div>
                <div>
                    <p class="font-semibold pb-[1px]">
                        {{ t("footer.contactInfo.phone") }}
                    </p>
                    <!-- <p class="font-normal">+972599968870</p> -->
                    <div
                        class="content-rtl ltr:text-end"
                        v-if="contact && contact.length > 0"
                    >
                        <!-- Your RTL content goes here -->
                        <!-- LTR content within RTL -->
                        <span
                            class="force-ltr !text-start"
                            v-html="contact[0].data[locale].phone"
                        />
                    </div>
                </div>
            </div>
            <div>
                <p class="text-xl font-semibold pb-5">
                    {{ t("footer.ourServices.title") }}
                </p>
                <div
                    class="leading-9 text-base font-semibold pb-3"
                    v-if="footer && footer.id"
                >
                    <p v-html="footer.data[locale].service" />
                </div>
                <!-- <p class="text-base font-semibold pb-3">
                    {{ t("footer.ourServices.podCard") }}
                </p>
                <p class="text-base font-semibold pb-3">
                    {{ t("footer.ourServices.script") }}
                </p>
                <p class="text-base font-semibold">
                    {{ t("footer.ourServices.technical") }}
                </p> -->
            </div>
            <div>
                <p class="text-xl font-semibold pb-6">
                    {{ t("footer.importantLinks.title") }}
                </p>
                <router-link to="/about"
                    ><p class="text-base font-semibold pb-3">
                        {{ t("footer.importantLinks.aboutUs") }}
                    </p></router-link
                >
                <router-link to="/library"
                    ><p class="text-base font-semibold pb-3">
                        {{ t("footer.importantLinks.blog") }}
                    </p></router-link
                >
                <router-link to="/articles">
                    <p class="text-base font-semibold">
                        {{ t("footer.importantLinks.articles") }}
                    </p>
                </router-link>
            </div>
        </div>
        <hr />
        <p class="text-white pt-3 text-[17px] font-normal">
            {{ t("footer.allRight") }}&nbsp;{{ year }}
        </p>
        <!-- <p class="underline w-full text-white"></p> -->
    </div>
</template>
<style>
.footer-background {
    background-image: url("/images/home/footer.svg");
    background-size: cover;
}
.content-rtl {
    direction: rtl;
}

.force-ltr {
    direction: ltr;
    unicode-bidi: bidi-override;
}
</style>
