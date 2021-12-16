import { Fragment, useEffect, useState } from "react";
import Button from "../../components/Button";
import Card from "../../components/Card";
import Header from "../../components/Header";
import Input from "../../components/Input";
import Statement from "../../components/Statement";

import { pay, request } from '../../services/resources/pix';

import useAuth from "../../hooks/useAuth";

import {
    DashboardBackground,
    BodyContainer,
    InLineTitle,
    InLineContainer
} from './styles';

const Dashboard = () => {
    const { user, getCurrentUser } = useAuth(); 
    const wallet = user?.wallet || 0;

    const [key, setKey] = useState('');
    const [generatedKey, setGeneratedKey] = useState('');
    const [newValue, setNewValue] = useState('');

    const handleNewPayment = async () => {
        const { data } = await request(Number (newValue));

        if(data.copyPasteKey) setGeneratedKey(data.copyPasteKey);
    }

    const handlePayPix = async () => {
        try {
            const {data} = await pay(key);
            
            if(data.msg){
                alert(data.msg)
                return
            }
            
            alert('Não foi possível fazer o pagamento!')
        } catch(e){
            console.log(e);
            alert('Não foi possível fazer o pagamento!')
        }
    }   

    useEffect(() => {
        getCurrentUser();
    }, []);

    if (!user) return null;

    return (
        <DashboardBackground>
            <Header />
            <BodyContainer>
                <div>
                    <Card width="90%" noShadow>
                        <InLineTitle>
                            <h2 className="h2">
                                Saldo Atual
                            </h2>
                        </InLineTitle>
                        <InLineContainer>
                        <h3 className="wallet">
                            {wallet.toLocaleString('pt-BR', {style: 'currency', currency:'BRL'})}
                        </h3>   
                        </InLineContainer>
                    </Card>   

                    <Card width="90%" noShadow>
                        <InLineTitle>
                            <h2 className="h2">
                                Receber PIX
                            </h2>
                        </InLineTitle>
                        <InLineContainer>
                            <Input 
                                style={{flex: 1}} 
                                placeholder="Valor"
                                value={newValue}
                                onChange={e =>setNewValue(e.target.value)}
                                />
                            <Button onClick={handleNewPayment}>
                                Gerar Código
                            </Button>
                        </InLineContainer>
                        {generatedKey && (
                            <Fragment>
                            <p className="primary-color">
                                Pix Copia e Cola
                            </p>
                            <p className="primary-color">
                                {generatedKey} 
                            </p>
                            </Fragment>    
                        )}
                    </Card>

                    <Card width="90%" noShadow>
                        <InLineTitle>
                            <h2 className="h2">
                                Pagar PIX
                            </h2>
                        </InLineTitle>
                        <InLineContainer>
                            <Input 
                                style={{flex: 1}} 
                                placeholder="Chave PIX"
                                value={key}
                                onChange={e => setKey(e.target.value)}
                            />
                            <Button onClick={handlePayPix}>
                                Pagar PIX
                            </Button>
                        </InLineContainer>
                    </Card>
                </div>

                <div>
                    <Card width="90%" noShadow>
                        <InLineTitle>
                            <h2 className="h2">
                                Extrato da Conta
                            </h2>
                        </InLineTitle>
                        <Statement />
                    </Card>
                </div> 

            </BodyContainer>
        </DashboardBackground>
    )
}

export default Dashboard;