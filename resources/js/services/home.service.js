import { http } from "./http";

class HomeService {
    apiUrl = "/home";
    getList() {
        return http.get(this.apiUrl + "/");
    }
}

export const homeService = new HomeService();
