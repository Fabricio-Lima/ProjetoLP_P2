import api from '../api';


export const request = (value: number) => {
    return api.post('/pix/request', {value});
}

export const pay = (key: string) => {
    return api.post(`/pix/key/${key}`);
}

export const transaction = () => {
    return api.get('/api/transactions')
}
