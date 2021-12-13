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


const SignUp = () => {
    const navigate = useNavigate();

    const HandleToSignUp = () => {
        navigate('/dashboard');
    }

    return (
        <Wrapper>
            <Background image={background} />
            <Card width="403px">
                <img src={logo} width={172} height={61} alt='Logo-empresa' />
                <InputContainer>
                    <Input placeholder='NOME'/>
                    <Input placeholder='SOBRENOME'/>
                    <Input placeholder='EMAIL'/>
                    <Input placeholder='SENHA' type='password'/>
                    <Input placeholder='CONFIRMAR SENHA' type='password'/>
                </InputContainer>
                <ButtonContainer onClick={HandleToSignUp}>
                    <Button type='button'>
                        Entrar
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