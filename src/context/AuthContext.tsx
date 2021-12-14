import { AxiosResponse } from 'axios';
import {
    //useEffect, 
    useState, 
    //useCallback, 
    createContext
} from 'react';

import {
    signIn,
    //signUp,
    SignInData,
    SignUpData,
    me
} from '../services/resources/user'


interface UserDto {
    id: string;
    firstName: string;
    lastName: string;
    accountNumber: number;
    accountDigit: number;
    wallet: number;
    email: string;
}

interface ContextData {
    user: UserDto;
    userSignIn: (userData: SignInData) => Promise <UserDto>;
    userSignUp: (userData: SignUpData) => Promise <UserDto>;
    me: () => Promise <AxiosResponse<UserDto, any>>;
}

export const AuthContext = createContext<ContextData>({} as ContextData);

export const AuthProvider: React.FC = ({children}) => {
    
    const [user, setUser] = useState<UserDto>({} as UserDto);
    
    const userSignIn = async (userData: SignInData) => {
        const { data } = await signIn(userData);

        if (data?.status === 'error') return data;
        if (data.accessToken) localStorage.setItem('@Inter:Token', data.accessToken);

        return await getCurrentUser();
    }

    const getCurrentUser = async () => {
        const { data } = await me();
        setUser(data);

        return data;
    }

    const userSignUp = async (userData: SignUpData) => {
        const { data } = await signIn(userData);
        localStorage.setItem('@Inter:Token', data.accessToken);

        return await getCurrentUser();
    }


    return (
        <AuthContext.Provider value={{user, userSignIn, userSignUp, me}}>
            {children}           
        </AuthContext.Provider>
)}