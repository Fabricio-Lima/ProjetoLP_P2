import api from '../api';


export interface SignInData {
    email: string;
    password: string;
}

export interface SignUpData {
    firstName: string;
    lastName: string;
    email: string;
    password: string;
}

export interface UserDto {
    id: string;
    firstName: string;
    lastName: string;
    accountNumber: number;
    accountDigit: number;
    wallet: number;
    email: string;
}

export const me = async () => {
    return api.get<UserDto>('/user/me');
}

export const signIn = async (data: SignInData) => {
    return api.post('/user/signin', data);
}

export const signUp = async (data: SignUpData) => {
    return api.post('/user/signup', data);
}


