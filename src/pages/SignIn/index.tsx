import { 
    //useEffect, 
    useState 
} from 'react';

import background from '../../assets/images/background-login.jpg';
import logo from '../../assets/images/Inter-orange.png';
import Button from '../../components/Button';
import Card from '../../components/Card';
import Input from '../../components/Input'

import { Link, useNavigate } from 'react-router-dom';

import {
    Wrapper,
    Background,
    InputContainer,
    ButtonContainer,
} from './styles';

import useAuth from '../../hooks/useAuth'


const SignIn = () => {
    const [ email, setEmail ] = useState('');
    const [ password, setPassword] = useState('');

    const navigate = useNavigate();
    const { userSignIn } = useAuth();

    const HandleToSignIn = async () => {
        const data = {
            email,
            password
        }

        const response = await userSignIn(data);

        if(response.id){
            navigate('/dashboard');
            return;
        }

        alert('Usuário ou senha inválidos');
    }

    return (
        <Wrapper>
            <Background image={background} />
            <Card width="403px">
                <img 
                    src={logo} 
                    width={172} 
                    height={61} 
                    alt='Logo-empresa' 
                />
                <InputContainer>
                    <Input 
                        placeholder='EMAIL' 
                        value={email} 
                        onChange={e => setEmail(e.target.value)}
                    />
                    <Input 
                        placeholder='SENHA' 
                        value={password} 
                        onChange={e => setPassword(e.target.value)} 
                        type='password'
                    />
                </InputContainer>
                <ButtonContainer onClick={HandleToSignIn}>
                    <Button type='button'>
                        Entrar
                    </Button>
                    <p>
                        Ainda não é cadastrado?
                        <Link to='/signup'> Cadastre-se já </Link>
                    </p>
                </ButtonContainer>
            </Card>
        </Wrapper>
)};

export default SignIn;