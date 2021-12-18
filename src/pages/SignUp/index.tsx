import { useState } from 'react';

import background from '../../assets/images/background-login.jpg';
import logo from '../../assets/images/Inter-orange.png';
import Button from '../../components/Button';
import Card from '../../components/Card';
import Input from '../../components/Input'
import { Link, useNavigate } from 'react-router-dom';

import useAuth from '../../hooks/useAuth';

import {
    Wrapper,
    Background,
    InputContainer,
    ButtonContainer,
} from './styles';

const SignUp = () => {
    const [firstName, setFirstName] = useState('');
    const [lastName, setLastName] = useState('');
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');
    
    const navigate = useNavigate();
    const { userSignUp } = useAuth();

    const HandleToSignUp = async () => {
        if(!firstName || !lastName || !email || !password){
            alert("Preencha todos os campos!");
        }

        const data = {
            firstName,
            lastName,
            email,
            password
        };

        const response = await userSignUp(data);

        if(response.id) {
            navigate('/dashboard');
            return
        }

        alert('Usuário já cadastrado!');
    }

    return (
        <Wrapper>
            <Background image={background} />
            <Card width="403px">
                <img src={logo} width={172} height={61} alt='Logo-empresa' />
                <InputContainer>
                    <Input 
                        placeholder='NOME' 
                        value={firstName} 
                        onChange={e => setFirstName(e.target.value)}
                    />
                    <Input 
                        placeholder='SOBRENOME'
                        value={lastName} 
                        onChange={e => setLastName(e.target.value)}   
                    />
                    <Input 
                        placeholder='EMAIL'
                        value={email} 
                        onChange={e => setEmail(e.target.value)}
                    />
                    <Input 
                        placeholder='SENHA' 
                        type='password'
                        value={password} 
                        onChange={e => setPassword(e.target.value)}    
                    />
                </InputContainer>
                <ButtonContainer >
                    <Button type='button' onClick={HandleToSignUp}>
                        Cadastrar
                    </Button>
                    <p>
                        Já tem uma conta?
                        <Link to='/'> Entre já </Link>
                    </p>
                </ButtonContainer>
            </Card>
        </Wrapper>
)};

export default SignUp;