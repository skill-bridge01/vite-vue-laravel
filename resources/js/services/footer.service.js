import { http } from "./http";

class FooterService {
    apiUrl = "/footer";
    getList() {
        return http.get(this.apiUrl + "/");
    }
}

export const footerService = new FooterService();
