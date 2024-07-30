import { http } from "./http";

class AboutService {
    apiUrl = "/about";
    getList() {
        return http.get(this.apiUrl + "/");
    }
    getHomeList() {
        return http.get("/home-about");
    }
}

export const aboutService = new AboutService();
