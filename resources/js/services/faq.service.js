import { http } from "./http";

class FaqService {
    apiUrl = "/faq";
    getList() {
        return http.get(this.apiUrl + "/");
    }
}

export const faqService = new FaqService();
