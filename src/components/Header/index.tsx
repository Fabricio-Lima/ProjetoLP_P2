import logo from '../../assets/images/Inter-orange.png';
import { useNavigate } from 'react-router-dom';

import {
    HeaderContainer,
    HeaderWrapper, 
    UserInfo
 } from "./styles";

import UserCirc from '../UserCicle';

const Header = () => {
    return (
        <HeaderContainer>
            <HeaderWrapper>
                <img src={logo} width={172} height={61} alt='logo-empresa' />
                <UserInfo>
                    <UserCirc initials='PF' />
                    <div>
                        <p>
                            Olá. 
                            <span className='primary-color font-bold'> Fabricio </span>
                        </p>
                        <strong>
                            12345678-9
                        </strong><br />
                        <a href='#'>Sair</a>
                    </div>
                </UserInfo>
            </HeaderWrapper>
        </HeaderContainer>

)};

export default Header;