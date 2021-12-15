import { useState, useEffect } from 'react';
import { transactions } from '../../services/resources/pix';

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
    type: 'paid' | 'received',
    updatedAt: Date
}

const StatementItem = ({user, value, type, updatedAt}: StatementItem) => {

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
                    {type === 'paid' ? ' pago à ' : ' recebido de '}
                    <strong>
                        {user.firstName} {user.lastName}
                    </strong> 
                </p>
                <p>
                    {format(new Date(updatedAt), "dd/MM/yyyy 'às' HH:mm'h'")}
                </p>
            </StatementItemInfo>
        </StatementItemContainer>
)}

const Statement = () => {

    const [ statements, setStatements ] = useState<StatementItem[]>([]);

    const getAlltransactions = async () => {
        const { data } = await transactions();
        setStatements(data.transactions);
    }

    useEffect(() => {
        getAlltransactions();
    }, []) 

    return (
        <StatementContainer>
            {statements && statements.map(statment => <StatementItem {...statment}/>)}
        </StatementContainer>
)}

export default Statement;