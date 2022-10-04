import axios from 'axios';


const api = axios.create({
    baseURL: `api_laravel`
});

api.interceptors.request.use(config => {
    const token = localStorage.getItem('@SSID:Token') || '';
    config.headers = {
            'Authorization' : `Bearer ${token}`,
    }

    return config;
});

export default api;
