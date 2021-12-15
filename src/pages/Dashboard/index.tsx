import { useEffect } from "react";
import Button from "../../components/Button";
import Card from "../../components/Card";
import Header from "../../components/Header";
import Input from "../../components/Input";
import Statement from "../../components/Statement";

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
                            <Input style={{flex: 1}} placeholder="Valor"/>
                            <Button>
                                Gerar Código
                            </Button>
                        </InLineContainer>
                        <p className="primary-color">
                            Pix Copia e Cola
                        </p>
                    </Card>

                    <Card width="90%" noShadow>
                        <InLineTitle>
                            <h2 className="h2">
                                Pagar PIX
                            </h2>
                        </InLineTitle>
                        <InLineContainer>
                            <Input style={{flex: 1}} placeholder="Chave PIX"/>
                            <Button>
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