import { http } from "./http";

class ContactService {
    apiUrl = "/send-email";
    sendEmail(value) {
        return http.post(this.apiUrl, {
            value,
        });
    }
    getList() {
        return http.get("/contact");
    }
    
}

export const contactService = new ContactService();
