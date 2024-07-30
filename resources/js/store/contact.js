import { defineStore } from "pinia";
import { contactService } from "@/services";

export const useContactStore = defineStore("contact", {
    state: () => ({
        contact: [],
    }),
    actions: {

        fetch() {
            contactService
                .getList()
                .then((res) => {
                    this.contact = res.data.contact;
                })
                .catch((err) => {
                    console.log("LIBRS_ERR")
                })
                .finally(() => {
                });
        },
    },
});
