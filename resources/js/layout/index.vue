<script setup>
import Header from "./Header.vue";
import Footer from "./Footer.vue";
import { useI18n } from "vue-i18n";
const { locale } = useI18n();
</script>
<template>
  <div class="bg-white relative" :dir="[locale === 'en' ? 'ltr' : 'rtl']">
    <Header />
    <div class=" absolute top-20 left-0 right-0">
      <main>
        <div class="">
          <div>
            <router-view />
          </div>
          <Footer />
        </div>
      </main>
    </div>
  </div>
</template>
