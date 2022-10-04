import { CircContainer } from "./styles";

interface UserInfo {
    initials: string;
}

const UserCirc = ({initials}: UserInfo) => {
    return (
        <CircContainer>
            {initials}
        </CircContainer>
)}

export default UserCirc;