import { defineStore } from "pinia";
import { aboutService } from "@/services";
import axios from "axios";

export const useAboutStore = defineStore("about", {
    state: () => ({
        about: [],
        homeAbout: [],
    }),
    actions: {

        fetch() {
            aboutService
                .getList()
                .then((res) => {
                    this.about = res.data.about;
                })
                .catch((err) => {
                    console.log("LIBRS_ERR")
                })
                .finally(() => {
                });
        },

        fetchHome() {
            aboutService
                .getHomeList()
                .then((res) => {
                    this.homeAbout = res.data.about;
                })
                .catch((err) => {
                    console.log("LIBRS_ERR")
                })
                .finally(() => {
                });
        },
    },
});
