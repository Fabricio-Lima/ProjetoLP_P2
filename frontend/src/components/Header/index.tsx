import { useNavigate } from 'react-router-dom';
import useAuth from '../../hooks/useAuth';

import {
    HeaderContainer,
    HeaderWrapper, 
    UserInfo
 } from "./styles";

import logo from '../../assets/images/Inter-orange.png';
import UserCirc from '../UserCicle';


const Header = () => {
    const navigate = useNavigate();
    const { user } = useAuth();

    const initials = user.firstName.substr(0,1) + user.lastName.substr(0,1);

    const HandleToDashboard =() => {
        navigate('/')
    }

    return (
        <HeaderContainer>
            <HeaderWrapper>
                <img src={logo} width={172} height={61} alt='logo-empresa' />
                <UserInfo>
                    <UserCirc initials={initials} />
                    <div>
                        <p>
                            Olá.   <span className='primary-color font-bold'>
                                {user.firstName}   {user.lastName}
                            </span>
                        </p>
                        <strong>
                            {user.accountNumber} - {user.accountDigit}
                        </strong><br />
                        <a href='/' onClick={HandleToDashboard}> Sair </a>
                    </div>
                </UserInfo>
            </HeaderWrapper>
        </HeaderContainer>

)};

export default Header;