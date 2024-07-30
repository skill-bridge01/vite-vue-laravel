import { defineStore } from "pinia";
import { faqService } from "@/services";

export const useFaqStore = defineStore("faq", {
    state: () => ({
        faq: [],
    }),
    actions: {

        fetch() {
            faqService
                .getList()
                .then((res) => {
                    this.faq = res.data.faq;
                })
                .catch((err) => {
                    console.log("LIBRS_ERR")
                })
                .finally(() => {
                });
        },
    },
});
