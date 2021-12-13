import { FiDollarSign } from 'react-icons/fi';
import { format } from "date-fns";

import { 
    StatementContainer, 
    StatementItemImage, 
    StatementItemInfo,
    StatementItemContainer
} from "./styles";

interface StatementItem {
    user: {
        firstName: string,
        lastName: string
    }
    value: number,
    type: 'pay' | 'received',
    updateAt: Date
}

const StatementItem = ({user, value, type, updateAt}: StatementItem) => {
    return (
        <StatementItemContainer>
            <StatementItemImage type={type}>
                <FiDollarSign size={24}/>
            </StatementItemImage>

            <StatementItemInfo>
                <p className="primary-color">{value.toLocaleString('pt-BR', 
                {
                    style: 'currency',
                    currency:'BRL'
                })}
                </p>
                <p>
                    {type === 'pay' ? ' pago à ' : ' recebido de '}
                    <strong>
                        {user.firstName} {user.lastName}
                    </strong> 
                </p>
                <p>
                    {format(updateAt, "dd/MM/yyyy 'às' HH:mm'h'")}
                </p>
            </StatementItemInfo>
        </StatementItemContainer>
    )
}

const Statement = () => {

    const statements: StatementItem[] = [
        {
            user: {
                firstName: 'Fabricio', 
                lastName: 'Lima'
            },
            value: 250.00,
            type: 'pay',
            updateAt: new Date()
        },
        {
            user: {
                firstName: 'Carlos',
                lastName: 'Costa'
            },
            value: 100.00,
            type: 'received',
            updateAt: new Date()
        }
    ]

    return (
        <StatementContainer>
            {statements.map(statment => <StatementItem {...statment}/>)}
        </StatementContainer>
)}

export default Statement;