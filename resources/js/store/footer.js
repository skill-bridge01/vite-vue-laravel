import { defineStore } from "pinia";
import { footerService } from "@/services";

export const useFooterStore = defineStore("footer", {
    state: () => ({
        footer: [],
    }),
    actions: {

        fetch() {
            footerService
                .getList()
                .then((res) => {
                    this.footer = res.data.footer;
                })
                .catch((err) => {
                    console.log("LIBRS_ERR")
                })
                .finally(() => {
                });
        },
    },
});
