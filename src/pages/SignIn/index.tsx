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


const SignIn = () => {
    const navigate = useNavigate();

    const HandleToSignIn = () => {
        navigate('/dashboard');
    }

    return (
        <Wrapper>
            <Background image={background} />
            <Card width="403px">
                <img src={logo} width={172} height={61} alt='Logo-empresa' />
                <InputContainer>
                    <Input placeholder='EMAIL'/>
                    <Input placeholder='SENHA' type='password'/>
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