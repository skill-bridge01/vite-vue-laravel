
import { http } from "./http";

class ServiceService {
    apiUrl = "/service";
    getList() {
        return http.get(this.apiUrl + "/");
    }
}

export const serviceService = new ServiceService();
