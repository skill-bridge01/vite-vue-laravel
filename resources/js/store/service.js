import { defineStore } from "pinia";
import { serviceService } from "@/services";
import axios from "axios";

export const useServiceStore = defineStore("service", {
    state: () => ({
        services: [],
    }),
    actions: {

        fetch() {
            serviceService
                .getList()
                .then((res) => {
                    this.services = res.data.services;
                })
                .catch((err) => {
                    console.log("LIBRS_ERR")
                })
                .finally(() => {
                });
        },
    },
});
