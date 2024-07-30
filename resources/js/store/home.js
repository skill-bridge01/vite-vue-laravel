import { defineStore } from "pinia";
import { homeService } from "@/services";

export const useHomeStore = defineStore("home", {
    state: () => ({
        home: [],
    }),
    actions: {

        fetch() {
            homeService
                .getList()
                .then((res) => {
                    this.home = res.data.home;
                })
                .catch((err) => {
                    console.log("LIBRS_ERR")
                })
                .finally(() => {
                });
        },
    },
});
